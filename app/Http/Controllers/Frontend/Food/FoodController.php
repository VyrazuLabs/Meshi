<?php

namespace App\Http\Controllers\Frontend\Food;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
use App\Models\Category\Category;
use App\Models\ProfileInformation;
use App\Models\User;
use App\Models\Food\FoodItemCosting;
use Validator;
use Session;
use Auth;

class FoodController extends Controller
{
  public function details($food_item_id = null) {
  	$food_details = FoodItem::where('food_item_id',$food_item_id)->first();
  	$foodImages = [];

  	if(!empty($food_details)) {

      //UNSERIALIZE TIME SLOT HERE
      $time_of_availability = unserialize($food_details->time_of_availability);
      $time_of_availability = array_filter($time_of_availability); 

			$category = Category::where('category_id',$food_details->category_id)->first();
			$food_details->category_name = $category->category_name;
      $food_details->price = $food_details->price;
      $food_details->date = date('Y-m-d', strtotime($food_details->date_of_availability));
      // $food_details->time = date('h:i: a', strtotime($food_details->time_of_availability));

      $profile = ProfileInformation::where('user_id',$food_details->offered_by)->first();
      if(!empty($profile->image)) {
        $food_details->image = $profile->image;
      }
      $food_details->municipality = $profile->municipality;

      $user = User::where('user_id',$food_details->offered_by)->first();
      if(!empty($user)) {
          $food_details->made_by = $user->name;
      }

      if(!empty($food_details->food_images)) {
          //getting the food images
          $images = $food_details->food_images;
          $foodImages = unserialize($images);

      }

      if(!empty($profile->deliverable_area)) {
        $food_details->deliverable_area = $profile->deliverable_area;
      }

      $foodCosting = FoodItemCosting::where('food_item_id',$food_details->food_item_id)->pluck('tax_name','tax_amount');
       

      /** calculate total price with tax and shipping fee */
      //    $shipping_cost = 0;
			// if(!empty($food_details->shipping_fee)) {
			// 	$shipping_cost = $food_details->shipping_fee;
			// }
			// else {
			// 	$shipping_fee = 0;
			// }
      //   $cost = $shipping_cost+$food_details->price;

			// foreach ($foodCosting as $key => $costing) {
			// 	$cost = $key+$cost;
			// }
       
      $percentage = 5;
      $commission = ceil($food_details->price*($percentage/100));
      $cost = $commission+$food_details->price; 
  	}
    else {
      return back();
    }
  	return view('frontend.food.details',['food_details'=>$food_details,'foodImages'=>$foodImages,'foodCosting'=>$foodCosting,'cost'=>$cost,'time_of_availability'=>$time_of_availability,'commission' => $commission]);
  }

  // DISPLAY SAVE FOOD PAGE
  public function create() {
    $deliverable_area = '';
    $category_id = Category::where('status',1)
                           ->orderBy('id','ASC')
                           ->pluck('category_name','category_id');
    $offered_by = User::where('type',1)->pluck('name','user_id');
    $profile = ProfileInformation::where('user_id',Auth::User()->user_id)->first();
   
    if(!empty($profile)) {
      $deliverable_area = $profile->deliverable_area;
    }
    return view('frontend.food.create-food-item',['form_type' => 'create','category_id'=>$category_id,'offered_by'=>$offered_by,'deliverable_area'=>$deliverable_area]);
  }

  // SAVE FOOD
  public function save(Request $request) {
    $input = $request->input(); 
    $createItemValidator = $this->createItemValidator($input);
    $updateItemValidator = $this->updateItemValidator($input);
    $timeslotValidator = $this->timeslotValidator($input);

    if(isset($input['time_of_availability'])) {
      $startTime = array_column($input['time_of_availability'], 'start_time');
      $endTime = array_column($input['time_of_availability'], 'end_time');
      foreach ($startTime as $key => $start) {
        foreach ($endTime as $key => $end) {
          $timeTable = array_combine($start,$end);
        }
      }
    }
    else {
      $timeTable = '';
    }

    //CONVERTING INPUT DATE INTO DATABASE DATE FORMAT
    if(isset($input['date_of_availability'])) {
      $date = str_replace('/', '-', $input['date_of_availability']);
      $dates = date('Y-m-d', strtotime($date));
    }

    if(isset($input['start_publication_date'])) {
      $startDate = str_replace('/', '-', $input['start_publication_date']);
      $start_date = date('Y-m-d', strtotime($startDate));
      $start_time = date('h:i:s', strtotime($startDate));
    }

    if(isset($input['end_publication_date'])) {
      $endDate = str_replace('/', '-', $input['end_publication_date']);
      $end_date = date('Y-m-d', strtotime($endDate));
      $end_time = date('h:i:s', strtotime($endDate));
    }

    if(isset($input['food_item_id'])) {
      if($timeslotValidator->fails()) {
        Session::flash('error', trans('validation.time_slot_error'));
        return redirect()->back()->withErrors($timeslotValidator)->withInput();
      }
      else {
        /* check validation */
        if($updateItemValidator->fails()) {
          Session::flash('error', trans('validation.form_error'));
          return redirect()->back()->withErrors($updateItemValidator)->withInput();
        }
        else {
          $food_item = FoodItem::where('food_item_id',$input['food_item_id'])->first();
          $food_item->update([ 'item_name' => $input['item_name'],
                               'food_description' => $input['food_description'],
                               'date_of_availability' => $dates,
                               'time_of_availability' => serialize($timeTable),
                               'category_id' => $input['category_id'],
                               'price' => ceil($input['price']),
                               'deliverable_area' => $input['deliverable_area'],
                               'start_publication_date' => $start_date,
                               'start_publication_time' => $start_time,
                               'end_publication_date' => $end_date,
                               'end_publication_time' => $end_time,
                              ]);

          $profile = ProfileInformation::where('user_id', Auth::user()->user_id)->first();
          // $profile->update(['deliverable_area' => $input['deliverable_area']]);

          if ($request->hasFile('food_images')) {
            $files = $request->file('food_images');
            $input_data = $request->all();

            $foodImageValidator = Validator::make(
              $input_data, [
              'food_images.*' => 'required|mimes:jpg,jpeg,png'
              ],[
                  'food_images.*.required' => 'Please upload an image',
                  'food_images.*.mimes' => 'Only jpeg,png images are allowed',
              ]
            );

            if($foodImageValidator->fails()) {
              Session::flash('error', "Image should be in jpg,jpeg or png format.");
              return Redirect()->back()->withErrors($foodImageValidator)->withInput($input);
            }
            else {
              foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = "food_".uniqid().".".$extension;
                $destinationPath = public_path().'/uploads/food/';
                $file->move($destinationPath, $picture);

                //STORE NEW IMAGES IN THE ARRAY VARAIBLE
                $new_images[] = $picture;
                  
                // UNSERIALIZE EXISTING IMAGES
                $old_images = unserialize($food_item->food_images);
                if(!empty($old_images)){
                  //MERGE NEW IMAGES AND EXISTING IMAGES
                  $total_images = array_merge($new_images,$old_images);
                }
                else {
                  $total_images = $new_images;
                }
              }
              $food_item->update(['food_images' =>serialize($total_images)]); 
            }
          }
          Session::flash('success', "Updated successfully.");
          return back();
        }
      }
    }
    else {
      /* check validation */
      if($createItemValidator->fails()) {
        Session::flash('error', trans('validation.form_error'));
        return redirect()->back()->withErrors($createItemValidator)->withInput();
      }
      else {
        // //CONVERTING INPUT DATE INTO DATABASE DATE FORMAT
        // $date = str_replace('/', '-', $input['date_of_availability']);
        // $dates = date('Y-m-d', strtotime($date));



        $food = FoodItem::create([  'food_item_id' => uniqid(),
                                    'item_name' => $input['item_name'],
                                    'category_id' => $input['category_id'],
                                    'food_description' => $input['food_description'],
                                    'date_of_availability' => $dates,
                                    'time_of_availability' => serialize($timeTable),
                                    'offered_by' => Auth::user()->user_id,
                                    'status' => 1,
                                    'price' => ceil($input['price']),
                                    'deliverable_area' => $input['deliverable_area'],
                                    'start_publication_date' => $start_date,
                                    'start_publication_time' => $start_time,
                                    'end_publication_date' => $end_date,
                                    'end_publication_time' => $end_time,
                                ]);

        $profile = ProfileInformation::where('user_id', Auth::user()->user_id)->first();
        // $profile->update(['deliverable_area' => $input['deliverable_area']]);

        if($profile->total_dishes == 0) {
          $profile->update(['total_dishes' => 1]);
        }
        else {
          $totalDishes = $profile->total_dishes + 1;
          $profile->update(['total_dishes' => $totalDishes]);
        }

        //multiple Image Upload
        if ($request->hasFile('food_images')) {
          $files = $request->file('food_images');
          $input_data = $request->all();

          $foodImageValidator = Validator::make(
            $input_data, [
            'food_images.*' => 'required|mimes:jpg,jpeg,png'
            ],[
              'food_images.*.required' => 'Please upload an image',
              'food_images.*.mimes' => 'Only jpeg,png,jpg images are allowed',
            ]
          );
          if($foodImageValidator->fails()) {
            Session::flash('error', "Image should be in jpg,jpeg or png format.");
            return Redirect()->back()->withErrors($foodImageValidator)->withInput($input);
          }
          else {
            foreach($files as $file){
              $filename = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $picture = "food_".uniqid().".".$extension;
              $destinationPath = public_path().'/uploads/food/';
              $file->move($destinationPath, $picture);
              $food_images[] = $picture;
            }
            $food->update(['food_images' => serialize($food_images)]);
          }
        }
        Session::flash('success', "Created successfully.");
        return back();
      }
    }
    return back();
  }

  //VALIDATOR FOR CREATE FOOD ITEM
  protected function createItemValidator($request) {
    return Validator::make($request,[
                                    'item_name' => 'required',
                                    'food_description' => 'required',
                                    'category_id' => 'required',
                                    'date_of_availability' => 'required',
                                    'price' => 'required|numeric',
                                    'time_of_availability' => 'required',
                                    'start_publication_date' => 'required',
                                    'end_publication_date' => 'required',

                                  ]);
  }

  //VALIDATOR FOR CREATE FOOD ITEM
  protected function updateItemValidator($request) {
    return Validator::make($request,[
                                    'item_name' => 'required',
                                    'food_description' => 'required',
                                    'category_id' => 'required',
                                    'date_of_availability' => 'required',
                                    'price' => 'required|numeric',
                                    'start_publication_date' => 'required',
                                    'end_publication_date' => 'required',
                                  ]);
  }

  //VALIDATOR FOR CREATE TIME SLOT
  protected function timeslotValidator($request) {
    return Validator::make($request,[
                                    'time_of_availability' => 'required'
                                  ]);
  }

  //VALIDATOR FOR CREATE FOOD ITEM
  protected function validator($request) {
      return Validator::make($request,[
                                    'item_name' => 'required',
                                    'food_description' => 'required',
                                    'category_id' => 'required',
                                    'time_of_availability' => 'required',
                                    'date_of_availability' => 'required',
                                    'price' => 'required|numeric',
                                    // 'short_info' => 'required',
                                  ]);
  }

  //VALIDATOR FOR CREATE FOOD COSTING
  protected function foodCostingValidator($request) {
      return Validator::make($request,[
                                    'tax_name' => 'required',
                                    'tax_amount' => 'required',
                                    'tax_percentage' => 'required'
                                  ]);
  }


  public function lists() {
    $foods = FoodItem::where('offered_by',Auth::User()->user_id)
                     ->where('status',1)
                     ->orderBy('date_of_availability','ASC')
                     ->paginate(5);

    foreach ($foods as $key => $food) {
      $category = Category::where('status',1)->where('category_id',$food->category_id)->first();
      if(!empty($category)) {
        $food->category_name = $category->category_name;
      }
      $food->date = date('Y-m-d', strtotime($food->date_of_availability));
    }
    return view('frontend.food.food-list',['foods'=>$foods]);
  }


  public function delete($food_item_id = null) {
    $foodItem = FoodItem::where('food_item_id',$food_item_id)->first();
    if(!empty($foodItem)) {
      $foodItem->delete();
    }
    Session::flash('success', "Deleted successfully");
    return back();
  }

  public function editFood($food_item_id = null) {
    $food_images = '';
    $time_of_availability = '';
    $deliverable_area = '';
    $category_id = Category::where('status',1)
                           ->orderBy('id','ASC')
                           ->pluck('category_name','category_id');
                           
    $offered_by = User::where('type',1)->pluck('name','user_id');
    $food_items = FoodItem::where('food_item_id',$food_item_id)->first();
    $profile = ProfileInformation::where('user_id',Auth::User()->user_id)->first();
   
    if(!empty($food_items->deliverable_area)) {
      $deliverable_area = $food_items->deliverable_area;
    }
    else {
      $deliverable_area = $profile->deliverable_area;
    }

    //CONVERTING DATE FORMAT
    if(!empty($food_items->date_of_availability)) {
      $food_items->date_of_availability = date('Y-m-d', strtotime($food_items->date_of_availability));
    }

    if(!empty($food_items->food_images)) {
      //getting the food images
        $images = $food_items->food_images;
        $food_images = unserialize($images);
    }

    //UNSERIALIZE TIME SLOT HERE
    if(!empty($food_items->time_of_availability)) {
      $time_of_availability = unserialize($food_items->time_of_availability);
      $time_of_availability = array_filter($time_of_availability); 
    }

    if(!empty($food_items->start_publication_date) && !empty($food_items->end_publication_date)) {
      $food_items->start_publication_date = $food_items->start_publication_date." ".$food_items->start_publication_time;
      $food_items->end_publication_date = $food_items->end_publication_date." ".$food_items->end_publication_time;
    }


    return view('frontend.food.create-food-item',['form_type' => 'edit','food_items'=>$food_items,'category_id'=>$category_id,'offered_by'=>$offered_by,'food_images'=>$food_images,'time_of_availability'=>$time_of_availability,'deliverable_area'=>$deliverable_area]);
  }
}

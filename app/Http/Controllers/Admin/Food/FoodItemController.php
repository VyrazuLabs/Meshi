<?php

namespace App\Http\Controllers\Admin\Food;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Food\FoodItem;
use App\Models\User;
use Validator;
use Session;
use App\Models\Food\FoodItemCosting;
use App\Models\ProfileInformation;


class FoodItemController extends Controller
{
    public function create() {
    	$category_id = Category::where('status',1)->pluck('category_name','category_id');
    	$offered_by = User::where('type',1)->pluck('name','user_id');
    	return view('food.create-food-item',['form_type' => 'create','category_id'=>$category_id,'offered_by'=>$offered_by]);
    }

    public function save(Request $request) {
    	$input = $request->input(); 
        $createItemValidator = $this->createItemValidator($input);
        $updateItemValidator = $this->updateItemValidator($input);
        $timeslotValidator = $this->timeslotValidator($input);

        // $timeTable = [];
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
		     		// $timeslotValidator->messages()->merge($validator->messages());
			        return redirect()->back()->withErrors($updateItemValidator)->withInput();
			    }
			    else {

		    		$food_item = FoodItem::where('food_item_id',$input['food_item_id'])->first();
		    		$food_item->update([ 'item_name' => $input['item_name'],
			            				 'food_description' => $input['food_description'],
			           					 'status' => $input['status'],
			           					 'date_of_availability' => $dates,
			           					 'time_of_availability' => serialize($timeTable),
							             'category_id' => $input['category_id'],
			           					 'offered_by' => $input['offered_by'],
			           					 // 'shipping_fee' => $input['shipping_fee'],
			           					 'price' => ceil($input['price']),
			           					 'short_info' => $input['short_info'],
			           					 'start_publication_date' => $start_date,
			                             'start_publication_time' => $start_time,
			                             'end_publication_date' => $end_date,
			                             'end_publication_time' => $end_time,
			          				  ]);

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
	     		// $timeslotValidator->messages()->merge($validator->messages());
		        return redirect()->back()->withErrors($createItemValidator)->withInput();
		    }
		    else {
	    		$food = FoodItem::create([	'food_item_id' => uniqid(),
								            'item_name' => $input['item_name'],
								            'category_id' => $input['category_id'],
								            'food_description' => $input['food_description'],
		           					 		'date_of_availability' => $dates,
		           					 		'time_of_availability' => serialize($timeTable),
		           					 		'offered_by' => $input['offered_by'],
								            'status' => $input['status'],
		           					 		// 'shipping_fee' => $input['shipping_fee'],
		           					 		'price' => ceil($input['price']),
		           					 		'short_info' => $input['short_info'],
		           					 		'start_publication_date' => $start_date,
				                            'start_publication_time' => $start_time,
				                            'end_publication_date' => $end_date,
				                            'end_publication_time' => $end_time,
							        	]);

	    		$profile = ProfileInformation::where('user_id',$input['offered_by'])->first();
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

    }

    //VALIDATOR FOR CREATE FOOD ITEM
  	protected function createItemValidator($request) {
    	return Validator::make($request,[
                                      'item_name' => 'required',
                                      'food_description' => 'required',
                                      'status' => 'required',
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
                                      'status' => 'required',
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

    public function edit($food_item_id=null) {
    	$food_images = '';
    	$time_of_availability = '';
    	$category_id = Category::where('status',1)->pluck('category_name','category_id');
    	$offered_by = User::where('type',1)->pluck('name','user_id');
    	$food_items = FoodItem::where('food_item_id',$food_item_id)->first();

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

    	return view('food.create-food-item',['form_type' => 'edit','food_items'=>$food_items,'category_id'=>$category_id,'offered_by'=>$offered_by,'food_images'=>$food_images,'time_of_availability'=>$time_of_availability]);
    }

    public function lists() {
    	$food_items = FoodItem::get();
    	if(!empty($food_items)) {
    		foreach ($food_items as $key => $food) {
    			$user = User::where('user_id',$food->offered_by)->first();
    			if(!empty($user)) {
    				$food->creator_name = $user->nick_name;
    			}
    			$category = Category::where('category_id',$food->category_id)->first();
    			if(!empty($category)) {
    				$food->category_name = $category->category_name;
    			}

    		}
    	}
    	return view('food.list-food-item',['food_items'=>$food_items]);
    }



    /* DELETE FOOD IMAGES */
  	public function delete( $food_image = null,$food_item_id = null ) {
	    $food_item = FoodItem::where('food_item_id',$food_item_id)->first();
	    $imgArray = [];
	    if(!empty($food_item)) {
		    if(!empty($food_item->food_images)) {
		    	$images = unserialize($food_item->food_images);
			    foreach ($images as $key => $delete_image) {
			      if($delete_image == $food_image){

			        //DELETE SELECTED IMAGE FROM DATABASE
			        unset($images[$key]);

			        //DELETE THE SAME IMAGE FROM FOLDER
			        if(file_exists(public_path().'/uploads/food/'.$delete_image)) {
			          unlink(public_path().'/uploads/food/'.$delete_image); 
			        }
			      } 
			      else {
			      	$imgArray[] = $delete_image;
			      }
			    }
		    }

		    //AFTER DELETION UPDATE REMAINING IMAGES 
		    $new_food_images = $food_item->update(['food_images' => serialize($imgArray) ]);
		    Session::flash('success', "Food image deleted.");
		}
	    return redirect()->back();
	}

	public function addCosting($food_item_id = null) {
		$foodCosting = FoodItemCosting::where('food_item_id',$food_item_id)->get();
		return view('food.add-food-costing',['form_type'=>'create','food_item_id'=>$food_item_id,'foodCosting'=>$foodCosting]);
	}

	public function saveCosting(Request $request) {
    	$input = $request->input(); 
        $foodCostingValidator = $this->foodCostingValidator($input);

        /* check validation */
    	if($foodCostingValidator->fails()) {
	        Session::flash('error', trans('validation.form_error'));
	        return redirect()->back()->withErrors($foodCostingValidator)->withInput();
	    }
	    else {
	    	/* update food costings */
	    	if(isset($input['tax_id'])) {
	    		$food_costing = FoodItemCosting::where('tax_id',$input['tax_id'])->first();
	    		$food_costing->update([ 'food_item_id' => $input['food_item_id'],
							            'tax_name' => $input['tax_name'],
							            'tax_amount' => $input['tax_amount'],
							            'tax_percentage' => $input['tax_percentage']
		          				  	]);
	    		Session::flash('success', "Updated successfully.");
				return back();
	    	}
	    	else {
		    	/* create food costings */
		    	FoodItemCosting::create([	'food_item_id' => $input['food_item_id'],
								            'tax_id' => uniqid(),
								            'tax_name' => $input['tax_name'],
								            'tax_amount' => $input['tax_amount'],
								            'tax_percentage' => $input['tax_percentage']
								        ]);
		    	Session::flash('success', "Created successfully.");
				return back();
	    	}
	    }
	}

	//VALIDATOR FOR CREATE FOOD COSTING
  	protected function foodCostingValidator($request) {
    	return Validator::make($request,[
                                      'tax_name' => 'required',
                                      'tax_amount' => 'required',
                                      'tax_percentage' => 'required'
                                    ]);
  	}

  	public function editCosting($food_item_id = null,$tax_id = null) {
  		$foodCosting = FoodItemCosting::where('food_item_id',$food_item_id)->get();
  		$tax = FoodItemCosting::where('food_item_id',$food_item_id)
  									  ->where('tax_id',$tax_id)
  									  ->first();
		return view('food.add-food-costing',['form_type'=>'edit','food_item_id'=>$food_item_id,'foodCosting'=>$foodCosting,'tax'=>$tax]);
  	}
}

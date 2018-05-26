<?php

namespace App\Http\Controllers\Frontend\Food;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Food\FoodItem;
use App\Models\Food\FoodItemCosting;
use App\Models\Order\Order;
use App\Models\ProfileInformation;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use TranslatedResources;
use Validator;

class FoodController extends Controller
{
    /* view of food details page */
    public function details($food_item_id = null)
    {
        /* getting the current time of japan */
        $jst_time_zone = date_default_timezone_set('Asia/Tokyo');
        $jst_current_date_time = strtotime(date("Y-m-d H:i:s"));
        $jst_current_date = date("Y-m-d");

        $food_details = FoodItem::where('food_item_id', $food_item_id)->first();
        $foodImages = [];

        if (!empty($food_details)) {

            //UNSERIALIZE TIME SLOT HERE
            $time_of_availability = unserialize($food_details->time_of_availability);
            $time_of_availability = array_filter($time_of_availability);

            /* getting the category name of the food */
            $category = Category::where('category_id', $food_details->category_id)->first();
            $food_details->category_name = $category->category_name;

            /* getting the delivery date of the food item */
            $food_details->date = date('Y-m-d', strtotime($food_details->date_of_availability));
            // $food_details->time = date('h:i: a', strtotime($food_details->time_of_availability));

            /* get the profile information of the creator */
            $profile = ProfileInformation::where('user_id', $food_details->offered_by)->first();
            if (!empty($profile->image)) {
                $food_details->image = $profile->image;
            }
            $food_details->municipality = $profile->municipality;

            /* get the name of the creator */
            $user = User::where('user_id', $food_details->offered_by)->first();
            if (!empty($user)) {
                $food_details->made_by = $user->name;
            }

            /* get all the food item images */
            if (!empty($food_details->food_images)) {
                //getting the food images
                $images = $food_details->food_images;
                $foodImages = unserialize($images);
            }

            /* getting the deliverable area of the food item */
            if (empty($food_details->deliverable_area)) {
                $food_details->deliverable_area = $profile->deliverable_area;
            }

            $foodCosting = FoodItemCosting::where('food_item_id', $food_details->food_item_id)->pluck('tax_name', 'tax_amount');

            /** calculate total price with tax and shipping fee */
            $percentage = 5;
            $commission = ceil($food_details->price * ($percentage / 100));
            $cost = $commission + $food_details->price;

            //    $shipping_cost = 0;
            // if(!empty($food_details->shipping_fee)) {
            //     $shipping_cost = $food_details->shipping_fee;
            // }
            // else {
            //     $shipping_fee = 0;
            // }
            //   $cost = $shipping_cost+$food_details->price;

            // foreach ($foodCosting as $key => $costing) {
            //     $cost = $key+$cost;
            // }

            /* add flag if order is closed */
            /* convert publication daterange in timestamps */
            $dateEnd = strtotime($food_details->end_publication_date . ' ' . $food_details->end_publication_time);
            if ($jst_current_date_time > $dateEnd) {
                $food_details->closed_order = 1; //order has been closed
            } else {
                $food_details->closed_order = 0;
            }

            /* chcek for order timing */
            $previousOrders = Order::where('food_item_id', $food_item_id);
            $placedOrderTiming = [];
            if (!empty($previousOrders)) {
                $placedOrderTiming = $previousOrders->pluck('time')->toArray();
            }
        } else {
            return back();
        }
        return view('frontend.food.details', ['food_details' => $food_details, 'foodImages' => $foodImages, 'foodCosting' => $foodCosting, 'cost' => $cost, 'time_of_availability' => $time_of_availability, 'commission' => $commission, 'placedOrderTiming' => $placedOrderTiming]);
    }

    // view of food creation form
    public function create()
    {
        $deliverable_area = '';

        /* getting all the active categories in descending order */
        $category_id = Category::where('status', 1)
            ->orderBy('id', 'desc')
            ->pluck('category_name', 'category_id');

        /* get all list of active creators */
        $offered_by = User::where('type', 1)->pluck('name', 'user_id');

        /* getting the profile information of logged in user */
        $profile = ProfileInformation::where('user_id', Auth::User()->user_id)->first();
        if (!empty($profile)) {
            $deliverable_area = $profile->deliverable_area;
        }

        return view('frontend.food.create-food-item', ['form_type' => 'create', 'category_id' => $category_id, 'offered_by' => $offered_by, 'deliverable_area' => $deliverable_area]);
    }

    /* create and update food details here */
    public function save(Request $request)
    {
        $input = $request->input();
        $createItemValidator = $this->createItemValidator($input);
        $updateItemValidator = $this->updateItemValidator($input);
        $timeslotValidator = $this->timeslotValidator($input);

        // if (isset($input['profile_image']) && !empty($input['profile_image'])) {
        //     //get the base64 value in a variable
        //     $data = $input['profile_image'];
        //     list($t, $data) = explode(';', $data);
        //     list(, $data) = explode(',', $data);
        //     $_img = base64_decode($data);

        //     $profile_image = 'user_picture' . time() . ".jpeg";
        //     file_put_contents(public_path() . '/uploads/profile/picture/' . $profile_image, $_img);
        // }

        /* checking for time slot */
        if (isset($input['time_of_availability'])) {
            $startTime = array_column($input['time_of_availability'], 'start_time');
            $endTime = array_column($input['time_of_availability'], 'end_time');
            foreach ($startTime as $key => $start) {
                foreach ($endTime as $key => $end) {
                    $timeTable = array_combine($start, $end);
                }
            }
        } else {
            $timeTable = '';
        }

        //CONVERTING INPUT DATE INTO y-m-d FORMAT
        if (isset($input['date_of_availability'])) {
            $date = str_replace('/', '-', $input['date_of_availability']);
            $dates = date('Y-m-d', strtotime($date));
        }

        /* split publication start date and time here */
        if (isset($input['start_publication_date'])) {
            $startDate = str_replace('/', '-', $input['start_publication_date']);
            $start_date = date('Y-m-d', strtotime($startDate));
            $start_time = date('H:i:s', strtotime($startDate));
        }

        /* split publication end date and time here */
        if (isset($input['end_publication_date'])) {
            $endDate = str_replace('/', '-', $input['end_publication_date']);
            $end_date = date('Y-m-d', strtotime($endDate));
            $end_time = date('H:i:s', strtotime($endDate));
        }

        /* update food details here */
        if (isset($input['food_item_id'])) {
            /* check for time slot validation */
            if ($timeslotValidator->fails()) {
                Session::flash('error', trans('validation.time_slot_error'));
                return redirect()->back()->withErrors($timeslotValidator)->withInput();
            } else {
                /* check validation */
                if ($updateItemValidator->fails()) {
                    Session::flash('error', trans('validation.form_error'));
                    return redirect()->back()->withErrors($updateItemValidator)->withInput();
                } else {
                    $food_item = FoodItem::where('food_item_id', $input['food_item_id'])->first();
                    $food_item->update(['item_name' => $input['item_name'],
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
                        'quantity' => $input['quantity'],
                    ]);

                    // /* updating food images */
                    // if ($request->hasFile('food_images')) {
                    //     $files = $request->file('food_images');
                    //     $input_data = $request->all();

                    //     $foodImageValidator = Validator::make(
                    //         $input_data, [
                    //             'food_images.*' => 'required|mimes:jpg,jpeg,png',
                    //         ], [
                    //             'food_images.*.required' => 'Please upload an image',
                    //             'food_images.*.mimes' => 'Only jpeg,png images are allowed',
                    //         ]
                    //     );

                    //     if ($foodImageValidator->fails()) {
                    //         $image_validation_error = TranslatedResources::translatedData()['image_validation_error'];
                    //         Session::flash('error', $image_validation_error);
                    //         return Redirect()->back()->withErrors($foodImageValidator)->withInput($input);
                    //     } else {
                    //     foreach ($files as $file) {
                    //         $filename = $file->getClientOriginalName();
                    //         $extension = $file->getClientOriginalExtension();
                    //         $picture = "food_" . uniqid() . "." . $extension;
                    //         $destinationPath = public_path() . '/uploads/food/';
                    //         $file->move($destinationPath, $picture);

                    //         //STORE NEW IMAGES IN THE ARRAY VARAIBLE
                    //         $new_images[] = $picture;

                    //         // UNSERIALIZE EXISTING IMAGES
                    //         $old_images = unserialize($food_item->food_images);
                    //         if (!empty($old_images)) {
                    //             //MERGE NEW IMAGES AND EXISTING IMAGES
                    //             $total_images = array_merge($new_images, $old_images);
                    //         } else {
                    //             $total_images = $new_images;
                    //         }
                    //     }
                    //     $food_item->update(['food_images' => serialize($total_images)]);
                    // }
                    // }
                    if (isset($input['food_item_images']) && !empty($input['food_item_images'])) {
                        //get the base64 value in a variable
                        $data = $input['food_item_images'];
                        // print_r($data);die;
                        $imgArray = explode('img_url', $data);
                        if (!empty($imgArray)) {
                            foreach ($imgArray as $key => $data) {
                                if (!empty($data)) {
                                    list($t, $data) = explode(';', $data);
                                    list(, $data) = explode(',', $data);
                                    $_img = base64_decode($data);
                                    // print_r($data);
                                    $food_item_images = 'food_' . uniqid() . ".jpeg";
                                    file_put_contents(public_path() . '/uploads/food/' . $food_item_images, $_img);
                                    //STORE NEW IMAGES IN THE ARRAY VARAIBLE
                                    $new_images[] = $food_item_images;

                                    // UNSERIALIZE EXISTING IMAGES
                                    $old_images = unserialize($food_item->food_images);
                                    if (!empty($old_images)) {
                                        //MERGE NEW IMAGES AND EXISTING IMAGES
                                        $total_images = array_merge($new_images, $old_images);
                                    } else {
                                        $total_images = $new_images;
                                    }
                                }

                            }
                            $food_item->update(['food_images' => serialize($total_images)]);

                        }

                    }
                    $updation_success_msg = TranslatedResources::translatedData()['updation_success_msg'];
                    Session::flash('success', $updation_success_msg);
                    return back();
                }
            }
        } else {
            /* check validation */
            if ($createItemValidator->fails()) {
                Session::flash('error', trans('validation.form_error'));
                return redirect()->back()->withErrors($createItemValidator)->withInput();
            } else {
                $food = FoodItem::create(['food_item_id' => uniqid(),
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
                    'quantity' => $input['quantity'],

                ]);

                $profile = ProfileInformation::where('user_id', Auth::user()->user_id)->first();

                /* update total number of dishes made by the creator */
                if ($profile->total_dishes == 0) {
                    $profile->update(['total_dishes' => 1]);
                } else {
                    $totalDishes = $profile->total_dishes + 1;
                    $profile->update(['total_dishes' => $totalDishes]);
                }

                // /* Upload food images */
                // if ($request->hasFile('food_images')) {
                //     $files = $request->file('food_images');
                //     $input_data = $request->all();

                //     $foodImageValidator = Validator::make(
                //         $input_data, [
                //             'food_images.*' => 'required|mimes:jpg,jpeg,png',
                //         ], [
                //             'food_images.*.required' => 'Please upload an image',
                //             'food_images.*.mimes' => 'Only jpeg,png,jpg images are allowed',
                //         ]
                //     );
                //     if ($foodImageValidator->fails()) {
                //         $image_validation_error = TranslatedResources::translatedData()['image_validation_error'];
                //         Session::flash('error', $image_validation_error);
                //         return Redirect()->back()->withErrors($foodImageValidator)->withInput($input);
                //     } else {
                //         foreach ($files as $file) {
                //             $filename = $file->getClientOriginalName();
                //             $extension = $file->getClientOriginalExtension();
                //             $picture = "food_" . uniqid() . "." . $extension;
                //             $destinationPath = public_path() . '/uploads/food/';
                //             $file->move($destinationPath, $picture);
                //             $food_images[] = $picture;
                //         }
                //         $food->update(['food_images' => serialize($food_images)]);
                //     }
                // }

                if (isset($input['food_item_images']) && !empty($input['food_item_images'])) {
                    //get the base64 value in a variable
                    $data = $input['food_item_images'];
                    // print_r($data);die;
                    $imgArray = explode('img_url', $data);
                    if (!empty($imgArray)) {
                        foreach ($imgArray as $key => $data) {
                            if (!empty($data)) {
                                list($t, $data) = explode(';', $data);
                                list(, $data) = explode(',', $data);
                                $_img = base64_decode($data);
                                // print_r($data);
                                $food_item_images = 'food_' . uniqid() . ".jpeg";
                                file_put_contents(public_path() . '/uploads/food/' . $food_item_images, $_img);
                                //STORE NEW IMAGES IN THE ARRAY VARAIBLE
                                $new_images[] = $food_item_images;
                            }
                        }
                        $food->update(['food_images' => serialize($new_images)]);
                    }

                }

                $creation_success_msg = TranslatedResources::translatedData()['creation_success_msg'];
                Session::flash('success', $creation_success_msg);
                return back();
            }
        }
        return back();
    }

    //VALIDATOR FOR CREATE FOOD ITEM
    protected function createItemValidator($request)
    {
        return Validator::make($request, [
            'item_name' => 'required',
            'food_description' => 'required',
            'category_id' => 'required',
            'date_of_availability' => 'required',
            'price' => 'required|numeric',
            'time_of_availability' => 'required',
            'start_publication_date' => 'required',
            'end_publication_date' => 'required',
            'quantity' => 'required',

        ]);
    }

    //VALIDATOR FOR CREATE FOOD ITEM
    protected function updateItemValidator($request)
    {
        return Validator::make($request, [
            'item_name' => 'required',
            'food_description' => 'required',
            'category_id' => 'required',
            'date_of_availability' => 'required',
            'price' => 'required|numeric',
            'start_publication_date' => 'required',
            'end_publication_date' => 'required',
            'quantity' => 'required',

        ]);
    }

    //VALIDATOR FOR CREATE TIME SLOT
    protected function timeslotValidator($request)
    {
        return Validator::make($request, [
            'time_of_availability' => 'required',
        ]);
    }

    //VALIDATOR FOR CREATE FOOD COSTING
    protected function foodCostingValidator($request)
    {
        return Validator::make($request, [
            'tax_name' => 'required',
            'tax_amount' => 'required',
            'tax_percentage' => 'required',
        ]);
    }

    /* list of food items created by the logged in user */
    public function lists()
    {
        $foods = [];
        $foods = FoodItem::where('offered_by', Auth::User()->user_id)
            ->where('status', 1)
            ->orderBy('date_of_availability', 'DESC')
            ->paginate(5);

        if (!empty($foods)) {
            foreach ($foods as $key => $food) {
                $category = Category::where('status', 1)->where('category_id', $food->category_id)->first();
                if (!empty($category)) {
                    $food->category_name = $category->category_name;
                }
                $food->date = date('Y-m-d', strtotime($food->date_of_availability));
            }
        }
        return view('frontend.food.food-list', ['foods' => $foods]);
    }

    /* delete food items */
    public function delete(Request $request)
    {
        $input = Input::all();
        $foodItem = FoodItem::where('food_item_id', $input['food_item_id'])->first();
        if (!empty($foodItem)) {
            $foodItem->delete();
        }
    }

    /* view of food item updation form */
    public function editFood($food_item_id = null)
    {
        $food_images = '';
        $time_of_availability = '';
        $deliverable_area = '';

        /* get all the active categories in ascending order */
        $category_id = Category::where('status', 1)
            ->orderBy('id', 'desc')
            ->pluck('category_name', 'category_id');

        /* get all the active creators */
        $offered_by = User::where('type', 1)->pluck('name', 'user_id');

        /* get the profile information of logged in user */
        $profile = ProfileInformation::where('user_id', Auth::User()->user_id)->first();

        $food_items = FoodItem::where('food_item_id', $food_item_id)->first();
        if (!empty($food_items->deliverable_area)) {
            $deliverable_area = $food_items->deliverable_area;
        } else {
            $deliverable_area = $profile->deliverable_area;
        }

        //CONVERTING DATE FORMAT
        if (!empty($food_items->date_of_availability)) {
            $food_items->date_of_availability = date('Y-m-d', strtotime($food_items->date_of_availability));
        }

        if (!empty($food_items->food_images)) {
            //getting the food images
            $images = $food_items->food_images;
            $food_images = unserialize($images);
        }

        //UNSERIALIZE TIME SLOT HERE
        if (!empty($food_items->time_of_availability)) {
            $time_of_availability = unserialize($food_items->time_of_availability);
            $time_of_availability = array_filter($time_of_availability);
        }

        /* concatenate publication date and time*/
        if (!empty($food_items->start_publication_date) && !empty($food_items->end_publication_date)) {
            $food_items->start_publication_date = $food_items->start_publication_date . " " . $food_items->start_publication_time;
            $food_items->end_publication_date = $food_items->end_publication_date . " " . $food_items->end_publication_time;
        }

        return view('frontend.food.create-food-item', ['form_type' => 'edit', 'food_items' => $food_items, 'category_id' => $category_id, 'offered_by' => $offered_by, 'food_images' => $food_images, 'time_of_availability' => $time_of_availability, 'deliverable_area' => $deliverable_area]);
    }
}

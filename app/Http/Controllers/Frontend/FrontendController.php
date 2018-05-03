<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\ProfileInformation;
use App\Models\User;
use DB;

class FrontendController extends Controller
{
    // public function backupIndex() {
    //     $today = date("Y-m-d");
    //     $tomorrow = date('Y-m-d',  strtotime($today . ' +1 day'));
    //     $day_after_tomorrow = date('Y-m-d',  strtotime($today . ' +2 day'));
    //     $next_day_of_tomorrow = date('Y-m-d',  strtotime($today . ' +3 day'));

    //     /* food items available on tomorrow */
    //     // if(Auth::check()){
    //     //     $today_food_items = FoodItem::where('status',1)
    //     //                                    ->whereDate('date_of_availability',$today)
    //     //                                    ->Where('start_publication_date','<=',$today)
    //     //                                    ->Where('end_publication_date','>=',$today)
    //     //                                    ->where('offered_by','!=',Auth::User()->user_id)
    //     //                                    ->get();

    //     //     $tomorrow_food_items = FoodItem::where('status',1)
    //     //                                    ->whereDate('date_of_availability',$tomorrow)
    //     //                                    ->Where('start_publication_date','<=',$today)
    //     //                                    ->Where('end_publication_date','>=',$today)
    //     //                                    ->where('offered_by','!=',Auth::User()->user_id)
    //     //                                    ->get();

    //     //    $day_after_tomorrow_food_items = FoodItem::where('status',1)
    //     //                                             ->whereDate('date_of_availability',$day_after_tomorrow)
    //     //                                             ->Where('start_publication_date','<=',$today)
    //     //                                             ->Where('end_publication_date','>=',$today)
    //     //                                             ->where('offered_by','!=',Auth::User()->user_id)
    //     //                                             ->get();

    //     //     $next_day_of_tomorrow_food_items = FoodItem::where('status',1)
    //     //                                                ->whereDate('date_of_availability',$next_day_of_tomorrow)
    //     //                                                ->Where('start_publication_date','<=',$today)
    //     //                                                ->Where('end_publication_date','>=',$today)
    //     //                                                ->where('offered_by','!=',Auth::User()->user_id)
    //     //                                                ->get();
    //     // }
    //     // else {
    //         // $current = '2018-04-17';
    //         // $delivery = '2018-04-17';

    //         // SELECT * FROM `food_item` WHERE '2018-04-15' = start_publication_date OR '2018-04-15' = end_publication_date OR ('2018-04-15' > start_publication_date AND '2018-04-15' < end_publication_date)

    //         // date_of_availability = ".$tomorrow." AND

    //         $today_food_items =  DB::select( DB::raw("SELECT * FROM `food_item` WHERE ".$today." = start_publication_date OR ".$today." = end_publication_date OR ('".$today."' > start_publication_date AND '".$today."' < end_publication_date)") );

    //         // echo"<pre>";print_r($today_food_items);die;

    //         $tomorrow_food_items =  DB::select( DB::raw("SELECT * FROM `food_item` WHERE ".$today." = start_publication_date OR ".$today." = end_publication_date OR ('".$today."' > start_publication_date AND '".$today."' < end_publication_date)") );

    //         $day_after_tomorrow_food_items =  DB::select( DB::raw("SELECT * FROM `food_item` WHERE ".$today." = start_publication_date OR ".$today." = end_publication_date OR ('".$today."' > start_publication_date AND '".$today."' < end_publication_date)") );

    //         $next_day_of_tomorrow_food_items =  DB::select( DB::raw("SELECT * FROM `food_item` WHERE ".$today." = start_publication_date OR ".$today." = end_publication_date OR ('".$today."' > start_publication_date AND '".$today."' < end_publication_date)") );

    //         // $today_food_items =  DB::select( DB::raw("SELECT * FROM `food_item` WHERE date_of_availability = '".$delivery."' AND  (".$current." = start_publication_date OR ".$current." = end_publication_date OR ('".$current."' > start_publication_date AND '".$current."' < end_publication_date))") );

    //         // echo"<pre>";print_r($today_food_items);die;

    //         // $tomorrow_food_items = FoodItem::where('status',1)
    //         //                                ->whereDate('date_of_availability',$tomorrow)
    //         //                                ->where('start_publication_date','=',$today)
    //         //                                ->orWhere(function($query) {
    //         //                                   $query->Where('start_publication_date','<=','2018-04-15');
    //         //                                   $query->Where('end_publication_date','>=','2018-04-15');
    //         //                                 })
    //         //                                ->orWhere('end_publication_date','=',$today)
    //         //                                ->get();
    //         // $day_after_tomorrow_food_items = FoodItem::where('status',1)
    //         //                                         ->whereDate('date_of_availability',$day_after_tomorrow)
    //         //                                         ->Where('start_publication_date','<=',$today)
    //         //                                         ->Where('end_publication_date','>=',$today)
    //         //                                         ->get();
    //         // $next_day_of_tomorrow_food_items = FoodItem::where('status',1)
    //         //                                            ->Where('start_publication_date','<=',$today)
    //         //                                            ->Where('end_publication_date','>=',$today)
    //         //                                            ->get();

    //     // }

    //     if(!empty($today_food_items)) {
    //         foreach ($today_food_items as $key => $food) {
    //             $category = Category::where('category_id',$food->category_id)->first();
    //             $food->category_name = $category->category_name;
    //             $food->price = $food->price;
    //             $food->date = date('Y-m-d', strtotime($food->date_of_availability));
    //             $food->time = date('h:i a', strtotime($food->time_of_availability));

    //             $profile = ProfileInformation::where('user_id',$food->offered_by)->first();
    //             if(!empty($profile->image)) {
    //                 $food->image = $profile->image;
    //             }

    //             if(!empty($food->food_images)) {
    //                 //getting the food images
    //                 $images = $food->food_images;
    //                 $food->foodImages = unserialize($images);

    //             }
    //         }
    //     }

    //     if(!empty($tomorrow_food_items)) {
    //         foreach ($tomorrow_food_items as $key => $food) {
    //             $category = Category::where('category_id',$food->category_id)->first();
    //             $food->category_name = $category->category_name;
    //             $food->price = $food->price;
    //             $food->date = date('Y-m-d', strtotime($food->date_of_availability));
    //             $food->time = date('h:i a', strtotime($food->time_of_availability));

    //             $profile = ProfileInformation::where('user_id',$food->offered_by)->first();
    //             if(!empty($profile->image)) {
    //                 $food->image = $profile->image;
    //             }

    //             if(!empty($food->food_images)) {
    //                 //getting the food images
    //                 $images = $food->food_images;
    //                 $food->foodImages = unserialize($images);

    //             }
    //         }
    //     }

    //     /* food items available on day after tomorrow */
    //     if(!empty($day_after_tomorrow_food_items)) {
    //         foreach ($day_after_tomorrow_food_items as $key => $food) {
    //             $category = Category::where('category_id',$food->category_id)->first();
    //             $food->category_name = $category->category_name;
    //             $food->price = $food->price;
    //             $food->date = date('Y-m-d', strtotime($food->date_of_availability));
    //             $food->time = date('h:i a', strtotime($food->time_of_availability));

    //             $profile = ProfileInformation::where('user_id',$food->offered_by)->first();
    //             if(!empty($profile->image)) {
    //                 $food->image = $profile->image;
    //             }

    //             if(!empty($food->food_images)) {
    //                 //getting the food images
    //                 $images = $food->food_images;
    //                 $food->foodImages = unserialize($images);

    //             }
    //         }
    //     }

    //     /* food items available on the next day of day after tomorrow */
    //     if(!empty($next_day_of_tomorrow_food_items)) {
    //         foreach ($next_day_of_tomorrow_food_items as $key => $food) {
    //             $category = Category::where('category_id',$food->category_id)->first();
    //             $food->category_name = $category->category_name;
    //             $food->price = $food->price;
    //             $food->date = date('Y-m-d', strtotime($food->date_of_availability));
    //             $food->time = date('h:i a', strtotime($food->time_of_availability));

    //             $profile = ProfileInformation::where('user_id',$food->offered_by)->first();
    //             if(!empty($profile->image)) {
    //                 $food->image = $profile->image;
    //             }

    //             if(!empty($food->food_images)) {
    //                 //getting the food images
    //                 $images = $food->food_images;
    //                 $food->foodImages = unserialize($images);

    //             }
    //         }
    //     }

    //     return view('frontend.index',['tomorrow_food_items'=>$tomorrow_food_items,'day_after_tomorrow_food_items'=>$day_after_tomorrow_food_items,'next_day_of_tomorrow_food_items'=>$next_day_of_tomorrow_food_items,'next_day_of_tomorrow'=>$next_day_of_tomorrow,'today_food_items'=>$today_food_items]);
    // }

    public function index()
    {
        $today = date("Y-m-d");
        $tomorrow = date('Y-m-d', strtotime($today . ' +1 day'));
        $day_after_tomorrow = date('Y-m-d', strtotime($today . ' +2 day'));
        $next_day_of_tomorrow = date('Y-m-d', strtotime($today . ' +3 day'));

        $day_start_range = date('Y-m-d', strtotime($today . ' -1 day'));
        $day_end_range = date('Y-m-d', strtotime($today . ' +1 day'));

        $today_food_list = [];
        $tomorrow_food_list = [];
        $day_after_tomorrow_food_list = [];
        $next_day_of_tomorrow_food_list = [];

        $available_foods = [];
        $closed_food_items = [];

        /* available active food items according to publication period */
        $foodItems = DB::select(DB::raw("SELECT * FROM `food_item`  WHERE status = '1' AND (" . $today . " = start_publication_date OR " . $today . " = end_publication_date OR ('" . $day_end_range . "' > start_publication_date AND '" . $day_start_range . "' < end_publication_date))"));

        /* getting the current time of japan */
        $jst_time_zone = date_default_timezone_set('Asia/Tokyo');
        $jst_current_time = date('H:i:s');

        // echo "<pre>";
        // print_r($foodItems);die;

        // $foodItems = $foodItem->get();

        if (!empty($foodItems)) {
            foreach ($foodItems as $key => $food) {
                $food->date = date('Y-m-d', strtotime($food->date_of_availability));
                $user = User::where('user_id', $food->offered_by)->first();
                if ($user->status == 1) {
                    $food->user_status = 1;
                } else {
                    $food->user_status = 0;
                }
                $category = Category::where('category_id', $food->category_id)->first();
                if ($category->status == 1) {
                    $food->category_status = 1;
                } else {
                    $food->category_status = 0;
                }
                $food->category_name = $category->category_name;
                $food->price = $food->price;
                $food->date = date('Y-m-d', strtotime($food->date_of_availability));
                $food->time = date('h:i a', strtotime($food->time_of_availability));

                $profile = ProfileInformation::where('user_id', $food->offered_by)->first();
                if (!empty($profile->image)) {
                    $food->image = $profile->image;
                }

                if (!empty($food->food_images)) {
                    //getting the food images
                    $images = $food->food_images;
                    $food->foodImages = unserialize($images);
                }
                if ($food->date >= $today && $food->user_status == 1) {
                    $available_foods[] = $food;
                }

                if ($food->date < $today && $food->user_status == 1) {
                    $closed_food_items[] = $food;
                }

                /* check if the delivery date is today and food creator is active and food category is active */
                // if ($food->date == $today && $food->user_status == 1 && $food->category_status == 1 && $jst_current_time >= $food->start_publication_time && $jst_current_time <= $food->end_publication_time) {
                //     $today_food_list[] = $food;
                // }

                /* check if the delivery date is tomorrow and food creator is active and food category is active */
                // if ($food->date == $tomorrow && $food->user_status == 1 && $food->category_status == 1 && $jst_current_time >= $food->start_publication_time) {
                //     $tomorrow_food_list[] = $food;
                // }
            }
        }

        return view('frontend.index', ['foodItems' => $foodItems, 'available_foods' => $available_foods, 'closed_food_items' => $closed_food_items]);
    }
    public function privacy()
    {
        return view('frontend.privacy-policy');
    }
    public function terms()
    {
        return view('frontend.Terms & conditions');
    }
    public function faq()
    {
        return view('frontend.faq');
    }
    public function cart()
    {
        return view('frontend.shopping-cart');
    }
    public function aboutUs()
    {
        return view('frontend.about-us');
    }
    public function contactUs()
    {
        return view('frontend.contact-us');
    }

}

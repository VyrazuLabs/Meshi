<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
use App\Models\Category\Category;
use App\Models\ProfileInformation;
use Auth;


class FrontendController extends Controller
{
    public function index() {
        $today = date("Y-m-d");
        $tomorrow = date('Y-m-d',  strtotime($today . ' +1 day'));
        $day_after_tomorrow = date('Y-m-d',  strtotime($today . ' +2 day'));
        $next_day_of_tomorrow = date('Y-m-d',  strtotime($today . ' +3 day'));

        /* food items available on tomorrow */
        if(Auth::check()){
            $tomorrow_food_items = FoodItem::where('status',1)
                                           ->whereDate('date_of_availability',$tomorrow)
                                           ->where('offered_by','!=',Auth::User()->user_id)
                                           ->get();

           $day_after_tomorrow_food_items = FoodItem::where('status',1)
                                                    ->whereDate('date_of_availability',$day_after_tomorrow)
                                                    ->where('offered_by','!=',Auth::User()->user_id)
                                                    ->get();

            $next_day_of_tomorrow_food_items = FoodItem::where('status',1)
                                                       ->whereDate('date_of_availability',$next_day_of_tomorrow)
                                                       ->where('offered_by','!=',Auth::User()->user_id)
                                                       ->get();
        }
        else {
            $tomorrow_food_items = FoodItem::where('status',1)
                                           ->whereDate('date_of_availability',$tomorrow)
                                           ->get();

           $day_after_tomorrow_food_items = FoodItem::where('status',1)
                                                    ->whereDate('date_of_availability',$day_after_tomorrow)
                                                    ->get();

            $next_day_of_tomorrow_food_items = FoodItem::where('status',1)
                                                       ->whereDate('date_of_availability',$next_day_of_tomorrow)
                                                       ->get();

        }
        
    	if(!empty($tomorrow_food_items)) {
    		foreach ($tomorrow_food_items as $key => $food) {
    			$category = Category::where('category_id',$food->category_id)->first();
    			$food->category_name = $category->category_name;
                $food->price = $food->price;
                $food->date = date('Y-m-d', strtotime($food->date_of_availability));
                $food->time = date('h:i a', strtotime($food->time_of_availability));

                $profile = ProfileInformation::where('user_id',$food->offered_by)->first();
                if(!empty($profile->image)) {
                    $food->image = $profile->image;
                }

                if(!empty($food->food_images)) {
          // echo"<pre>";print_r($food->food_images);die;

                    //getting the food images
                    $images = $food->food_images;
                    $food->foodImages = unserialize($images);

                }
    		}
    	}

        /* food items available on day after tomorrow */
        if(!empty($day_after_tomorrow_food_items)) {
            foreach ($day_after_tomorrow_food_items as $key => $food) {
                $category = Category::where('category_id',$food->category_id)->first();
                $food->category_name = $category->category_name;
                $food->price = $food->price;
                $food->date = date('Y-m-d', strtotime($food->date_of_availability));
                $food->time = date('h:i a', strtotime($food->time_of_availability));

                $profile = ProfileInformation::where('user_id',$food->offered_by)->first();
                if(!empty($profile->image)) {
                    $food->image = $profile->image;
                }

                if(!empty($food->food_images)) {
          // echo"<pre>";print_r($food->food_images);die;

                    //getting the food images
                    $images = $food->food_images;
                    $food->foodImages = unserialize($images);

                }
            }
        }


        /* food items available on the next day of day after tomorrow */
        if(!empty($next_day_of_tomorrow_food_items)) {
            foreach ($next_day_of_tomorrow_food_items as $key => $food) {
                $category = Category::where('category_id',$food->category_id)->first();
                $food->category_name = $category->category_name;
                $food->price = $food->price;
                $food->date = date('Y-m-d', strtotime($food->date_of_availability));
                $food->time = date('h:i a', strtotime($food->time_of_availability));

                $profile = ProfileInformation::where('user_id',$food->offered_by)->first();
                if(!empty($profile->image)) {
                    $food->image = $profile->image;
                }

                if(!empty($food->food_images)) {
          // echo"<pre>";print_r($food->food_images);die;
                    
                    //getting the food images
                    $images = $food->food_images;
                    $food->foodImages = unserialize($images);

                }
            }
        }

    	return view('frontend.index',['tomorrow_food_items'=>$tomorrow_food_items,'day_after_tomorrow_food_items'=>$day_after_tomorrow_food_items,'next_day_of_tomorrow_food_items'=>$next_day_of_tomorrow_food_items,'next_day_of_tomorrow'=>$next_day_of_tomorrow]);
    }
    public function privacy() {
        return view('frontend.privacy-policy');
    }
    public function terms() {
        return view('frontend.Terms & conditions');
    }
    public function faq() {
        return view('frontend.faq');
    }
    public function cart() {
        return view('frontend.shopping-cart');
    }
    public function aboutUs() {
        return view('frontend.about-us');
    }
    public function contactUs() {
        return view('frontend.contact-us');
    }
    



}

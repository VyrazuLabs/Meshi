<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
use App\Models\Category\Category;
use App\Models\ProfileInformation;

class FrontendController extends Controller
{
    public function index() {
        $today = date("Y-m-d");
        $tomorrow = date('Y-m-d',  strtotime($today . ' +1 day'));
        $day_after_tomorrow = date('Y-m-d',  strtotime($today . ' +2 day'));
        $next_day_of_tomorrow = date('Y-m-d',  strtotime($today . ' +3 day'));

        /* food items available on tomorrow */
        $tomorrow_food_items = FoodItem::where('status',1)
                                       ->whereDate('date_of_availability',$tomorrow)
                                       ->get();
        
    	if(!empty($tomorrow_food_items)) {
    		foreach ($tomorrow_food_items as $key => $food) {
    			$category = Category::where('category_id',$food->category_id)->first();
    			$food->category_name = $category->category_name;
                $food->price = $food->price;
                $food->date = date('d-m-Y', strtotime($food->date_of_availability));
                $food->time = date('h:i a', strtotime($food->time_of_availability));

                $profile = ProfileInformation::where('user_id',$food->offered_by)->first();
                if(!empty($profile->image)) {
                    $food->image = $profile->image;
                }

                if(!empty($food->food_images)) {
                    //getting the food images
                    $images = $food->food_images;
                    $food->foodImages = unserialize($images);

                }
    		}
    	}

        /* food items available on day after tomorrow */
        $day_after_tomorrow_food_items = FoodItem::where('status',1)
                                       ->whereDate('date_of_availability',$day_after_tomorrow)
                                       ->get();
        
        if(!empty($day_after_tomorrow_food_items)) {
            foreach ($day_after_tomorrow_food_items as $key => $food) {
                $category = Category::where('category_id',$food->category_id)->first();
                $food->category_name = $category->category_name;
                $food->price = $food->price;
                $food->date = date('d-m-Y', strtotime($food->date_of_availability));
                $food->time = date('h:i a', strtotime($food->time_of_availability));

                $profile = ProfileInformation::where('user_id',$food->offered_by)->first();
                if(!empty($profile->image)) {
                    $food->image = $profile->image;
                }

                if(!empty($food->food_images)) {
                    //getting the food images
                    $images = $food->food_images;
                    $food->foodImages = unserialize($images);

                }
            }
        }


        /* food items available on the next day of day after tomorrow */
        $next_day_of_tomorrow_food_items = FoodItem::where('status',1)
                                       ->whereDate('date_of_availability',$next_day_of_tomorrow)
                                       ->get();
        
        if(!empty($next_day_of_tomorrow_food_items)) {
            foreach ($next_day_of_tomorrow_food_items as $key => $food) {
                $category = Category::where('category_id',$food->category_id)->first();
                $food->category_name = $category->category_name;
                $food->price = $food->price;
                $food->date = date('d-m-Y', strtotime($food->date_of_availability));
                $food->time = date('h:i a', strtotime($food->time_of_availability));

                $profile = ProfileInformation::where('user_id',$food->offered_by)->first();
                if(!empty($profile->image)) {
                    $food->image = $profile->image;
                }

                if(!empty($food->food_images)) {
                    //getting the food images
                    $images = $food->food_images;
                    $food->foodImages = unserialize($images);

                }
            }
        }
    	return view('frontend.index',['tomorrow_food_items'=>$tomorrow_food_items,'day_after_tomorrow_food_items'=>$day_after_tomorrow_food_items,'next_day_of_tomorrow_food_items'=>$next_day_of_tomorrow_food_items,'next_day_of_tomorrow'=>$next_day_of_tomorrow]);
    }



}

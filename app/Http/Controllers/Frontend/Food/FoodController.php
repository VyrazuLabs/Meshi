<?php

namespace App\Http\Controllers\Frontend\Food;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
use App\Models\Category\Category;
use App\Models\ProfileInformation;
use App\Models\User;
use App\Models\Food\FoodItemCosting;

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
            $food_details->date = date('d-m-Y', strtotime($food_details->date_of_availability));
            // $food_details->time = date('h:i: a', strtotime($food_details->time_of_availability));

            $profile = ProfileInformation::where('user_id',$food_details->offered_by)->first();
            if(!empty($profile->image)) {
                $food_details->image = $profile->image;
            }
            $food_details->address = $profile->address;

            $user = User::where('user_id',$food_details->offered_by)->first();
            if(!empty($user)) {
                $food_details->made_by = $user->name;
            }

            if(!empty($food_details->food_images)) {
                //getting the food images
                $images = $food_details->food_images;
                $foodImages = unserialize($images);
            }
			$foodCosting = FoodItemCosting::where('food_item_id',$food_details->food_item_id)->pluck('tax_name','tax_amount');

			if(!empty($food_details->shipping_fee)) {
				$shipping_cost = $food_details->shipping_fee;
			}
			else {
				$shipping_fee = 0;
			}
			$cost = $shipping_cost+$food_details->price;

			foreach ($foodCosting as $key => $costing) {
				$cost = $key+$cost;
			}
    	}
    	return view('frontend.food.details',['food_details'=>$food_details,'foodImages'=>$foodImages,'foodCosting'=>$foodCosting,'cost'=>$cost,'time_of_availability'=>$time_of_availability]);
    }
}

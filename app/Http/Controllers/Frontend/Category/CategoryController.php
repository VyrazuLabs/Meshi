<?php

namespace App\Http\Controllers\Frontend\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Food\FoodItem;
use App\Models\ProfileInformation;

class CategoryController extends Controller
{
    public function category() {
      	$categories = Category::where('status',1)
      						  ->where('parent_id',0)
      						  ->pluck('category_name','category_id');

	  	$sub_categories = Category::where('status',1)
							  ->where('parent_id','!=',0)
							  ->pluck('category_name','category_id');

      	// echo"<pre>";print_r($categories);die;
    	return view('frontend.category.category',['categories'=>$categories,'sub_categories'=>$sub_categories]);
    }

    public function allCategory() {
    	$categories = Category::where('status',1)
      						  ->where('parent_id',0)
      						  ->pluck('category_name','category_id');

	  	$sub_categories = Category::where('status',1)
							  ->where('parent_id','!=',0)
							  ->pluck('category_name','category_id');

	  	$all_categories = Category::where('status',1)->pluck('category_name','category_id');
      $food_items = FoodItem::where('status',1)->get();
      if(!empty($food_items)) {
        foreach ($food_items as $key => $food) {
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

    	return view('frontend.category.main-category',['categories'=>$categories,'sub_categories'=>$sub_categories,'all_categories'=>$all_categories,'food_items'=>$food_items]);
    }
}

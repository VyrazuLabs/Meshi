<?php

namespace App\Http\Controllers\Frontend\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Food\FoodItem;
use App\Models\ProfileInformation;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Auth;

class CategoryController extends Controller
{
    public function category() {
      /* get all the list of main categories */
      $categories = Category::where('status',1)
      						          ->where('parent_id',0)
      						          ->pluck('category_name','category_id');

      /* get all the list of sub categories */
	  	$sub_categories = Category::where('status',1)
							                  ->where('parent_id','!=',0)
							                  ->pluck('category_name','category_id');

      $today = date("Y-m-d");
      /* food items available */
      if(Auth::check()){
        $food_items = FoodItem::where('status',1)
                              ->where('date_of_availability','>',$today)
                              ->where('offered_by','!=',Auth::User()->user_id)
                              ->orderBy('date_of_availability','ASC')
                              ->paginate(5);
      }
      else {
        $food_items = FoodItem::where('status',1)
                              ->where('date_of_availability','>',$today)
                              ->orderBy('date_of_availability','ASC')
                              ->paginate(5);
      }

      if(!empty($food_items)) {
        foreach ($food_items as $key => $food) {
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
            //getting the food images
            $images = $food->food_images;
            $food->foodImages = unserialize($images);
          }
        }
      }
    	return view('frontend.category.category',['categories'=>$categories,'sub_categories'=>$sub_categories,'food_items'=>$food_items]);
    }

    public function allCategory() {
      /* get all the list of main categories */
    	$categories = Category::where('status',1)
      						          ->where('parent_id',0)
      						          ->pluck('category_name','category_id');

      /* get all the list of sub categories */
	  	$sub_categories = Category::where('status',1)
							                  ->where('parent_id','!=',0)
							                  ->pluck('category_name','category_id');

      /* get all the categories */
	  	$all_categories = Category::where('status',1)->pluck('category_name','category_id');

      $today = date("Y-m-d");
      /* food items available */
      if(Auth::check()){
        $food_items = FoodItem::where('status',1)
                              ->where('date_of_availability','>',$today)
                              ->where('offered_by','!=',Auth::User()->user_id)
                              ->orderBy('date_of_availability','ASC')
                              ->paginate(5);
      }
      else {
        $food_items = FoodItem::where('status',1)
                              ->where('date_of_availability','>',$today)
                              ->orderBy('date_of_availability','ASC')
                              ->paginate(5);
      }

      if(!empty($food_items)) {
        foreach ($food_items as $key => $food) {
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
            //getting the food images
            $images = $food->food_images;
            $food->foodImages = unserialize($images);
          }
        }
      }
    	return view('frontend.category.main-category',['categories'=>$categories,'sub_categories'=>$sub_categories,'all_categories'=>$all_categories,'food_items'=>$food_items]);
    }
}

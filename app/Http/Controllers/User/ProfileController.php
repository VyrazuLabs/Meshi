<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProfileInformation;
use App\Models\Food\FoodItem;
use App\Models\Category\Category;
use App\Models\Review\Review;
use Auth;

class ProfileController extends Controller
{   
    public function profile($user_id = null) {

    	// $profile_details = [];
    	$user = User::where('user_id',$user_id)->first();
        if(!empty($user)) {
            $profile = ProfileInformation::where('user_id',$user_id)->first();
            if(!empty($profile->image)) {
                $user->image = $profile->image;
            }
            if(!empty($profile->cover_image)) {
                $user->cover_image = $profile->cover_image;
            }
            if(!empty($profile->city)) {
                $user->city = $profile->city;
            }
            $user->description = $profile->description;
            $user->total_dishes = $profile->total_dishes;
            $user->phone_number = $profile->phone_number;
            $user->address = $profile->address;
            $user->user_introduction = $profile->user_introduction;
            $user->profile_message = $profile->profile_message;
            if(!empty($profile->video_link)) {
                $user->video_link = $profile->video_link;
            }

            $food_items = FoodItem::where('status',1)->where('offered_by',$user_id)->orderBy('date_of_availability','ASC')->get();
            if(!empty($food_items)) {
                foreach ($food_items as $key => $food) {
                    $category = Category::where('category_id',$food->category_id)->first();
                    $food->category_name = $category->category_name;
                    $food->price = $food->price;
                    $food->date = date('Y-m-d', strtotime($food->date_of_availability));

                    $profile = ProfileInformation::where('user_id',$user_id)->first();
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

            $reviews = Review::where('user_id',$user_id)->get();
            foreach ($reviews as $key => $review) {
                $profile = ProfileInformation::where('user_id',$review->reviewed_by)->first();
                if(!empty($profile->image)) {
                    $review->reviewed_by_image = $profile->image;
                }
                $user_profile = ProfileInformation::where('user_id',$user_id)->first();
                if(!empty($user_profile)) {
                    $review->age = $user_profile->age;
                    $review->gender = $user_profile->gender;
                }
            }
        }
        else {
            return back();
        }
    	return view('user.profile',['user'=>$user,'food_items'=>$food_items,'reviews'=>$reviews]);
    }

    public function edit($user_id = null) {
        
        if($user_id == Auth::User()->user_id) {
            $user = User::where('user_id',$user_id)->first();
            $profile = ProfileInformation::where('user_id',$user_id)->first();
            if(!empty($profile)) {
                if(!empty($profile->reason_for_registration)) {
                    $user->reason_for_registration_edit = explode(',', $profile->reason_for_registration);
                    $user->reason_for_registration = explode(',', $profile->reason_for_registration);
                }

                if(!empty($profile->cover_image)) {
                    $user->cover_image = $profile->cover_image;
                }

                $user->address = $profile->address;
                $user->phone_number = $profile->phone_number;
                $user->description = $profile->description;
                $user->age = $profile->age;
                $user->zipcode = $profile->zipcode;
                $user->prefectures = $profile->prefectures;
                $user->municipality = $profile->municipality;
                $user->gender = $profile->gender;
                $user->profession = $profile->profession;
                $user->image = $profile->image;
                $user->user_introduction = $profile->user_introduction;
                $user->profile_message = $profile->profile_message;
                $user->video_link = $profile->video_link;
                $user->deliverable_area = $profile->deliverable_area;
            }
        }

        else {
            return back();
        }

        return view('frontend.auth.user-register',['user'=>$user,'form_type' => 'edit']);
    }


    // public function uploadCoverImage(Request $request) {
    //     $file = $request->file();
    //     echo"<pre>";print_r($file);die;
    // }



}

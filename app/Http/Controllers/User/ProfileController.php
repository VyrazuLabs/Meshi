<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Food\FoodItem;
use App\Models\ProfileInformation;
use App\Models\User;
use Auth;
use Session;

class ProfileController extends Controller
{
    public function profile($user_id = null)
    {
        /* getting the current time of japan */
        $jst_time_zone = date_default_timezone_set('Asia/Tokyo');
        $jst_current_date_time = strtotime(date("Y-m-d H:i:s"));
        $jst_current_date = date("Y-m-d");

        /* getting the user associated with the user id*/
        $user = User::where('user_id', $user_id)->first();
        if (!empty($user)) {
            /* getting teh profile information of teh user */
            $profile = ProfileInformation::where('user_id', $user_id)->first();
            if (!empty($profile->image)) {
                $user->image = $profile->image;
            }
            if (!empty($profile->cover_image)) {
                $user->cover_image = $profile->cover_image;
            }
            if (!empty($profile->deliverable_area)) {
                $user->deliverable_area = $profile->deliverable_area;
            }
            $user->description = $profile->description;
            $user->total_dishes = $profile->total_dishes;
            $user->phone_number = $profile->phone_number;
            $user->address = $profile->address;
            $user->user_introduction = $profile->user_introduction;
            $user->profile_message = $profile->profile_message;
            if (!empty($profile->video_link)) {
                $user->video_link = $profile->video_link;
            }

            /* get all the active food items created by the user */
            $food_items = FoodItem::where('status', 1)
                ->where('offered_by', $user_id)
                ->orderBy('date_of_availability', 'DESC')
                ->get();

            if (!empty($food_items)) {
                foreach ($food_items as $key => $food) {

                    /* convert publication daterange in timestamps */
                    $dateBegin = strtotime($food->start_publication_date . ' ' . $food->start_publication_time);
                    $dateEnd = strtotime($food->end_publication_date . ' ' . $food->end_publication_time);

                    $category = Category::where('category_id', $food->category_id)->first();
                    if ($category->status == 1) {
                        $food->category_status = 1;
                    } else {
                        $food->category_status = 0;
                    }

                    $food->category_name = $category->category_name;
                    $food->price = $food->price;
                    $food->date = date('Y-m-d', strtotime($food->date_of_availability));

                    $profile = ProfileInformation::where('user_id', $user_id)->first();
                    if (!empty($profile->image)) {
                        $food->image = $profile->image;
                    }

                    if (!empty($food->food_images)) {
                        //getting the food images
                        $images = $food->food_images;
                        $food->foodImages = unserialize($images);
                    }

                    /* add flag if order is closed */
                    if ($jst_current_date_time > $dateEnd) {
                        $food->closed_order = 1;
                    } else {
                        $food->closed_order = 0;
                    }
                }
            }

            /* get the reviews of the eater for that food item */
            $eater_reviews = FoodItem::where('food_item.offered_by', $user_id)
                ->join('eater_review', 'food_item.food_item_id', '=', 'eater_review.food_item_id')
                ->orderBy('eater_review.id', 'DESC')
                ->get();

            /* array of age range */
            $langName = [];
            if (Session::has('lang_name')) {
                $langName = Session::get('lang_name');
            }

            if ($langName == 'en') {
                $ageRangeArray = array("10's" => "10", "20's" => "20", "Thirties" => "30", "Forties" => "40", "Fifties" => "50", "60's" => "60", "70's" => "70", "60's" => "60", "80's" => "80");
            } else {
                $ageRangeArray = array("10代" => "10", "20代" => "20", "30代" => "30", "フォーティズ" => "40", "五十代" => "50", "60年代" => "60", "70年代" => "70", "80年代" => "80");
            }

            foreach ($eater_reviews as $key => $review) {
                $eater = User::where('user_id', $review->reviewed_by)->first();
                $user_profile = ProfileInformation::where('user_id', $review->reviewed_by)->first();
                if (!empty($user_profile) && !empty($eater)) {
                    $get_age = array_search($user_profile->age, $ageRangeArray);
                    $review->age = $get_age;
                    $review->gender = ucfirst($user_profile->gender);
                    $review->eater_name = $eater->nick_name;
                }
            }
        } else {
            return back();
        }
        return view('user.profile', ['user' => $user, 'food_items' => $food_items, 'reviews' => $eater_reviews]);
    }

    /* get the view of user profile updation form */
    public function edit($user_id = null)
    {
        if ($user_id == Auth::User()->user_id) {
            $user = User::where('user_id', $user_id)->first();
            $profile = ProfileInformation::where('user_id', $user_id)->first();
            if (!empty($profile)) {
                if (!empty($profile->reason_for_registration)) {
                    $user->reason_for_registration_edit = explode(',', $profile->reason_for_registration);
                    $user->reason_for_registration = explode(',', $profile->reason_for_registration);
                }

                if (!empty($profile->cover_image)) {
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
        } else {
            return back();
        }

        return view('frontend.auth.user-register', ['user' => $user, 'form_type' => 'edit']);
    }

    // public function uploadCoverImage(Request $request) {
    //     $file = $request->file();
    //     echo"<pre>";print_r($file);die;
    // }

}

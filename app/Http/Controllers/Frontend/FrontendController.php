<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement\News;
use App\Models\Category\Category;
use App\Models\Food\FoodItem;
use App\Models\ProfileInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class FrontendController extends Controller
{
    public function index()
    {
        /* getting the current time of japan */
        $jst_time_zone = date_default_timezone_set('Asia/Tokyo');
        $jst_current_date_time = strtotime(date("Y-m-d H:i:s"));
        $jst_current_date = date("Y-m-d");
        $available_foods = [];
        $closed_food_items = [];

        /* available active food items */
        $foodItems = FoodItem::where('date_of_availability', '>=', $jst_current_date)
            ->where('status', 1)
            ->orderBy('date_of_availability', 'ASC')
            ->get();

        if (!empty($foodItems)) {
            $i = 1;
            foreach ($foodItems as $key => $food) {
                /* convert publication daterange in timestamps */
                $dateBegin = strtotime($food->start_publication_date . ' ' . $food->start_publication_time);
                $dateEnd = strtotime($food->end_publication_date . ' ' . $food->end_publication_time);

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
                /* make an array of 8 available foods that satisfies the publication period */
                if ($jst_current_date_time > $dateBegin && $jst_current_date_time < $dateEnd) {
                    if ($i <= 8) {
                        $available_foods[] = $food;
                    }
                    $i++;
                }
            }
        }

        $closed_foods = FoodItem::where('date_of_availability', '<=', $jst_current_date)
            ->where('status', 1)
            ->orderBy('date_of_availability', 'DESC')
            ->get();

        if (!empty($closed_foods)) {
            $i = 1;
            foreach ($closed_foods as $key => $food) {
                /* convert publication daterange in timestamps */
                $dateBegin = strtotime($food->start_publication_date . ' ' . $food->start_publication_time);
                $dateEnd = strtotime($food->end_publication_date . ' ' . $food->end_publication_time);

                $food->date = date('Y-m-d', strtotime($food->date_of_availability));
                // $food->dateBegin = $dateBegin;
                // $food->dateEnd = $dateEnd;
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

                /* make an array of closed foods */
                if ($jst_current_date_time > $dateEnd) {
                    if ($i <= 8) {
                        $closed_food_items[] = $food;
                    }
                    $i++;
                }
            }
        }

        $newsList = News::where('status', 1)->orderBy('date', 'DESC')->take(3)->get();

        // echo "<pre>";
        // print_r($closed_food_items);die;

        return view('frontend.index', ['foodItems' => $foodItems, 'available_foods' => $available_foods, 'closed_food_items' => $closed_food_items, 'news' => $newsList]);
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

    public function newsDetails($news_id = null)
    {
        $news = News::where('news_id', $news_id)->first();
        return view('frontend.news-details', ['news' => $news]);
    }

    public function beginnerTutorial()
    {
        return view('frontend.beginners-tutorial');
    }

    public function setSession(Request $request)
    {
        $input = Input::all();
        $order_details = [];
        $order_details = $input;

        /* set session variable when clicked on private URLs */
        Session::put('buy_food', $order_details);
        Session::put('redirect_order_details', 'redirect_order_details');

        echo json_encode($order_details);

    }

}

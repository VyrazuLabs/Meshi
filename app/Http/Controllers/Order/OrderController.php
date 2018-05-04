<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
use App\Models\Order\Order;
use App\Models\ProfileInformation;
use App\Models\Review\CreatorReview;
use App\Models\Review\EaterReview;
use App\Models\User;
use Auth;

class OrderController extends Controller
{

    // public function makeOrder($cart_id = null) {
    //     $cart = Cart::where('cart_id',$cart_id)->first();
    //     return view('order.make-order',['food_item_id'=>$cart->food_item_id,'amount'=>$cart->price]);
    // }

    // public function makeOrderWithPaypal($cart_id = null) {
    //     echo "hello";die;
    //     $cart = Cart::where('cart_id',$cart_id)->first();
    //     return view('order.make-order-with-paypal',['food_item_id'=>$cart->food_item_id,'amount'=>$cart->price]);
    // }

    public function orderDetails()
    {
        return view('order.order-details');
    }

    /**
     * [ordered list of eater]
     * @return [type] [description]
     */
    public function purchasedList()
    {
        //getting all the orders
        $orders = Order::where('status', 1)
            ->where('ordered_by', Auth::User()->user_id)
            ->orderBy('date_of_delivery', 'DESC')
            ->paginate(3);

        if (!empty($orders)) {
            foreach ($orders as $key => $order) {
                $order->date = date('Y-m-d', strtotime($order->date_of_delivery));
                $order->time = date('h:i a', strtotime($order->time));

                /* get food item details */
                $foodItem = FoodItem::where('food_item_id', $order->food_item_id)->first();

                //getting the food images
                if (!empty($foodItem->food_images)) {
                    $images = $foodItem->food_images;
                    $order->food_images = unserialize($images);
                }

                if (!empty($foodItem)) {
                    $order->item_name = $foodItem->item_name;

                    $user = User::where('user_id', $foodItem->offered_by)->first();
                    $order->nick_name = $user->nick_name;
                    $order->offered_by = $foodItem->offered_by;
                }

                $review = EaterReview::where('order_id', $order->order_id)
                    ->where('reviewed_by', Auth::User()->user_id)->first();
                if (!empty($review)) {
                    $order->review_status = 1;
                } else {
                    $order->review_status = 0;
                }
            }
        }
        return view('frontend.order.purchase-list', ['orders' => $orders]);
    }

    public function orderedList()
    {
        $today = date("Y-m-d");
        $previousOrders = [];
        $upcomingOrders = [];

        /* getting all the orders */
        $orders = Order::where('order.status', 1)
            ->join('food_item', 'order.food_item_id', '=', 'food_item.food_item_id')
            ->where('food_item.offered_by', Auth::User()->user_id)
            ->orderBy('order.date_of_delivery', 'DESC')
            ->get();

        if (!empty($orders)) {
            foreach ($orders as $key => $order) {
                $order->date = date('Y-m-d', strtotime($order->date_of_delivery));
                /* getting the food images */
                if (!empty($order->food_images)) {
                    $order->foodImages = unserialize($order->food_images);
                }

                /* getting the profile information of the buyer */
                $profileDetails = ProfileInformation::where('user_id', $order->ordered_by)->first();
                if (!empty($profileDetails)) {
                    $order->address = $profileDetails->address;
                    $order->phone_number = $profileDetails->phone_number;
                    $order->gender = $profileDetails->gender;
                    $order->age = $profileDetails->age;
                    $order->description = $profileDetails->description;
                    if (!empty($profileDetails->image)) {
                        $order->image = $profileDetails->image;
                    }
                }

                /* getting the account details of the buyer */
                $user = User::where('user_id', $order->ordered_by)->first();
                if (!empty($user)) {
                    $order->name = $user->name;
                    $order->nick_name = $user->nick_name;
                }

                /* check for reviews */
                $creator_review = CreatorReview::where('order_id', $order->order_id)
                    ->where('reviewed_by', Auth::User()->user_id)->first();
                if (!empty($creator_review)) {
                    $order->review_status = 1; //alraedy reviewed
                } else {
                    $order->review_status = 0; //not yet reviewed
                }

                /* make different array for upcoming and previous orders */
                if ($order->date < $today) {
                    $previousOrders[] = $order;
                } else {
                    $upcomingOrders[] = $order;
                }
            }
        }
        return view('frontend.order.order-list', ['upcomingOrders' => $upcomingOrders, 'previousOrders' => $previousOrders]);
    }
}

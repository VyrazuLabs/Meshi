<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
use App\Models\Order\Order;
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
                }
            }
        }
        // echo "<pre>";
        // print_r($order);die;
        return view('order.purchase-list', ['orders' => $orders]);
    }
}

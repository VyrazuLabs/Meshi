<?php

namespace App\Http\Controllers\Admin\Food;

use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
use App\Models\Order\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function lists()
    {
        $orders = Order::orderBy('date_of_delivery', 'DESC')->get();
        foreach ($orders as $key => $order) {
            $user = User::where('user_id', $order->ordered_by)->first();
            if (!empty($user)) {
                $order->eater_name = $user->name;
            }
            $food_item = FoodItem::where('food_item_id', $order->food_item_id)->first();
            if (!empty($food_item)) {
                $order->item_name = $food_item->item_name;
                $order->offered_by = $food_item->offered_by;
                $creator = User::where('user_id', $food_item->offered_by)->first();
                if (!empty($creator)) {
                    $order->creator_name = $creator->name;
                }
            }
        }
        return view('order.order-list', ['orders' => $orders]);
    }
}

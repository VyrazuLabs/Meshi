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
        $orders = Order::get();
        foreach ($orders as $key => $order) {
            $user = User::where('user_id', $order->ordered_by)->first();
            if (!empty($user)) {
                $order->user_name = $user->name;
            }
            $food_item = FoodItem::where('food_item_id', $order->food_item_id)->first();
            if (!empty($food_item)) {
                $order->item_name = $food_item->item_name;
            }

        }
        return view('order.order-list', ['orders' => $orders]);
    }
}

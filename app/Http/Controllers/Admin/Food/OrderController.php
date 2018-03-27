<?php

namespace App\Http\Controllers\Admin\Food;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function lists() {
    	$orders = Order::get();
    	foreach ($orders as $key => $order) {
    		$user = User::where('user_id',$order->ordered_by)->first();
            if(!empty($user)) {
                $order->user_name = $user->name;
            }
    	}
    	return view('order.order-list',['orders'=>$orders]);
    }
}

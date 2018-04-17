<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use Crypt;
use App\Models\Order\Cart;
use Auth;

class OrderController extends Controller
{	
	/* adding items in cart */
	public function addToCart() {
		$input = Input::all();
		$cartValidator = $this->cartValidator($input);

		$price = Crypt::decrypt($input['amount']);
		$food_item_id = Crypt::decrypt($input['food_item_id']);

	    if($cartValidator->fails()) {
	    	$cart = [
	                    "success" => 0,
	                    "error" => 1,
	                    "msg" => $cartValidator->errors()
	                ];
	    }
	    else {
	    	$cart = Cart::create([	'food_item_id' => $food_item_id,
								   	'cart_id' => uniqid(),
						           	'price' => $price,
						           	'time' => $input['slot'],
						           	'booked_by' => Auth::User()->user_id
						        ]);
	    }
      	echo json_encode($cart);
	}


	protected function cartValidator($request) {
    	return Validator::make($request,[ 
    										'slot' => 'required',
    										'food_item_id' => 'required',
    										'amount' => 'required',
    									]);
  	}


    // public function makeOrder($cart_id = null) {
    // 	$cart = Cart::where('cart_id',$cart_id)->first();
    // 	return view('order.make-order',['food_item_id'=>$cart->food_item_id,'amount'=>$cart->price]);
    // }

    // public function makeOrderWithPaypal($cart_id = null) {
    // 	echo "hello";die;
    // 	$cart = Cart::where('cart_id',$cart_id)->first();
    // 	return view('order.make-order-with-paypal',['food_item_id'=>$cart->food_item_id,'amount'=>$cart->price]);
    // }

  	public function orderDetails() {
  		return view('order.order-details');
  	}



   
}

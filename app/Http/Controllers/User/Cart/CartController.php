<?php

namespace App\Http\Controllers\User\Cart;

use App\Http\Controllers\Controller;
use App\Models\Order\Cart;
use Auth;
use Crypt;
use Illuminate\Support\Facades\Input;
use Validator;

class CartController extends Controller
{
    /**
     * [adding items in cart]
     */
    public function addToCart()
    {
        $input = Input::all();
        $cartValidator = $this->cartValidator($input);

        //decrypt price and food_item_id here
        $price = Crypt::decrypt($input['amount']);
        $food_item_id = Crypt::decrypt($input['food_item_id']);

        if ($cartValidator->fails()) {
            $cart = [
                "success" => 0,
                "error" => 1,
                "msg" => $cartValidator->errors(),
            ];
        } else {
            $cart = Cart::create(['food_item_id' => $food_item_id,
                'cart_id' => uniqid(),
                'price' => $price,
                'time' => $input['slot'],
                'booked_by' => Auth::User()->user_id,
            ]);
        }
        echo json_encode($cart);
    }

    /**
     * [validation rules for creating cart]
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    protected function cartValidator($request)
    {
        return Validator::make($request, [
            'slot' => 'required',
            'food_item_id' => 'required',
            'amount' => 'required',
        ]);
    }

    /**
     * [view of cart details]
     * @return [type] [description]
     */
    public function viewCart()
    {
        return view('cart.cart');
    }

    /**
     * [view of empty cart section]
     * @return [type] [description]
     */
    public function emptyCart()
    {
        return view('cart.empty-cart');
    }

}

<?php

namespace App\Http\Controllers\User\Cart;

use App\Http\Controllers\Controller;
use App\Models\Food\FoodItem;
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
                "validation_error" => 1,
            ];
        } else {
            $foodItem = FoodItem::where('food_item_id', $food_item_id)->first();
            $foodStock = $foodItem->quantity;
            if ($input['quantity'] <= $foodStock) {
                $cart = Cart::create(['food_item_id' => $food_item_id,
                    'cart_id' => uniqid(),
                    'price' => $price,
                    'time' => $input['slot'],
                    'quantity' => $input['quantity'],
                    'booked_by' => Auth::User()->user_id,
                ]);
            } else {
                $cart = [
                    "success" => 0,
                    "quantity_error" => 1,
                ];
            }

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
            'quantity' => 'required',
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

<?php

namespace App\Http\Controllers\User\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function viewCart() {
    	return view('cart.cart');
    }
}

<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
	public $fillable = array(
    					   'food_item_id',
    					   'cart_id',
				           'price',
				           'time',
				           'booked_by'
    					);
}

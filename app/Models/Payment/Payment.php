<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
	public $fillable = array(
    					   'order_id',
    					   'amount',
				           'payment_date'
    					);
}

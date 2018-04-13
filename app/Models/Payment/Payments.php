<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payments extends Model
{	
    use SoftDeletes;

    protected $table = 'payment';
	public $fillable = array(
    					   'order_id',
    					   'amount',
				           'payment_date'
    					);

    protected $dates = ['deleted_at'];
	
}

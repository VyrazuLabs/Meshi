<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'order';
    public $fillable = array(
        'food_item_id',
        'order_id',
        'order_number',
        'quantity',
        'ordered_by',
        'lat',
        'long',
        'address',
        'date_of_delivery',
        'time',
        'total_price',
        'status',
        'email_notification',
        'reviewed_by_eater',
        'reviewed_by_creator',
        'eater_review_notification',
        'creator_review_notification',
        'delivery_date_time',
    );

    protected $dates = ['deleted_at'];

}

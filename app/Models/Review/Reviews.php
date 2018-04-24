<?php

namespace App\Models\Review;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $table = 'reviews';
    public $fillable = array(
        'review_id',
        'reviewed_by',
        'food_item_id',
        'order_id',
        'quality_ratings',
        'quality_description',
        'delivery_ratings',
        'delivery_description',
        'communication_ratings',
        'communication_description',
    );

    protected $dates = ['deleted_at'];

}

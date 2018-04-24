<?php

namespace App\Models\Review;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
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
}

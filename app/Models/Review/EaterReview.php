<?php

namespace App\Models\Review;

use Illuminate\Database\Eloquent\Model;

class EaterReview extends Model
{
    protected $table = 'eater_review';
    public $fillable = array(
        'review_id',
        'reviewed_by',
        'food_item_id',
        'order_id',
        'quality_ratings',
        'delivery_ratings',
        'communication_ratings',
        'review_description',
    );
}

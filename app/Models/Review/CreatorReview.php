<?php

namespace App\Models\Review;

use Illuminate\Database\Eloquent\Model;

class CreatorReview extends Model
{
    protected $table = 'creator_review';
    public $fillable = array(
        'review_id',
        'reviewed_by',
        'food_item_id',
        'order_id',
        'communication_ratings',
        'communication_description',
    );
}

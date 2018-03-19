<?php

namespace App\Models\Review;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
	public $fillable = array(
    						'review_id',
				            'order_id',
				            'food_item_id',
				            'reviewed_by',
				            'review',
				            'review_description',
				            'user_id'
    					);
}

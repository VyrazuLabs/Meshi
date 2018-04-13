<?php

namespace App\Models\Review;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{	
    use SoftDeletes;

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

    protected $dates = ['deleted_at'];
	
}

<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    protected $table = 'food_item';
	public $fillable = array(
    						'food_item_id',
				            'item_name',
				            'category_id',
				            'food_images',
				            'date_of_availability',
				            'time_of_availability',
				            'food_description',
				            'offered_by',
				            'status',
				            'shipping_fee',
				            'price',
				            'short_info'
    					);
}

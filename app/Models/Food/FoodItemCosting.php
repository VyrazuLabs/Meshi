<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Model;

class FoodItemCosting extends Model
{
    protected $table = 'food_item_costing';
	public $fillable = array(
    						'food_item_id',
				            'tax_id',
				            'tax_name',
				            'tax_amount',
				            'tax_percentage'
    					);}

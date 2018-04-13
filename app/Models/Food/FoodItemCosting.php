<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class FoodItemCosting extends Model
{	

    use SoftDeletes;

    protected $table = 'food_item_costing';
	public $fillable = array(
    						'food_item_id',
				            'tax_id',
				            'tax_name',
				            'tax_amount',
				            'tax_percentage'
    					);

    protected $dates = ['deleted_at'];
	
}

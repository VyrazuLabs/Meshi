<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodItem extends Model
{	
    use SoftDeletes;
	
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
				            'short_info',
				            'deliverable_area',
				            'start_publication_date',
				            'start_publication_time',
				            'end_publication_date',
				            'end_publication_time'
    					);

    protected $dates = ['deleted_at'];

}

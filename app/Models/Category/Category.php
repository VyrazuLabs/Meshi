<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
	public $fillable = array(
    						'category_id',
    						'parent_id',
          					'category_name',
            				'description',
           					'status',
          					'created_by',
    					);
}

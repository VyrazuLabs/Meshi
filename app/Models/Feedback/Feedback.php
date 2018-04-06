<?php

namespace App\Models\Feedback;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
	public $fillable = array(
    						'feedback_id',
				            'name',
				            'email',
				            'subject',
				            'message'
    					);
}

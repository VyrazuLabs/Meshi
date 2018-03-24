<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileInformation extends Model
{
    protected $table = 'profile_information';
	public $fillable = array(
    						'user_id',
				            'phone_number',
				            'address',
				            'lat',
				            'long',
				            'description',
				            'image',
				            'video_link',
				            'age',
				            'total_dishes',
				            'created_by',
				            'zipcode',
				            'prefectures',
				            'municipality',
				            'gender',
				            'profession',
				            'reason_for_registration',
				            'job',
				            'user_introduction',
				            'profile_message'
    					);
}

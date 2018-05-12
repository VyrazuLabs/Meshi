<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileInformation extends Model
{
    use SoftDeletes;

    protected $table = 'profile_information';
    public $fillable = array(
        'user_id',
        'phone_number',
        'address',
        'lat',
        'long',
        'description',
        'image',
        'cover_image',
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
        'profile_message',
        'city',
        'deliverable_area',
    );

    protected $dates = ['deleted_at'];

}

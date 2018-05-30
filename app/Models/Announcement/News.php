<?php

namespace App\Models\Announcement;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public $fillable = array(
        'title',
        'news_id',
        'contents',
        'highlight',
        'status',
    );
}

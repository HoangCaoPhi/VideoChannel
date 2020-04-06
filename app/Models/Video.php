<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = [
        'id',
        'video_name',
        'video_image_avt',
        'video',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}

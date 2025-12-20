<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'title',
        'content',
        'youtube_link',
        'image_url',
        'video_url',
        'created_by',
        'status',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}

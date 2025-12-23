<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'title',
        'content',
        'youtube_link',
        'image_url',
        'video_url',
        'created_by',
        'status',
    ];

    public $timestamps = false; // karena tabel kamu cuma punya created_at
}

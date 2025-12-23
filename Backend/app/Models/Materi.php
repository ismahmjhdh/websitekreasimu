<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';

    protected $fillable = [
        'title',
        'description',
        'file_url',
        'access_password',
        'related_news_id',
        'created_by'
    ];

    public $timestamps = false;
}
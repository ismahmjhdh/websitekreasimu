<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapImage extends Model
{
    protected $fillable = ['title', 'image_path', 'order'];
}

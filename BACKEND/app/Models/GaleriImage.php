<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriImage extends Model
{
    protected $fillable = ['galeri_id', 'image_path', 'order'];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class, 'galeri_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'image_url',
        'type',
        'video_url',
        'caption',
        'created_by',
    ];

    public $timestamps = true;

    // Relationship dengan Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function images()
    {
        return $this->hasMany(GaleriImage::class, 'galeri_id')->orderBy('order');
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $search)
    {
        if (!empty($search)) {
            return $query->where('caption', 'LIKE', "%{$search}%");
        }
        return $query;
    }
}

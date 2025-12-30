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
        'pdf_url',
        'created_by',
        'status',
        'category',
    ];

    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function scopeSearch($query, $search)
    {
        if (!empty($search)) {
            return $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }
        return $query;
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeCategory($query, $category)
    {
        if (!empty($category)) {
            return $query->where('category', $category);
        }
        return $query;
    }

    public function scopeSortBy($query, $sort)
    {
        switch ($sort) {
            case 'terpopuler':
                return $query->orderBy('created_at', 'desc');
            case 'abjad':
                return $query->orderBy('title', 'asc');
            case 'terbaru':
            default:
                return $query->orderBy('created_at', 'desc');
        }
    }
}
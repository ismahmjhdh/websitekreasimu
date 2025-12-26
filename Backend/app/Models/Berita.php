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


    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    // Scope untuk pencarian
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

    // Scope untuk filter status
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Scope untuk sorting
    public function scopeSortBy($query, $sort)
    {
        switch ($sort) {
            case 'terpopuler':
                // Jika ada field views/popularity
                return $query->orderBy('created_at', 'desc');
            case 'abjad':
                return $query->orderBy('title', 'asc');
            case 'terbaru':
            default:
                return $query->orderBy('created_at', 'desc');
        }
    }
}

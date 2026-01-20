<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';

    protected $fillable = [
        'title',
        'description',
        'thumbnail_url',
        'access_password',
        'related_news_id',
        'created_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationship dengan MateriFile
    public function files()
    {
        return $this->hasMany(MateriFile::class)->orderBy('order');
    }

    // Relationship dengan Berita
    public function berita()
    {
        return $this->belongsTo(Berita::class, 'related_news_id');
    }

    // Relationship dengan Admin
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
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }
        return $query;
    }
}
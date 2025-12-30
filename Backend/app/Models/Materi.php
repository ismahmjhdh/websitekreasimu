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
        'file_url',
        'access_password',
        'related_news_id',
        'created_by',
    ];

    public $timestamps = false;

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
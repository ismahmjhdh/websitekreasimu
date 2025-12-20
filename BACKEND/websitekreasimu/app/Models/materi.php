<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = [
        'title',
        'description',
        'file_url',
        'access_password',
        'related_berita_id',
        'created_by',
    ];

    protected $hidden = [
        'access_password', // biar password tidak ikut tampil di API
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function berita()
    {
        return $this->belongsTo(berita::class, 'related_berita_id');
    }
}

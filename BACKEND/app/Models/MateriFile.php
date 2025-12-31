<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriFile extends Model
{
    use HasFactory;

    protected $table = 'materi_files';

    protected $fillable = [
        'materi_id',
        'file_name',
        'file_url',
        'file_type',
        'file_size',
        'order',
    ];

    public $timestamps = false;

    // Relationship dengan Materi
    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}

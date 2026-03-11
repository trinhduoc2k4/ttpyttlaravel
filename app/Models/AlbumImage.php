<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AlbumImage extends Model
{
    use Hasfactory;

    protected $fillable = [
        'album_id',
        'image_path',
        'sort_order'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}

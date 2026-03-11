<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Album extends Model
{
    use Hasfactory;

    protected $fillable = [
        'title',
        'slug',
        'cover_image',
        'status',
        'user_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images()
    {
        return $this->hasMany(AlbumImage::class, 'album_id')->orderBy('sort_order');
    }
}

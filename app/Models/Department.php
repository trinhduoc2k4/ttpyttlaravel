<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use Hasfactory;

    protected $fillable = ['name', 'code'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'department_id');
    }

    public function sentInternalDocuments()
    {
        return $this->hasMany(InternalDocument::class, 'sender_department_id');
    }
}

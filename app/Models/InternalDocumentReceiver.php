<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternalDocumentReceiver extends Model
{
    protected $fillable = [
        'internal_document_id',
        'department_id',
        'user_id',
        'is_read'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function internalDocument()
    {
        return $this->belongsTo(InternalDocument::class, 'internal_document_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternalDocument extends Model
{
    protected $fillable = [
        'sender_department_id',
        'created_by',
        'title',
        'code',
        'document_type',
        'issued_date',
        'issuer',
        'file_path',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function senderDepartment()
    {
        return $this->belongsTo(Department::class, 'sender_department_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function receivers()
    {
        return $this->hasMany(InternalDocumentReceiver::class, 'internal_document_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;


class LegalDocuments extends Model
{
    use Hasfactory;

    protected $fillable = [
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

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getIssuedDateFormattedAttribute()
    {
        if (!$this->issued_date) {
            return null;
        }

        return Carbon::parse($this->issued_date)->format('d/m/Y');
    }
}

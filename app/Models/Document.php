<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Document extends Model
{
    use HasUlids;

    protected $fillable = [
        'jenis_dokumen_id',
        'nomor_dokumen',
        'tanggal_pembuatan',
    ];

    protected $casts = [
        'tanggal_pembuatan' => 'datetime',
    ];

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class, 'jenis_dokumen_id');
    }

    public function businessTrip(): HasOne
    {
        return $this->hasOne(BusinessTrip::class, 'document_id');
    }


}

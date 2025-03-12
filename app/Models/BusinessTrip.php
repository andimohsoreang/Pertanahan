<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class BusinessTrip extends Model
{
    use HasUlids;

    protected $fillable = [
        'document_id',
        'seksi_id',
        'nomor_spm',
        'nomor_sp2d',
        'transport_antar_kota',
        'taksi_airport',
        'lain_lain',
        'grand_total',

    ];

    protected $casts = [
        'transport_antar_kota' => 'decimal:2',
        'taksi_airport' => 'decimal:2',
        'lain_lain' => 'decimal:2',
        'grand_total' => 'decimal:2',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

    public function pics(): HasMany
    {
        return $this->hasMany(Pic::class, 'business_trip_id');
    }

    // Relasi dengan file
    public function files()
    {
        return $this->hasMany(TripFile::class, 'business_trip_id');
    }

    // Scope untuk filter status perjalanan
    public function scopeByStatus($query, $status)
    {
        return $query->where('status_perjalanan', $status);
    }

    // Accessor untuk total biaya
    public function getTotalBiayaAttribute()
    {
        return $this->transport_antar_kota +
            $this->taksi_airport +
            $this->lain_lain;
    }

    // Accessor untuk status file
    public function getFileStatusAttribute()
    {
        if ($this->files->isEmpty()) {
            return 'Tidak Ada File';
        }

        $statuses = $this->files->pluck('status_berkas')->unique();

        return $statuses->count() > 1 ? 'Campuran' : $statuses->first();
    }

    // Mutator untuk mengatur grand total
    public function setGrandTotalAttribute($value)
    {
        $this->attributes['grand_total'] = round($value, 2);
    }

    // Method untuk mengecek kelengkapan dokumen
    public function isDocumentComplete()
    {
        return $this->document &&
            $this->files->isNotEmpty() &&
            $this->pics->isNotEmpty();
    }


}

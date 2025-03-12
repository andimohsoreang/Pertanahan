<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Lodging extends Model
{
    use HasUlids;

    protected $fillable = [
        'pic_id',
        'jumlah_malam',
        'satuan',
        'total',
    ];

    protected $casts = [
        'jumlah_malam' => 'integer',
        'satuan' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function pic(): BelongsTo
    {
        return $this->belongsTo(Pic::class, 'pic_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($lodging) {
            if (isset($lodging->jumlah_malam) && isset($lodging->satuan) && !isset($lodging->total)) {
                $lodging->total = $lodging->jumlah_malam * $lodging->satuan;
            }
        });

        static::updating(function ($lodging) {
            if (isset($lodging->jumlah_malam) && isset($lodging->satuan)) {
                $lodging->total = $lodging->jumlah_malam * $lodging->satuan;
            }
        });
    }
}

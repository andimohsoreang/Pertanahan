<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Perdiem extends Model
{
    use HasUlids;

    protected $fillable = [
        'pic_id',
        'jumlah_hari',
        'satuan',
        'total',
    ];

    protected $casts = [
        'jumlah_hari' => 'integer',
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

        static::creating(function ($perdiem) {
            if (isset($perdiem->jumlah_hari) && isset($perdiem->satuan) && !isset($perdiem->total)) {
                $perdiem->total = $perdiem->jumlah_hari * $perdiem->satuan;
            }
        });

        static::updating(function ($perdiem) {
            if (isset($perdiem->jumlah_hari) && isset($perdiem->satuan)) {
                $perdiem->total = $perdiem->jumlah_hari * $perdiem->satuan;
            }
        });
    }
}

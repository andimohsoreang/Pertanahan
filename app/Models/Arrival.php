<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Arrival extends Model
{
    use HasUlids;

    protected $fillable = [
        'pic_id',
        'moda_transportasi',
        'harga_tiket',
        'nomor_tiket',
        'kode_booking',
        'arrival_date',
    ];

    protected $casts = [
        'harga_tiket' => 'decimal:2',
        'arrival_date' => 'datetime',
    ];

    public function pic(): BelongsTo
    {
        return $this->belongsTo(Pic::class, 'pic_id');
    }
}

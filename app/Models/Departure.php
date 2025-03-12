<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Departure extends Model
{
    use HasUlids;

    protected $fillable = [
        'pic_id',
        'mode_transportation',
        'ticket_price',
        'ticket_number',
        'booking_code',
        'departure_date',
    ];

    protected $casts = [
        'ticket_price' => 'decimal:2',
        'departure_date' => 'datetime',
    ];

    public function pic(): BelongsTo
    {
        return $this->belongsTo(Pic::class, 'pic_id');
    }
}

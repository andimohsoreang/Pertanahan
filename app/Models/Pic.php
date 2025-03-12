<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pic extends Model
{
    use HasUlids;

    protected $fillable = [
        'business_trip_id',
        'employee_id',
        'uraian_tugas',
        'surat_tugas_nomor',
        'surat_tugas_tanggal',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    protected $casts = [
        'surat_tugas_tanggal' => 'datetime',
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime',
    ];

    public function businessTrip(): BelongsTo
    {
        return $this->belongsTo(BusinessTrip::class, 'business_trip_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function departure(): HasMany
    {
        return $this->hasMany(Departure::class);
    }

    public function arrival(): HasMany
    {
        return $this->hasMany(Arrival::class);
    }

    public function perdiem(): HasMany
    {
        return $this->hasMany(Perdiem::class);
    }

    public function lodging(): HasMany
    {
        return $this->hasMany(Lodging::class);
    }
}

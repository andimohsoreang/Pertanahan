<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Employee extends Model
{
    use HasUlids;

    protected $fillable = [
        'nama_pelaksana',
        'jenis_kelamin',
        'pangkat_golongan',
        'jabatan',
        'status_pegawai',
        'seksi_id',
        'no_telp'
    ];

    protected $casts = [
        'jenis_kelamin' => 'string',
        'status_pegawai' => 'string',
    ];

    public function pics(): HasMany
    {
        return $this->hasMany(Pic::class, 'employee_id');
    }

    // Relasi ke Seksi
    public function seksi()
    {
        return $this->belongsTo(Seksi::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}

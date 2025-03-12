<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Seksi extends Model
{

    use SoftDeletes;

    // Nonaktifkan increment
    public $incrementing = false;

    // Set tipe primary key
    protected $keyType = 'string';

    // Tentukan primary key
    protected $primaryKey = 'id';


    protected  $table = 'seksis';

    protected $fillable = [

        'nama_seksi',
        'deskripsi'
    ];

    /// Gunakan ULID saat membuat model baru
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::ulid();
            }
        });
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }
}

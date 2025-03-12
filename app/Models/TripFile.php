<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

    class TripFile extends Model
    {
        protected $primaryKey = 'id';
        public $incrementing = false;
        protected $keyType = 'string';

        protected $fillable = [
            'id',
            'business_trip_id',
            'nama_file',
            'path_file',
            'mime_type',
            'ukuran_file',
            'status_berkas'
        ];

        public function businessTrip()
        {
            return $this->belongsTo(BusinessTrip::class);
        }

        // Accessor untuk URL file
        public function getFileUrlAttribute()
        {
            return Storage::url($this->path_file);
        }

        protected static function boot()
        {
            parent::boot();

            static::deleting(function ($tripFile) {
                // Hapus file dari storage saat model dihapus
                if (Storage::exists($tripFile->path_file)) {
                    Storage::delete($tripFile->path_file);
                }
            });
        }



    }

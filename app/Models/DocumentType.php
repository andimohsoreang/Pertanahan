<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class DocumentType extends Model
{
    use HasUlids;

    protected $fillable = [
        'jenis_dokumen',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'jenis_dokumen_id');
    }
}

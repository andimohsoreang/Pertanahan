<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Gunakan ULID sebagai primary key
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::ulid();
        });
    }

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'employee_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function scopeFindByLogin($query, $login)
    {
        return $query->where('username', $login)
            ->orWhere('email', $login);
    }

    /**
     * Check if user has specific role(s)
     *
     * @param string|array $roles
     * @return bool
     */
    public function hasRole($roles)
    {
        // Konversi ke array jika bukan array
        $roles = is_array($roles) ? $roles : func_get_args();

        // Cek apakah role user ada di daftar roles yang diberikan
        return in_array($this->role, $roles);
    }

    /**
     * Alias method untuk hasRole
     */
    public function is($roles)
    {
        return $this->hasRole($roles);
    }
}

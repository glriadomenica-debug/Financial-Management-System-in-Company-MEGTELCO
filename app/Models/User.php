<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Encryption\DecryptException;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'plain_password',
        'role'
    ];

    // protected $encryptable = [
    //     'password'
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getDisplayPasswordAttribute()
{
    if (auth()->check() && in_array(auth()->user()->role, ['superadmin'])) {
        return $this->password;
    }
    return '*******';
}

// public function getDisplayPasswordAttribute()
// {
//     // Hanya admin/direktur yang bisa lihat password
//     if (auth()->check() && in_array(auth()->user()->role, ['admin', 'director'])) {
//         try {
//             return Crypt::decryptString($this->plain_password);
//         } catch (DecryptException $e) {
//             return 'Password unavailable';
//         }
//     }
    
//     return '*******';
// }
public function isSuperAdmin(): bool
{
    return $this->role === 'superadmin';
}
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isFinance(): bool
    {
        return $this->role === 'finansas';
    }

    public function isDirector(): bool
    {
        return $this->role === 'diretor';
    }

   


}

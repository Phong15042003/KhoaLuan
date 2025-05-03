<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'vaitro',
    ];

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

    /**
     * Get the gopies for the user.
     */
    public function gopies()
    {
        return $this->hasMany(Gopy::class, 'SinhVienID');
    }

    /**
     * Get the phancongmonhocs where the user is the biensoan.
     */
    public function phancongmonhocsAsBiensoan()
    {
        return $this->hasMany(Phancongmonhoc::class, 'biensoan_id');
    }

    /**
     * Get the phancongmonhocs where the user is the giangvien.
     */
    public function phancongmonhocsAsGiangvien()
    {
        return $this->hasMany(Phancongmonhoc::class, 'giangvien_id');
    }
}

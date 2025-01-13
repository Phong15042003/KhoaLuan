<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bomon extends Model
{
    use HasFactory;

    /**
     * Get the nganhhocs for the bomon.
     */
    public function nganhhocs()
    {
        return $this->hasMany(Nganhhoc::class, 'BoMonID');
    }

    /**
     * Get the khoa that owns the bomon.
     */
    public function khoa()
    {
        return $this->belongsTo(Khoa::class, 'KhoaID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nganhhoc extends Model
{
    use HasFactory;

    /**
     * Get the bomon that owns the nganhhoc.
     */
    public function bomon()
    {
        return $this->belongsTo(Bomon::class, 'BoMonID');
    }

    /**
     * Get the chuongtrinhdaotaos for the nganhhoc.
     */
    public function chuongtrinhdaotaos()
    {
        return $this->hasMany(Chuongtrinhdaotao::class, 'NganhHocID');
    }
}

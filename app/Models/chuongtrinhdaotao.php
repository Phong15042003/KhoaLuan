<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuongtrinhdaotao extends Model
{
    use HasFactory;

    /**
     * Get the khoikienthucs for the chuongtrinhdaotao.
     */
    public function khoikienthucs()
    {
        return $this->hasMany(Khoikienthuc::class, 'ChuongTrinhID');
    }

    /**
     * Get the nganhhoc that owns the chuongtrinhdaotao.
     */
    public function nganhhoc()
    {
        return $this->belongsTo(Nganhhoc::class, 'NganhHocID');
    }

    /**
     * Get the khoahocs for the chuongtrinhdaotao.
     */
    public function khoahocs()
    {
        return $this->hasMany(Khoahoc::class, 'CTDT_ID');
    }
}

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
     * Get the khoahoc that owns the chuongtrinhdaotao.
     */
    public function khoahoc()
    {
        return $this->belongsTo(Khoahoc::class, 'KhoaHocID');
    }
}

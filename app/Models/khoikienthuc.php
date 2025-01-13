<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoikienthuc extends Model
{
    use HasFactory;

    /**
     * Get the chuongtrinhdaotao that owns the khoikienthuc.
     */
    public function chuongtrinhdaotao()
    {
        return $this->belongsTo(Chuongtrinhdaotao::class, 'ChuongTrinhID');
    }

    /**
     * Get the hocphans for the khoikienthuc.
     */
    public function hocphans()
    {
        return $this->hasMany(Hocphan::class, 'KhoiKienThucID');
    }
}

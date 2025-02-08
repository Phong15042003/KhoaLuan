<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocphan extends Model
{
    use HasFactory;

    /**
     * Get the khoikienthuc that owns the hocphan.
     */
    public function khoikienthuc()
    {
        return $this->belongsTo(Khoikienthuc::class, 'KhoiKienThucID');
    }

    /**
     * Get the loaihocphan that owns the hocphan.
     */
    public function loaihocphan()
    {
        return $this->belongsTo(Loaihocphan::class, 'LoaiHocPhanID');
    }

    /**
     * Get the nhomhocphan that owns the hocphan.
     */
    public function nhomhocphan()
    {
        return $this->belongsTo(Nhomhocphan::class, 'NhomHocPhanID');
    }

    /**
     * Get the decuongchitiets for the hocphan.
     */
    public function decuongchitiets()
    {
        return $this->hasMany(Decuongchitiet::class, 'HocPhanID');
    }

    /**
     * Get the gopies for the hocphan.
     */
    public function gopies()
    {
        return $this->hasMany(Gopy::class, 'HocPhanID');
    }

    /**
     * The chuongtrinhdaotaos that belong to the hocphan.
     */
    public function chuongtrinhdaotaos()
    {
        return $this->belongsToMany(Chuongtrinhdaotao::class, 'ctdt_hocphans', 'hocphan_id', 'ctdt_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hocphan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'MaHocPhan',
        'TenHocPhan',
        'TenHocPhanTiengAnh',
        'SoTinChi',
        'SoTietLyThuyet',
        'SoTietThucHanh',
        'HocKy',
        'DkTienQuyet',
        'DkHocTruoc',
        'DkSongHanh',
        'KhoiKienThucID',
        'LoaiHocPhanID',
        'NhomTuChon',
    ];

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
        return $this->belongsToMany(Chuongtrinhdaotao::class, 'ctdthocphans', 'HocPhanID', 'CTDT_ID');
    }

    /**
     * Get the phancongmonhocs for the hocphan.
     */
    public function phancongmonhocs()
    {
        return $this->hasMany(Phancongmonhoc::class, 'HocPhanID');
    }

    /**
     * Get the chuandauras for the hocphan.
     */
    public function chuandauras()
    {
        return $this->hasMany(Chuandaura::class, 'hocphan_id');
    }

    /**
     * Get the chuandaura associated with the hocphan.
     */
    public function chuandaura()
    {
        return $this->hasOne(chuandaura::class, 'hocphan_id');
    }
}

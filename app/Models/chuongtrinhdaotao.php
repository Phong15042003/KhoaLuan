<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuongtrinhdaotao extends Model
{
    use HasFactory;

    /**
     * Get the nganhhoc that owns the chuongtrinhdaotao.
     */
    public function nganhhoc()
    {
        return $this->belongsTo(Nganhhoc::class, 'NganhHocID');
    }

    /**
     * The hocphans that belong to the chuongtrinhdaotao.
     */
    public function hocphans()
    {
        return $this->belongsToMany(Hocphan::class, 'ctdthocphans', 'CTDT_ID', 'HocPhanID');
    }
}

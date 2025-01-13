<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoahoc extends Model
{
    use HasFactory;

    /**
     * Get the chuongtrinhdaotaos for the khoahoc.
     */
    public function chuongtrinhdaotaos()
    {
        return $this->hasMany(Chuongtrinhdaotao::class, 'KhoaHocID');
    }
}

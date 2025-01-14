<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoahoc extends Model
{
    use HasFactory;

    /**
     * Get the chuongtrinhdaotao that owns the khoahoc.
     */
    public function chuongtrinhdaotao()
    {
        return $this->belongsTo(Chuongtrinhdaotao::class, 'CTDT_ID');
    }
}

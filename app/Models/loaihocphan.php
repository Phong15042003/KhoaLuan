<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaihocphan extends Model
{
    use HasFactory;

    /**
     * Get the hocphans for the loaihocphan.
     */
    public function hocphans()
    {
        return $this->hasMany(Hocphan::class, 'LoaiHocPhanID');
    }
}

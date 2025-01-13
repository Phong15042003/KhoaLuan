<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class decuongchitiet extends Model
{
    use HasFactory;

    /**
     * Get the hocphan that owns the decuongchitiet.
     */
    public function hocphan()
    {
        return $this->belongsTo(Hocphan::class, 'HocPhanID');
    }

    /**
     * Get the gopies for the decuongchitiet.
     */
    public function gopies()
    {
        return $this->hasMany(Gopy::class, 'DeCuongChiTietID');
    }
}

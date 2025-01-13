<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gopy extends Model
{
    use HasFactory;

    /**
     * Get the user (SinhVien) that owns the gopy.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'SinhVienID');
    }

    /**
     * Get the hocphan that owns the gopy.
     */
    public function hocphan()
    {
        return $this->belongsTo(Hocphan::class, 'HocPhanID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phancongmonhoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'biensoan_id',
        'giangvien_id',
        'HocPhanID',
    ];

    /**
     * Get the user (biensoan) that owns the phancongmonhoc.
     */
    public function biensoan()
    {
        return $this->belongsTo(User::class, 'biensoan_id');
    }

    /**
     * Get the user (giangvien) that owns the phancongmonhoc.
     */
    public function giangvien()
    {
        return $this->belongsTo(User::class, 'giangvien_id');
    }

    /**
     * Get the hocphan that owns the phancongmonhoc.
     */
    public function hocphan()
    {
        return $this->belongsTo(Hocphan::class, 'HocPhanID');
    }
}

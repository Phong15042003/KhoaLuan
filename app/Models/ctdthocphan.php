<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtdtHocphan extends Model
{
    use HasFactory;

    protected $table = 'ctdthocphans';

    protected $fillable = [
        'CTDT_ID',
        'HocPhanID',
    ];

    /**
     * Get the chuongtrinhdaotao that owns the CtdtHocphan.
     */
    public function chuongtrinhdaotao()
    {
        return $this->belongsTo(Chuongtrinhdaotao::class, 'CTDT_ID');
    }

    /**
     * Get the hocphan that owns the CtdtHocphan.
     */
    public function hocphan()
    {
        return $this->belongsTo(Hocphan::class, 'HocPhanID');
    }
}

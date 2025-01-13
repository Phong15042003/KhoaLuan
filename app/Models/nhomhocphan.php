<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhomhocphan extends Model
{
    use HasFactory;

    /**
     * Get the hocphans for the nhomhocphan.
     */
    public function hocphans()
    {
        return $this->hasMany(Hocphan::class, 'NhomHocPhanID');
    }
}

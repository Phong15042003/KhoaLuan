<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuandaura extends Model
{
    use HasFactory;


    /**
     * Get the hocphan that owns the chuandaura.
     */
    public function hocphan()
    {
        return $this->belongsTo(Hocphan::class);
    }
}

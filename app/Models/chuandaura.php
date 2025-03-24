<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuandaura extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hocphan_id',
        'T1',
        'T2',
        'T3',
        'T4',
        'T5',
        'T6',
        'T7',
        'T8',
    ];

    /**
     * Get the hocphan that owns the chuandaura.
     */
    public function hocphan()
    {
        return $this->belongsTo(Hocphan::class, 'hocphan_id');
    }
}

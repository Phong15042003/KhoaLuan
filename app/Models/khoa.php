<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoa extends Model
{
    use HasFactory;

    /**
     * Get the bomons for the khoa.
     */
    public function bomons()
    {
        return $this->hasMany(Bomon::class, 'KhoaID');
    }
}

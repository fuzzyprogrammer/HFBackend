<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HfAddress extends Model
{
    use HasFactory;

    public function jamath()
    {
        return $this->belongsTo(HfJamath::class);
    }
}
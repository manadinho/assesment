<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public function scopeActive($query, $active = 1) {
        return $query->where(['is_active' => $active]);
    }
}

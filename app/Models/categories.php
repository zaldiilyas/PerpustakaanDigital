<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    public function book() {
        return $this->belongsTo(Books::class);
    }

    protected $guarded = ['id'];
}

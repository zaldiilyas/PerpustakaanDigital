<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(categories::class, 'categories_id');
    }

    protected $guarded = ['id'];
}

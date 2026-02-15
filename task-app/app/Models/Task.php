<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

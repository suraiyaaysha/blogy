<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'slug',
        'title',
        'thumbnail',
        'details',
        'reading_duration'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}

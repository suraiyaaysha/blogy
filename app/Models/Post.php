<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'slug',
        'title',
        'thumbnail',
        'details',
        'reading_duration',
        'is_featured',
        'views'
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Relation between Post and User
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        // return $this->hasMany(Comment::class)->whereNull('parent_id');
        return $this->hasMany(Comment::class)->whereNull('parent_id')->latest();
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->as('tags');
    }

    public function likes() {
        return $this->hasMany(Like::class);
        // return $this->belongsToMany(User::class, 'post_likes');
    }

}

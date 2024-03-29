<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'is_published',
        'category_id',
        'image',
        'user_id']; //column-ge jazba saqtauga ruksat alady

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function usersRated()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('rating')
            ->withTimestamps();
    }
}

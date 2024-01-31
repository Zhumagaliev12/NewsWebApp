<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'is_published']; //column-ge jazba saqtauga ruksat alady

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

}

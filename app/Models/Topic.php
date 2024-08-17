<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id', 'user_id', 'tags'];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function latestActivity()
    {
        return $this->hasOne(Post::class)->latest();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }



    // Подсчет общего количества комментариев в категории
    public function commentsCount()
    {
        return $this->topics()->withCount('posts')->get()->sum('posts_count');
    }

     // Получение последнего времени активности в категории

     public function latestActivity()
{
    $latestPost = $this->topics()->with('posts')->get()->flatMap->posts->sortByDesc('created_at')->first();
    return $latestPost ? $latestPost->created_at : null;
}


}

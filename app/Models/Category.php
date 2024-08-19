<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    // Метод для подсчета всех комментариев во всех темах
    public function commentsCount()
    {
        return $this->topics()->withCount('comments')->get()->sum('comments_count');
    }

    // Метод для получения времени последней активности в любой из тем
    public function latestActivity()
    {
        $latestComment = $this->topics()->with('comments')->get()->flatMap->comments->sortByDesc('created_at')->first();
        return $latestComment ? $latestComment->created_at : null;
    }
}

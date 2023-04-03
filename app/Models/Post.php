<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\PostImage;
use App\Models\ClickToAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['title', 'description', 'cta_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cta()
    {
        return $this->belongsTo(ClickToAction::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function postImage()
    {
        return $this->HasMany(PostImage::class);
    }
}

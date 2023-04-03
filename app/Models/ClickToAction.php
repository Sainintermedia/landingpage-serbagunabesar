<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClickToAction extends Model
{
    use HasFactory;
    protected $table = 'cta';
    protected $fillable = ['cta_text', 'cta_link'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
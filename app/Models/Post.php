<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'image_url', 'likes', 'content'];

    public function comment() {
    	return $this->hasMany(Comment::class);
    }

    public function User() {
    	return $this->belongsTo(User::class);
    }
}

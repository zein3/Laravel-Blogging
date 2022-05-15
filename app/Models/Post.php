<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;

    /**
     * Get all comments on a post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the author of this post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get all the tags of a post.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    /**
     * Get all users that like this post.
     */
    public function likers()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
}

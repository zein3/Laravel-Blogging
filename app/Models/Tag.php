<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;

    /**
     * Get all the posts with this tag.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'thumbnail',
        'body'
    ];

    /**
     * Get image URL for the thumbnail.
     */
    public function getThumbnailUrl()
    {
        // THUMBNAIL_URL environment variable is used to store the base url of image cdn service.
        if (Str::startsWith($this->thumbnail, env('THUMBNAIL_FOLDER'))) {
            return env('THUMBNAIL_URL') . $this->thumbnail;
        } else {
            return $this->thumbnail;
        }
    }

    /**
     * Get post's body to render it in HTML.
     */
    public function htmlContent()
    {
        return Str::of($this->body)->toHtmlString();
    }

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

    /**
     * Filter posts.
     * filters['search'] is used to filter posts based on title and content/body.
     * filters['tag'] is used to filter posts based on tags.
     * filters['author'] is used to filter posts based on author.
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('body', 'like', '%' . $search . '%')
            );
        });

        $query->when($filters['tag'] ?? false, function($query, $tag) {
            $query->whereHas('tags', function($query) use($tag) {
                $query->where('name', $tag);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author) {
            $query->whereHas('author', function($query) use($author) {
                $query->where('username', $author);
            });
        });
    }
}

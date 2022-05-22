<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'full_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all posts the user wrote.
     */
    public function posts() {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * Get all posts that are liked by this user.
     */
    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes');
    }

    /**
     * Get all posts that are saved by this user.
     */
    public function savedPosts()
    {
        return $this->belongsToMany(Post::class, 'saved_posts');
    }

    /**
     * Check whether the user likes a post or not.
     *
     * @param int $post_id
     * @return bool
     */
    public function likes(int $post_id)
    {
        $result = User::where('id', Auth::id())
                  ->whereHas('likedPosts', function ($query) use ($post_id) {
                      $query->where('id', $post_id);
        })->get();

        return ($result->count() == 1) ? true : false;
    }

    /**
     * Check whether the user has saved a post or not.
     *
     * @param int $post_id
     * @return bool
     */
    public function postSaved(int $post_id)
    {
        $result = User::where('id', Auth::id())
                  ->whereHas('savedPosts', function ($query) use ($post_id) {
                    $query->where('id', $post_id);
        });
        return ($result->count() == 1) ? true : false;
    }
}

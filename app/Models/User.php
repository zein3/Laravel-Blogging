<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
}

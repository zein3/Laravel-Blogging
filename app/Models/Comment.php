<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'commenter_id',
        'post_id',
        'body'
    ];

    /**
     * Get the user who post the comment.
     */
    public function commenter()
    {
        return $this->belongsTo(User::class, 'commenter_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    /**
     * Get the user who post the comment.
     */
    public function commenter()
    {
        return $this->belongsTo(User::class, 'commenter_id');
    }
}

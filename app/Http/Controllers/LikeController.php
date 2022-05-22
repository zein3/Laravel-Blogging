<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Set the currently authenticated user to like a post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        Like::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);

        return redirect()->back();
    }

    /**
     * Set the currently authenticated user to unlike a post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Like::where('user_id', Auth::id())->where('post_id', $post->id)->delete();
        return redirect()->back();
    }
}

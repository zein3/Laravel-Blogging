<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Set the currently authenticated user to like a post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        Like::create([
            'user_id' => $request->user()->id,
            'post_id' => $post->id
        ]);

        return redirect()->back();
    }

    /**
     * Set the currently authenticated user to unlike a post.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        Like::where('user_id', $request->user()->id)->where('post_id', $post->id)->delete();
        return redirect()->back();
    }
}

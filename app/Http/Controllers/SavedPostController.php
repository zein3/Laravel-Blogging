<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SavedPost;

class SavedPostController extends Controller
{
    /**
     * Display all posts that have been saved by the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('post.index', [
            'posts' => $request->user()->savedPosts()->orderBy('created_at', 'desc')->paginate(15)
        ]);
    }

    /**
     * Save a post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        SavedPost::create([
            'user_id' => $request->user()->id,
            'post_id' => $post->id
        ]);

        return redirect()->back();
    }

    /**
     * Unsave a post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        SavedPost::where('user_id', $request->user()->id)->where('post_id', $post->id)->delete();
        return redirect()->back();
    }
}

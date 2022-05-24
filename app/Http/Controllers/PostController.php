<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('post.index', [
            'posts' => Post::filter([
                'search' => $request->input('search'),
                'tag' => $request->input('tag'),
                'author' => $request->input('author')
            ])->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created post in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post          $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = $request->validate([
            'title' => ['required', 'max:120'],
            'thumbnail' => ['required', 'file', 'mimes:jpeg,bmp,png', 'size:2048'],
            'body' => ['required']
        ]);
        dd($newPost);
    }

    /**
     * Display the specified post.
     *
     * @param  \App\Models\Post          $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post          $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post          $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove a post.
     *
     * @param  \App\Models\Post          $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

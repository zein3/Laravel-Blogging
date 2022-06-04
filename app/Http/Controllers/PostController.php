<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

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
            ])->orderBy('created_at', 'desc')->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->user()->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

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
        if (!$request->user()->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        $newPost = $request->validate([
            'title' => ['required', 'max:120'],
            'thumbnail' => ['required', 'file', 'mimes:jpeg,bmp,png', 'max:2048'],
            'body' => ['required']
        ]);

        // THUMBNAIL_FOLDER environment variable is used to determine which folder on CDN provider should we store the thumbnail.
        $thumbnailUpload = $newPost['thumbnail']->store(env('THUMBNAIL_FOLDER'));

        if ($thumbnailUpload) {
            // successful upload
            Post::create([
                'author_id' => $request->user()->id,
                'title' => $newPost['title'],
                'slug' => Str::of($newPost['title'])->slug('-'),
                'thumbnail' => $thumbnailUpload,
                'body' => $newPost['body']
            ]);

            return redirect()->back();
        } else {
            // fail to upload thumbnail
            abort(500);
        }
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
     * @param \Illuminate\Http\Request   $request
     * @param  \App\Models\Post          $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post)
    {
        if ($post->author->id != $request->user()->id) {
            abort(403);
        }

        return view('post.edit', [
            'post' => $post
        ]);
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
        if ($post->author->id != $request->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => ['required', 'max:120'],
            'body' => ['required']
        ]);

        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();

        return redirect()->back()->with('message', 'Successfully updated content');
    }

    public function updateThumbnail(Request $request, Post $post) {
        if ($post->author->id != $request->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'thumbnail' => ['required', 'file', 'mimes:jpeg,bmp,png', 'max:2048'],
        ]);

        // upload new thumbnail
        $newThumbnail = $validated['thumbnail']->store(env('THUMBNAIL_FOLDER'));

        if ($newThumbnail) {
            if (Str::of($post->thumbnail)->startsWith(env('THUMBNAIL_FOLDER'))) {
                Storage::delete($post->thumbnail);
            }

            $post->thumbnail = $newThumbnail;
            $post->save();

            return redirect()->back()->with('message', 'Successfully updated thumbnail');
        } else {
            abort(500);
        }

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

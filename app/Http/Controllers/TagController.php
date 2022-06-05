<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;

class TagController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        if ($post->author->id != $request->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'tag' => ['required']
        ]);

        $tag = Tag::firstOrCreate([
            'name' => $validated['tag']
        ]);

        PostTag::create([
            'post_id' => $post->id,
            'tag_id' => $tag->id
        ]);

        return redirect()->back()->with('message', 'successfully added tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post, Tag $tag)
    {
        if ($post->author->id != $request->user()->id) {
            abort(403);
        }

        PostTag::where('post_id', $post->id)->where('tag_id', $tag->id)->delete();
        return redirect()->back();
    }
}

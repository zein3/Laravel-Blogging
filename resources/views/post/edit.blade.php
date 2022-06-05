@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="card mt-3 p-2 shadow">
    <h4 class="fw-bold text-center">Change Thumbnail</h4>
    <div class="card-body">
        <form action="{{ route('post.update_thumbnail', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.image id="thumbnail" name="thumbnail" type="file">
                Thumbnail:
            </x-form.image>
            <span class="fs-6 fw-light">Max size: 2MB</span>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    Change Thumbnail
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card mt-3 p-2 shadow">
    <h4 class="fw-bold text-center">Edit Content</h4>
    <div class="card-body">
        <form action="{{ route('post.update', ['post' => $post]) }}" method="POST" id="post_form">
            @csrf
            @method('PATCH')
            <x-form.input value="{{ $post->title }}" type="text" name="title" id="title">
                Title:
            </x-form.input>
            <div class="mt-2 shadow" id="editor"></div>
            <input class="d-none" id="editor_result" name="body" value="{{ old('body') ?? $post->body }}" />
            <div class="d-grid mt-2">
                <button id="post_submit" type="submit" class="btn btn-primary">
                    Edit Content
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card mt-3 p-2 shadow">
    <h4 class="fw-bold text-center">Add/Remove Tags</h4>
    <div class="card-body">
        <div class="d-flex flex-row justify-content-start align-items-center py-2">
            @foreach($post->tags as $tag)
            <form method="POST" action="{{ route('tag.destroy', ['post' => $post, 'tag' => $tag]) }}">
                @csrf
                @method('DELETE')
                <a class="btn btn-outline-primary btn-sm me-1">
                    <span class="me-2">
                        #{{ $tag->name }}
                    </span>
                    <button class="btn-close" type="submit"></button>
                </a>
            </form>
            @endforeach
        </div>
        <form action="{{ route('tag.store', ['post' => $post]) }}" method="POST">
            @csrf
            <x-form.input type="text" name="tag" id="tag">
                Add tag:
            </x-form.input>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Add tag</button>
            </div>
        </form>
    </div>
</div>

<script src="/js/editor.js"></script>
@endsection

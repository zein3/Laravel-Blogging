@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="card mt-3 p-2 shadow">
    <h4 class="fw-bold text-center">Change Thumbnail</h4>
    <div class="card-body">
        <form action="" method="POST">
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
        <form action="" method="POST" id="post_form">
            @csrf
            @method('PATCH')
            <x-form.input value="{{ $post->title }}" type="text" name="title" id="title">
                Title:
            </x-form.input>
            <div class="mt-2 shadow" id="editor"></div>
            <input class="d-none" id="editor_result" name="body" value="{{ old('body') ?? $post->body }}" />
            <div class="d-grid">
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
        <form action="" method="POST">
            @csrf
            @method('PATCH')
        </form>
    </div>
</div>

<script src="/js/editor.js"></script>
@endsection

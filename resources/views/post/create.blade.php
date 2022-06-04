@extends('layouts.app')

@section('title', 'New Post')

@section('content')
<h3 class="fw-bold text-center h3 my-2">Create Post</h5>

<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" id="post_form">
    @csrf
    <div class="card mt-2 shadow">
        <div class="card-body">
            <x-form.input id="title" name="title" type="text">
                Title:
            </x-form.input>
        </div>
    </div>
    <div class="card mt-2 shadow">
        <div class="card-body">
            <x-form.image id="thumbnail" name="thumbnail" type="file">
                Thumbnail:
            </x-form.image>
            <span class="fs-6 fw-light">Max size: 2MB</span>
        </div>
    </div>
    <div class="mt-2 shadow" id="editor"></div>
    <input class="d-none" id="editor_result" name="body" value="{{ old('body') ?? '' }}" />
    <div class="d-grid mt-2 shadow">
        <button class="btn btn-primary" id="post_submit">Post</button>
    </div>
</form>
<script src="js/editor.js"></script>
@endsection

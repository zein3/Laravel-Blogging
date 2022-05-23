@extends('layouts.app')

@section('title', 'New Post')

@section('content')
<h3 class="fw-bold text-center h3 my-2">Create Post</h5>

<form action="{{ route('post.store') }}" method="POST" id="post_form">
    @csrf
    <div class="card mt-2">
        <div class="card-body">
            <x-form.input id="title" name="title" type="text">
                Title:
            </x-form.input>
        </div>
    </div>
    <div class="mt-2" id="editor"></div>
    <input class="d-none" id="editor_result" name="body" />
    <div class="d-grid mt-2">
        <button class="btn btn-primary" id="post_submit">Post</button>
    </div>
</form>
<script src="js/editor.js"></script>
@endsection

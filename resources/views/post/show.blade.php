@extends('layouts.skeleton')

@section('title', $post->title)

@section('body')
<x-layouts.navbar />

    <div class="container min-vh-100 mt-4">
        <div class="row">
            <div class="d-lg-none">
                <x-layouts.sidebar />
            </div>
            <div class="col-lg-8">
                <div class="card shadow">
                    <img src="{{ $post->thumbnail }}" class="card-img-top" style="max-height: 10rem;" />
                    <div class="card-body">
                        <h4 class="h5 fw-bold text-center">
                            {{ $post->title }}
                        </h4>
                        <div>
                            {{ $post->body }}
                        </div>
                    </div>
                </div>
                <hr />
                <h5>
                    Comments
                </h5>
                @foreach($post->comments as $comment)
                <div class="card shadow my-2">
                    <div class="card-body">
                        <div class="d-flex flex-row align-items-end">
                            <img src="{{ $comment->commenter->profile_picture }}" class="rounded-circle" width="25" height="25" />
                            <a href="#" class="mx-1 text-decoration-none text-black fw-bold">
                                {{ $comment->commenter->username }}
                            </a>
                        </div>
                        {{ $comment->body }}
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div style="position: sticky; top: 1rem;">
                    <div class="card shadow">
                        <div class="card-body px-4 py-2">
                            <h4 class="h4 fw-bold">
                                Author:
                            </h4>
                            <div class="d-flex align-items-center justify-content-start">
                                <img src="{{ $post->author->profile_picture }}" class="rounded-circle" width="50" height="50" />
                                <a href="#" class="text-decoration-none text-black fw-bold fs-3 ms-2">{{ $post->author->username }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<x-layouts.footer />
@endsection

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
                    <img src="{{ $post->getThumbnailUrl() }}" class="card-img-top" style="max-height: 10rem;" />
                    <div class="card-body">
                        <h4 class="h5 fw-bold text-center">
                            {{ $post->title }}
                        </h4>
                        <div id="post_body">
                            {{ $post->htmlContent() }}
                        </div>
                    </div>
                    <div class="px-2">
                        <x-posts.card_bottom :post="$post" />
                    </div>
                </div>
                <hr />
                <h5 class="fw-bold">
                    Comments
                </h5>
                @foreach($post->comments as $comment)
                <x-comment :comment="$comment" />
                @endforeach
                @auth
                <div class="card shadow my-2" id="comment">
                    <div class="card-body">
                        <form action="{{ route('comment.store', ['post' => $post]) }}" method="POST">
                            @csrf
                            <x-form.textarea name="body" id="body">
                                Your comment:
                            </x-form.textarea>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Post comment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
            <div class="col-lg-4">
                <hr class="d-lg-none" />
                <div style="position: sticky; top: 1rem;">
                    <div class="card shadow">
                        <div class="card-body px-4 py-2">
                            <h4 class="h4 fw-bold">
                                Author:
                            </h4>
                            <div class="d-flex align-items-center justify-content-start">
                                <img src="{{ $post->author->getProfilePictureUrl() }}" class="rounded-circle" width="50" height="50" />
                                <a href="#" class="text-decoration-none text-black fw-bold fs-3 ms-2">{{ $post->author->username }}</a>
                            </div>
                            <hr />
                            <p>
                            {{ $post->author->bio }}
                            </p>
                        </div>
                    </div>

                    <h4 class="fw-bold mt-4">More from {{ $post->author->username }}</h4>

                    @foreach($post->author->posts as $p)
                        @if($loop->iteration <= 3 && $p->slug != $post->slug)
                            <x-posts.card :post="$p" />
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<x-layouts.footer />
@endsection

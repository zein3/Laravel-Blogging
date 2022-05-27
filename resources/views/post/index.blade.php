@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    @if($posts->count() == 0)
    <div class="w-100 text-center mt-4">
        <h1 class="fw-bold">There's nothing here</h1>
    </div>
    @endif
    @foreach ($posts as $post)
        <x-posts.card :post="$post" />
    @endforeach

    <div class="mt-3">
        {{ $posts->links() }}
    </div>
@endsection

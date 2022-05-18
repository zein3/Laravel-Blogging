@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    @foreach ($posts as $post)
        <x-posts.card :post="$post" />
    @endforeach

    <div class="mt-3">
        {{ $posts->links() }}
    </div>
@endsection

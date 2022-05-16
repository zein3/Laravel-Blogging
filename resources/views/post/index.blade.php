@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    @foreach ($posts as $post)
        <x-posts.card :post="$post" />
    @endforeach
@endsection

@section('extra')
@endsection

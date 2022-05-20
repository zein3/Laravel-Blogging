@extends('layouts.skeleton')

@section('title', $post->title)

@section('body')
<x-layouts.navbar />

    <div class="container min-vh-100 mt-4">
        <div class="row">
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
            </div>
            <div class="col-lg-4" style="position: sticky; top: 1rem;">

            </div>
        </div>
    </div>

<x-layouts.footer />
@endsection

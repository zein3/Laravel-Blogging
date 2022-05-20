@extends('layouts.app')

@section('title', ' Login')

@section('content')
<div class="card mt-3">
    <div class="card-body">
        <h5 class="display-5 card-title">
            Login
        </h5>
        <hr>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <x-form.input type="text" id="email" name="email">
                Username or Email:
            </x-form.input>
            <x-form.input type="password" id="password" name="password">
                Password:
            </x-form.input>
            <a class="text-muted text-decoration-none fs-6 fw-light" href="#">Forgot your password?</a>

            <div class="my-2">
                <x-form.check id="remember_me" name="remember_me">
                    Remember me
                </x-form.check>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-block btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection

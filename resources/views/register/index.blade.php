@extends('layouts.app')

@section('title', ' Login')

@section('content')
<div class="card mt-3">
    <div class="card-body">
        <h5 class="display-5 card-title">
            Register
        </h5>
        <hr>
        <form method="POST" action="route('login')">
            <div class="mb-2">
                <label for="email" class="form-label fs-4">Username or Email:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-2">
                <label for="password" class="form-label fs-4">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
                <a class="text-muted text-decoration-none fs-6 fw-light" href="#">Forgot your password?</a>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-block btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', ' Login')

@section('content')
<div class="card mt-3">
    <div class="card-body">
        <h5 class="display-5 card-title">
            Register
        </h5>
        <hr>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <x-form.input id="username" name="username" type="text">
                Username:
            </x-form.input>
            <x-form.input id="full_name" name="full_name" type="text">
                Name:
            </x-form.input>
            <x-form.input id="email" name="email" type="email">
                Email:
            </x-form.input>
            <x-form.input id="password" name="password" type="password">
                Password:
            </x-form.input>
            <x-form.input id="confirm_password" name="confirm_password" type="password">
                Confirm Password:
            </x-form.input>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-block btn-primary">Create Account</button>
            </div>
        </form>
    </div>
</div>
@endsection

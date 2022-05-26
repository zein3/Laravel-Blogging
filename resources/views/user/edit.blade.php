@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<!-- TODO: Change Profile Picture -->

<div class="card mt-3 p-2 shadow">
    <h5 class="fw-bold h4 text-center">Edit Profile</h5>
    <div class="card-body">
        <form action="{{ route('user.update', ['user' => $user]) }}" method="POST">
            @csrf
            @method('PATCH')
            <x-form.input value="{{ $user->username }}" type="text" name="username" id="username">
                Username:
            </x-form.input>

            <x-form.input value="{{ $user->full_name }}" type="text" name="full_name" id="full_name">
                Full name:
            </x-form.input>

            <x-form.input value="{{ $user->email }}" type="email" name="email" id="email">
                Email:
            </x-form.input>
            <!-- show whether email is verified or not here, if not also show a link to verify email -->

            <x-form.textarea value="{{ $user->bio }}" type="text" name="bio" id="bio">
                Bio:
            </x-form.textarea>
        </form>
    </div>
</div>

<!-- TODO: Change Password Form -->
@endsection

@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="card mt-3 p-2 shadow">
    <h5 class="fw-bold h4 text-center">Change profile picture</h5>
    <div class="card-body row">
        <div class="col-lg-3 d-flex flex-row justify-content-center align-items-center">
            <img src="{{ $user->getProfilePictureUrl() }}" class="rounded-circle" width="150" height="150" />
        </div>
        <div class="col-lg-9 d-flex flex-column justify-content-center">
            <div class="d-grid my-2">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#change_profile_picture">
                    Change profile picture
                </button>
            </div>
            @if($user->getProfilePictureUrl() != env('DEFAULT_PROFILE_PICTURE'))
            <div class="d-grid my-2">
                <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#destroy_profile_picture">
                    Delete profile picture
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Change Profile Picture Modal -->
<div class="modal fade" id="change_profile_picture" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="d-flex flex-row justify-content-center mt-2">
                <img src="" id="preview_profile_picture" class="rounded-circle d-none" width="100" height="100">
            </div>
            <form class="modal-body" method="POST" action="{{ route('user.update.profile.picture', ['user' => $user]) }}" enctype="multipart/form-data">
                @csrf
                <x-form.image id="profile_picture" name="profile_picture" type="file">
                    Upload new profile picture:
                </x-form.image>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update profile picture</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Profile Picture Modal -->
<div class="modal fade" id="destroy_profile_picture" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete your profile picture</h5>
            </div>
            <div class="modal-body">
                <h6 class="fw-bold fs-4">Are you sure?</h6>
                <form method="POST" action="{{ route('user.destroy.profile.picture', ['user' => $user]) }}" class="d-flex flex-row">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-outline-primary flex-grow-1 mx-2" data-bs-dismiss="modal">
                        No
                    </button>
                    <button type="submit" class="btn btn-outline-danger flex-grow-1 mx-2">
                        Yes
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card mt-3 p-2 shadow">
    <h5 class="fw-bold h4 text-center">Email Address</h5>
    <div class="card-body">
        <input class="form-control" type="email" value="{{ $user->email }}" disabled readonly />
        @if($user->hasVerifiedEmail())
        <span>Your email is verified.</span>
        @else
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <span class="fs-6 fw-light">
                You have not verified your email.
                <button type="submit" class="border-0 bg-white fs-6 text-primary">
                    Verify your email now.
                </button>
            </span>
        </form>
        @endif
    </div>
</div>

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

            <x-form.textarea value="{{ $user->bio }}" type="text" name="bio" id="bio">
                Bio:
            </x-form.textarea>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
    </div>
</div>

<div class="card mt-3 p-2 shadow">
    <h5 class="fw-bold h4 text-center">Change Password</h5>
    <div class="card-body">
        <form action="{{ route('user.update.password', ['user' => $user]) }}" method="POST">
            @csrf
            <x-form.input type="password" name="current_password" id="current_password">
                Current Password:
            </x-form.input>
            <x-form.input type="password" name="new_password" id="new_password">
                New Password:
            </x-form.input>
            <x-form.input type="password" name="confirm_password" id="confirm_password">
                Confirm Password:
            </x-form.input>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    Update Password
                </button>
            </div>
        </form>
    </div>
</div>

<script src="/js/preview.js"></script>
@endsection

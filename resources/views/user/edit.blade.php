@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<!-- TODO: Change Profile Picture -->
<div class="card mt-3 p-2 shadow">
    <h5 class="fw-bold h4 text-center">Change profile picture</h5>
    <div class="card-body row">
        <div class="col-lg-3">
            <img src="{{ $user->getProfilePictureUrl() }}" class="img-fluid rounded-circle" />
        </div>
        <div class="col-lg-9 d-flex flex-column justify-content-center">
            <div class="d-grid my-2">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#change_profile_picture">
                    Change profile picture
                </button>
            </div>
            @if($user->getProfilePictureUrl() != env('DEFAULT_PROFILE_PICTURE'))
            <div class="d-grid my-2">
                <a href="#" class="btn btn-outline-danger">
                    Delete profile picture
                </a>
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
            <form class="modal-body">
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
<div class="modal fade" id="deleteProfilePicture" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">

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

            <x-form.input value="{{ $user->email }}" type="email" name="email" id="email">
                Email:
            </x-form.input>
            <!-- show whether email is verified or not here, if not also show a link to verify email -->

            <x-form.textarea value="{{ $user->bio }}" type="text" name="bio" id="bio">
                Bio:
            </x-form.textarea>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
    </div>
</div>

<!-- TODO: Change Password Form -->
<div class="card mt-3 p-2 shadow">
    <h5 class="fw-bold h4 text-center">Change Password</h5>
    <div class="card-body">
        <form>
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

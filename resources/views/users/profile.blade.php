@extends('layouts.app')

@section('additional-resources')
    <link rel="stylesheet" href="{{ asset('css/pfp.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (Auth::user()?->is_admin && !$user->is_admin)
                        <a type="submit" href="{{ route('grantAdminPermissions', $user->id) }}" style="float: right" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Promote to admin</a>
                    @endif

                    @if (Auth::user()?->id == $user->id)
                        <a href="{{ route('user.edit') }}" style="float: right; color: gray">Edit profile</a>
                    @endif

                    <h2 style="display: inline-block">
                        {{ $user->name }}'s
                        @if ($user->is_admin)
                       
                        @endif profile
                    </h2>
                    
                </div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="avatar-container" style="margin: 20px; display: flex;">
                        <div class="profile-image-preview" style="margin-right: 20px;">
                            <img id="preview" class="rounded-circle" src="{{ $user->profile_image_path ? asset('images/users/' . $user->profile_image_path) : asset('images/user.png') }}">
                        </div>
                        <div style="display: inline-block; flex-grow: 1;">
                            <h5>About me:</h5>
                            <p>I am the admin</p>
                            <p>{{ $user->about }}</p>
                        </div>
                    </div>

                    
                    
                    <hr>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

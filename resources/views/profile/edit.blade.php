@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row pb-4">
                    <div class="col-lg-8 col-xl-5 offset-lg-4 offset-xl-5">
                        @if(session('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close fui-cross" data-dismiss="alert"></button>
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4 col-xl-3 offset-xl-2">
                        <h6>Profile Information</h6>
                        <p>Update your account's profile information and email address.</p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('put')
                            <div class="card card-success">
                                <div class="card-body">
                                    {{-- <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img data-src="holder.js/100%x100%" alt="100%x100%" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTg4IiBoZWlnaHQ9IjEzOCIgdmlld0JveD0iMCAwIDE4OCAxMzgiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTg4IiBoZWlnaHQ9IjEzOCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjY4LjA0Njg3NSIgeT0iNjkiIHN0eWxlPSJmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MTBwdDtkb21pbmFudC1iYXNlbGluZTpjZW50cmFsIj4xODh4MTM4PC90ZXh0PjwvZz48L3N2Zz4=" data-holder-rendered="true" style="height: 100%; width: 100%; display: block;">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new"><span class="fui-image"></span>&nbsp;&nbsp;Select image</span>
                                                    <span class="fileinput-exists"><span class="fui-gear"></span>&nbsp;&nbsp;Change</span>
                                                    <input type="file" name="...">
                                                </span>
                                                <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput"><span class="fui-trash"></span>&nbsp;&nbsp;Remove</a>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label for="name">Full Name</label>
                                        <sup class="text-danger">✱</sup>
                                        <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" type="text" value="{{ old('name', auth()->user()->name) }}" required />
                                        @if($errors->has('name'))
                                            <span id="name-error" class="error text-danger" for="name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label for="email">Email Address</label>
                                        <sup class="text-danger">✱</sup>
                                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" type="email" value="{{ old('email', auth()->user()->email) }}" required />
                                        @if($errors->has('email'))
                                            <span id="email-error" class="error text-danger" for="email">{{ $errors->first('email') }}</span>
                                        @else
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-dark">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row pb-4">
                    <div class="col-lg-4 col-xl-3 offset-xl-2">
                        <h6>Update Password</h6>
                        <p>Ensure your account is using a long, random password to stay secure.</p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <form method="post" action="{{ route('profile.password') }}">
                            @csrf
                            @method('put')
                            <div class="card card-success">
                                <div class="card-body">
                                    <div class="form-group {{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <label for="old_password">Current Password</label>
                                        <input class="form-control {{ $errors->has('old_password') ? ' is-invalid' : '' }}" type="password" name="old_password" id="old_password" required />
                                        @if($errors->has('old_password'))
                                            <span class="error text-danger">{{ $errors->first('old_password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label for="new_password">New Password</label>
                                        <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="new_password" type="password" required />
                                        @if($errors->has('password'))
                                            <span class="error text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input class="form-control" name="password_confirmation" id="confirm_password" type="password" required />
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-dark">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row pb-4">
                    <div class="col-lg-4 col-xl-3 offset-xl-2">
                        <h6>{{ __('Two Factor Authentication') }}</h6>
                        <p>{{ __('Add additional security to your account using two factor authentication.') }}</p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="card card-success">
                            <div class="card-body">
                                <h3>
                                {{-- @if ($this->enabled)
                                    {{ __('You have enabled two factor authentication.') }}
                                @else --}}
                                    {{ __('You have not enabled two factor authentication.') }}
                                {{-- @endif --}}
                                </h3>
                                <p class="card-text">{{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}</p>
                                <button type="button" class="btn btn-dark" user_id="{{ auth()->id() }}">Enable</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-xl-3 offset-xl-2">
                        <h6>Delete Account</h6>
                        <p>Permanently delete your account.</p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="card card-success">
                            <div class="card-body">
                                <p class="card-text">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
                                <button type="button" class="btn btn-danger delete-confirm" user_id="{{ auth()->id() }}">Delete Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

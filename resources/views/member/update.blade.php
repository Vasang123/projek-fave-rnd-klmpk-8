@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Halaman Update</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h4>Update Profile</h4>
            </div>
            <div class="card-body">
                <form action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row mb-3 ">
                        <img src="/storage/{{Auth::user()->user_image}}" alt="Foto Profil"  class = "rounded-circle"style= " height:150px; width:auto; margin-left:12em; ">
                    </div>
                    <div class="row mb-3">
                        <label for="user_image" class="col-md-4 col-form-label text-md-end">{{ __('Upload Gambar') }}</label>
                            <div class="col-md-6">
                                <input id="user_image" type="file" class="form-control @error('user_image') is-invalid @enderror" name="user_image"  required autofocus>
                                @error('user_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name' , Auth::user()->first_name) }}" required autocomplete="first_name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name' , Auth::user()->last_name) }}" required autocomplete="last_name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email' , Auth::user()->email) }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="current_password" class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>

                        <div class="col-md-6">
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password" autofocus>

                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="password_confirmation">
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label for="item_image" class="col-md-4 col-form-label text-md-end">{{ __('Upload Gambar') }}</label>

                        <div class="col-md-6">
                            <input id="item_image" type="file" class="form-control @error('item_image') is-invalid @enderror" name="item_image"  required autofocus>

                            @error('item_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Profile') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

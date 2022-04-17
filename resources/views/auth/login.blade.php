@extends('layouts.app')

@section('content')
<div class="main-container-login d-flex align-items-center" style="height: 90vh; background-color: #CEAB93">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="border: 1px solid black;">
                    <div class="card-header p-3 text-center" style="font-size: 30px; font-weight:bold; background-color: #E3CAA5; border: none">
                        {{ __('Log In') }}
                        <br>
                        <div style="font-size: 15px; color:#737D8A">
                            <span>Are you new here?</span>
                            <a href="{{ url('/register')}}" style="color: #0B8ACB;">Register</a>
                        </div>
                    </div>

                    <div class="card-body pt-5" style="background-color: #E3CAA5;">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                    
                            <div class="row mb-4">
                                <div class="container d-flex justify-content-center">
                                    <label for="email"></label>
                                    <!-- {{ __('Email / Phone  Number') }} -->
                                    <div class="col-md-10">
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email or Phone Number" style="height: 45px; border-radius: 10px;">
                                        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="container d-flex justify-content-center">
                                    <label for="password"></label>
                                    <!-- {{ __('Password') }} -->
                                    <div class="col-md-10">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" style="height: 45px; border-radius: 10px;">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row mb-3 mt-5 d-flex">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 offset-md-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="font-size: 15px;">
                
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember me?') }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <button type="submit" class="btn px-5 py-2 mb-1" style="background-color: #FFFFFF; border-radius: 10px; font-size: 15px;">
                                                    {{ __('Log In') }}
                                                </button>
                
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link p-0 text-start" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

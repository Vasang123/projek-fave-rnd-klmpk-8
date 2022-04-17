@extends('layouts.app')

@section('content')
<div class="main-container-register d-flex align-items-center py-5" style="background-color: #CEAB93;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="border: 1px solid black;">
                    <div class="card-header text-center p-3" style="background-color: #E3CAA5; border: none; font-size: 30px; font-weight: bold;">
                        {{ __('Register Now') }}
                        <br>
                        <div style="font-size: 15px; color:#737D8A">
                            <span>Already have account?</span>
                            <a href="{{ url('/login')}}" style="color: #0B8ACB;"> Log In</a>
                        </div>
                    </div>
    
                    <div class="card-body" style="background-color: #E3CAA5;">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="container d-flex justify-content-between">
                                    <label for="first_name">
                                        <!-- {{ __('First Name') }} -->
                                    </label>
        
                                    <div class="col-md-5">
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First Name" style="border-radius: 10px; height:50px;">
        
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <label for="last_name">
                                        <!-- {{ __('Last Name') }} -->
                                    </label>
            
                                    <div class="col-md-5" style="margin-right:1.25rem;">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name" style="border-radius: 10px; height:50px;">
            
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="container d-flex justify-content-center">
                                    <label for="email">
                                        <!-- {{ __('Email Address') }} -->
                                    </label>
        
                                    <div class="col-md-11">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" style="border-radius: 10px; height:50px;">
        
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
                                    <label for="phone">
                                        <!-- {{ __('Phone Number') }} -->
                                    </label>
        
                                    <div class="col-md-11">
                                        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Phone Number" style="border-radius: 10px; height:50px;">
        
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="container d-flex justify-content-center">
                                    <label for="address">
                                        <!-- {{ __('Address') }} -->
                                    </label>
        
                                    <div class="col-md-11">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Address" style="border-radius: 10px; height:50px;">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="container d-flex justify-content-center">
                                    <div class="col-md-11">
                                        <p class="m-0" style="font-weight: bold; color:#737D8A; font-size:15px;">Date of Birth</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="container d-flex justify-content-center">
                                    <label for="birth_date">
                                        <!-- {{ __('Date Of Birth') }} -->
                                    </label>
        
                                    <div class="col-md-11">
                                        <input id="birth_date" type="date" class="form-control datepicker @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autofocus style="height:50px; border-radius:10px;">
                                        @error('birth_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="container d-flex justify-content-center">
                                    <label for="password">
                                        <!-- {{ __('Password') }} -->
                                    </label>
        
                                    <div class="col-md-11">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" style="height:50px; border-radius:10px">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="container d-flex justify-content-center">
                                    <label for="password-confirm">
                                        <!-- {{ __('Confirm Password') }} -->
                                    </label>
        
                                    <div class="col-md-11">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style="height:50px; border-radius:10px;" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-0 mt-5">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn px-5" style="height:50px; border-radius:10px; background-color:white; font-size:15px; color:black; font-weight:bold;">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    @include('layouts.footer')
</div>
@endsection

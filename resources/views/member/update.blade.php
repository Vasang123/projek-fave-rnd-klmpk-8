@extends('layouts.app')

@section('content')
<div class="" style="background-color:#E3CAA5;" >
    <div class="d-flex container">
    <div class="container card mt-5 mb-5" style="border-radius:20px">
        <div></div>
        <div class="col-md-12">
            
                <h1 class="ps-5 pt-5" style="color:#AD8B73">Update Profile</h1>
            
            <div class="card-body">
                <form action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-4 d-flex justify-content-center">
                            <img src="/storage/{{Auth::user()->user_image}}" alt="Foto Profil"  class = "rounded-circle"style= " height:150px; width:auto;  ">
                        </div>
                        <div class="col-8">
                            <div class="row justify-content-start mb-3">
                            <label for="user_image" class="col col-form-label text-md-start d-flex col-3">{{ __('Upload Gambar') }}</label>
                            
                                <div class="col-md-9">
                                    <input id="user_image" type="file" class="form-control @error('user_image') is-invalid @enderror" name="user_image"  required autofocus>
                                    @error('user_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="first_name" class="col-md-3 col-form-label text-md-start">{{ __('First Name') }}</label>

                                <div class="col-md-9">
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name' , Auth::user()->first_name) }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
</div>

                            <div class="row mb-3">
                        <label for="last_name" class="col-md-3 col-form-label text-md-start">{{ __('Last Name') }}</label>

                        <div class="col-md-9">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name' , Auth::user()->last_name) }}" required autocomplete="last_name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="email" class="col-md-3 col-form-label text-md-start">{{ __('Email') }}</label>

                        <div class="col-md-9">
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email' , Auth::user()->email) }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="row mt-5">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save Changes') }}
                            </button>
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

@include('layouts.footer')
@endsection


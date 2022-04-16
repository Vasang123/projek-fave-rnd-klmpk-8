@extends('layouts.app')

@section('content')
<div class="" style="background-color:#E3CAA5;" >
    <div class="d-flex container">
    <div class="container card mt-5 mb-5" style="border-radius:20px">
        <div></div>
        <div class="col-md-12">
            
                <h1 class="ps-5 pt-5" style="color:#AD8B73">Profile</h1>
            
            <div class="card-body">
                <form action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-4 d-flex justify-content-center align-items-center">
                            <img src="/storage/{{Auth::user()->user_image}}" alt="Foto Profil"  class = "rounded-circle"style= " height:150px; width:auto;  ">
                        </div>
                        <div class="col-8">
                            
                        
                            <div class="row mb-3">
                                <label for="first_name" class="col-md-3 col-form-label text-md-start">{{ __('First Name') }}</label>

                                <div class="col-md-9 d-flex align-items-center">
                                    <b>{{ old('first_name' , Auth::user()->first_name) }}</b>
                            </div>
</div>

                            <div class="row mb-3">
                        <label for="last_name" class="col-md-3 col-form-label text-md-start">{{ __('Last Name') }}</label>

                        <div class="col-md-9 d-flex align-items-center">
                            <b>{{ old('last_name' , Auth::user()->last_name) }}   </b> 
                        </div>
                    </div>


                    <div class="row mb-5 d-flex align-items-center">
                        <label for="email" class="col-md-3 col-form-label text-md-start">{{ __('Email') }}</label>

                        <div class="col-md-9">
                            <b>{{ old('email' , Auth::user()->email) }}</b>
                        </div>
                    </div>



                    <div class="row mt-5">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <button type="button" class="btn btn-primary">
                                <a href="{{ route('editProfile') }}" style="text-decoration:none; color:#FFFFFF">
                                {{ __('Change Profile') }}
                                </a>
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


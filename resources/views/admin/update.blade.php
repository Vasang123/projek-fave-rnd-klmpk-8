@extends('layouts.app')


@section('content')
<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('status'))
                    <h6 class="alert alet-success">{{session('status')}}</h6>
                @endif
                <div class="container">
                    <h1 class="mt-5" style="color:#AD8B73">Edit Product</h1>
                </div>
                <div class="container mt-5">
                    <form action="{{url('/items/update/'. $item->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="item_name" class="col-md-4 col-form-label text-md-end d-flex justify-content-start ps-md-5"><b class="ps-md-5">{{ __('Name') }}</b></label>

                            <div class="col-md-6">
                                <input id="item_name" type="text" class="form-control @error('item_name') is-invalid @enderror" name="item_name" value="{{ $item->item_name }}" required autocomplete="item_name" autofocus>

                                @error('item_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="item_image" class="col-md-4 col-form-label text-md-end d-flex justify-content-start ps-md-5"> <b class="ps-md-5">{{ __('Upload Image') }}</b></label>

                            <div class="col-md-6">
                                <input id="item_image" type="file" class="form-control @error('item_image') is-invalid @enderror" name="item_image"  required autofocus>

                                @error('item_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="item_desc" class="col-md-4 col-form-label text-md-end d-flex justify-content-start ps-md-5"><b class="ps-md-5">{{ __('Description Barang') }}</b></label>
                            <div class="form-floating col-md-6">
                                <textarea id="item_desc"class="form-control"  @error('item_desc') is-invalid @enderror" name="item_desc" value="item_desc" required  autofocus>{{ $item->item_desc }}</textarea>
                                <label for="floatingTextarea">Description</label>
                                @error('item_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                        </div>
                        <div class="row mb-3">
                            <label for="item_price" class="col-md-4 col-form-label text-md-end d-flex justify-content-start ps-md-5"><b class="ps-md-5">{{ __('Price') }}</b></label>

                            <div class="col-md-6">
                                <input id="item_price" type="number" class="form-control @error('item_price') is-invalid @enderror" name="item_price" value="{{ $item->item_price }}" required autocomplete="item_price" autofocus>

                                @error('item_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="item_stock" class="col-md-4 col-form-label text-md-end d-flex justify-content-start ps-md-5"><b class="ps-md-5">{{ __('Stock Barang') }}</b></label>

                            <div class="col-md-6">
                                <input id="item_stock" type="number" class="form-control @error('item_stock') is-invalid @enderror" name="item_stock" value="{{ $item->item_stock }}" required autocomplete="item_stock" autofocus>

                                @error('item_stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="item_type" class="col-md-4 col-form-label text-md-end d-flex justify-content-start ps-md-5"><b class="ps-md-5">{{ __('Category') }}</b></label>
                            <div class="form-floating col-md-6">
                                <select name="item_type" class=" form-select form-control @error('item_type') is-invalid @enderror" name="item_type" required autocomplete="item_type" autofocus>
                                    @foreach($kategori as $category)
                                    <option value="{{ $category->id}}">{{ $category->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Choose One Category</label>
                            </div>
                            @error('item_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-10 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

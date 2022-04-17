@extends('layouts.app')


@section('content')
<div class="container col-md-6 mt-5"  >
    <div class="container">
        <h1 class="container" id="tambahKategoriLabel" style="color: #AD8B73;">Edit Category</h1>
    </div>
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mb-3 mt-5">
            <div class="row">
            <div class="col-md-4 d-flex justify-content-end align-items-center">
            <label for="nama_kategori">Category Name</label>
            </div>
            <div class="col-md-8">
            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"" placeholder="Masukkan nama kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
            @error('nama_kategori')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-md text-white mt-2">Update</button>
            </div>
    </form>
</div>
@endsection

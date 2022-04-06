@extends('layouts.app')

@section('content')
<div class="col-md-12 d-flex justify-content-center my-4">
    <div class="col-md-5">
        @if(session('errorStatus'))
            <div class="alert alert-danger"><i class="uil uil-times me-2"></i>{{session('errorStatus')}}</div>
        @endif
        <img src="{{asset('storage/' . $item->item_image)}}" class="w-100" >
        <span class="badge bg-primary mb-2">{{ $item->kategori->nama_kategori }}</span>
        <h1 class="fs-2">{{ $item->item_name }}</h1>
        <h1 class="fs-5 text-secondary">Rp. {{ number_format($item->item_price) }}</h1>
        <h1 class="fs-5 mt-4">
            Sisa Stok:
            @if($item->item_stock === '0' || $item->item_stock == null)
                <span class="text-danger">Habis</span>
            @else
                {{ $item->item_stock }}
            @endif
        </h1>

        @guest
            <a href="{{ route('login') }}" class="btn btn-success btn-sm text-white fs-5">Pesan Sekarang</a>
        @else
            @if(Auth::user()->role == 'member')
                <a href="#" class="btn btn-success btn-sm text-white fs-5" data-bs-toggle="modal" data-bs-target="#pesanBarangModal">Pesan Sekarang</a>

                <div class="modal fade" id="pesanBarangModal" tabindex="-1" aria-labelledby="pesanBarangModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pesanBarangModalLabel">Pesan Barang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('pesanan/' . $item->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Jumlah Pesanan</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="uil uil-shopping-cart"></i></span>
                                            <input type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" placeholder="Mau pesan berapa" name="jumlah_pesanan">
                                            @error('jumlah_pesanan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kode Pos</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="uil uil-sign-right"></i></span>
                                            <input type="number" class="form-control @error('kode_pos') is-invalid @enderror" placeholder="Masukkan Kode POS" name="kode_pos">
                                            @error('kode_pos')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Masukkan Alamat</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="uil uil-truck"></i></span>
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Ketik alamat disini" name="alamat"></textarea>
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm text-white">Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endguest
    </div>
</div>
@endsection

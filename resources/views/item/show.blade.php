@extends('layouts.app')

@section('content')
<div class="col-md-12 d-flex justify-content-center py-5" style="background-color: #E3CAA5;">
    <div class="col-md-5 p-3" style="background-color: white;">
        @if(session('errorStatus'))
            <div class="alert alert-danger"><i class="uil uil-times me-2"></i>{{session('errorStatus')}}</div>
        @endif
        <img src="{{asset('storage/images/'.$item->item_image)}}" class="w-100" >
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
            <a href="{{ route('login') }}" class="btn btn-sm text-white fs-5" style="background-color: #CEAB93;">Pesan Sekarang</a>
        @else
            @if(Auth::user()->role == 'member')
            <div class="container">
                <a href="#" class="btn btn-sm fs-5 px-4 me-2" style="background-color: #FFFFFF; border: 2px solid #CEAB93; color:black; font-weight:bold;">Add to Cart</a>
                <a href="#" class="btn btn-sm text-black fs-5 px-4" data-bs-toggle="modal" data-bs-target="#pesanBarangModal" style="background-color: #CEAB93; font-weight:bold;">Buy Now</a>
            </div>

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

<!-- Description -->
<div class="pb-5" style="background-color: #E3CAA5;">
    <div class="container" style="background-color:white;">
        <div class="px-3 py-4">
            <h3 style="font-weight:bold;color:#AD8B73;">Description</h3>
            <p class="fs-5 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, laboriosam cum? Autem, explicabo illum? Veniam sunt doloribus ex explicabo fugiat? Recusandae doloribus similique quidem necessitatibus possimus quae commodi repudiandae cumque.
            Recusandae, doloribus earum. Sint dolore obcaecati temporibus similique id dicta! Impedit, aperiam eum. Vitae labore, at hic iste dolores quaerat aliquam rem nulla, sapiente maxime dignissimos, impedit suscipit nostrum quisquam.
            Tenetur libero, et aperiam aut repellendus quidem distinctio voluptas ea voluptatum eveniet eius perferendis nulla maiores similique iure officiis laborum animi deleniti recusandae? Nisi ipsa vero atque porro aut assumenda!</p>
        </div>
    </div>
</div>

<div>
    @include('layouts.footer')
</div>
@endsection

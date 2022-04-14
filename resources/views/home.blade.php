@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
</div>
<div class="bg-image img-fluid d-flex align-items-center" style="background-image: url({{ asset('images/Hero_BG.png')}}); height: 1440px;background-position:center;background-repeat:no-repeat;background-size:cover">
    <!-- <img src="{{ asset('images/Hero_BG.png')}}" alt="" class="img-fluid"> -->
    
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
        <h1>Welcome to</h1>
        <h1>Budiman Store</h1>
        <a href="#category" type="button" class="btn" style="background-color: #AD8B73; border-radius: 10px; color: #FFFFFF;">Shop Now</a>
        </div>
        <div class="col-lg-2"></div>
    
</div>

<div class="container mt-5">
    <div>
    <h1 id="category" class="d-flex justify-content-center mb-5" style="color:#AD8B73">Top Category</h1>
    </div>
        <div class="row">
            <div class="col d-inline-flex container" style="background-image: url({{asset('images/men_collection.png')}}); height: 700px; background-repeat:no-repeat; background-position: center; background-size:cover" >
            <div style="margin-top:575px">
                <h2>Men's Collection</h2>
                <button type="button" class="btn" style="background-color: #AD8B73; border-radius: 10px; color: #FFFFFF; height:46px">Shop Now</button>
            </div>
            </div>
            <div class="col d-inline container">
                <div class="col d-inline-flex container " style="background-image: url({{asset('images/Accesories.png')}}); height: 330px; background-repeat:no-repeat; background-position: center;margin-bottom: 40px" >
                    <div style="margin-top:200px">
                        <h2>Accesories</h2>
                    <button type="button" class="btn" style="background-color: #AD8B73; border-radius: 10px; color: #FFFFFF; height:46px">Shop Now</button>
</div>
                </div>
                <div class="col d-inline-flex container" style="background-image: url({{asset('images/Book.png')}}); height: 330px; background-repeat:no-repeat; background-position: center;" >
                    <div style="margin-top:200px">
                        <h2>Book</h2>
                    <button type="button" class="btn" style="background-color: #AD8B73; border-radius: 10px; color: #FFFFFF; height:46px">Shop Now</button>
            </div>
                </div>
            </div>
            <div class="col d-inline-flex container" style="background-image: url({{asset('images/Womens_Collection.png')}}); height: 700px; background-repeat:no-repeat; background-position: center; background-size:cover" >
            <div style="margin-top:575px">
                <h2>Women's Collection</h2>
                <button type="button" class="btn" style="background-color: #AD8B73; border-radius: 10px; color: #FFFFFF; height:46px">Shop Now</button>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div>
        <h1 class="d-flex justify-content-center mb-5" style="color:#AD8B73">Popular Product</h1>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        @foreach ($items as $item)
        <div class="col-xl-3 col-6 mb-3">
            <div class="col-md-12 shadow-sm">
                <img src="{{asset('storage/' . $item->item_image)}}" class="w-100" >
                <div class="card-body">
                    <h5 class="card-title">{{ $item->item_name }}</h5>
                    <p class="card-text">Rp. {{ number_format($item->item_price) }}</p>
                    <p class="card-text">
                        Stok:
                        @if($item->item_stock === '0' || $item->item_stock == null)
                            <span class="text-danger">Barang Kosong</span>
                        @else
                            {{ $item->item_stock }}
                        @endif
                    </p>
                    <a href="{{ route('showItems', $item->id) }}" class="btn text-white w-100" style="background-color: #AD8B73; border-radius: 10px; color: #FFFFFF">Lihat <i class="uil uil-eye ms-1"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection



@extends('layouts.footer')
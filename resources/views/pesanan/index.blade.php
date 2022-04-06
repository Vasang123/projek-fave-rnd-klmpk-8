@extends('layouts.app')


@section('content')
<h1>Halaman Pesanan</h1><div class="d-flex justify-content-center mt-5">
    <div class="col-md-8">
        @if(session('status'))
            <div class="alert alert-success"><i class="uil uil-check me-1"></i>{{session('status')}}</div>
        @endif
        @if(Auth::user()->role == 'admin')
            <h1 class="fs-3 mb-5"><i class="uil uil-history me-1"></i> KELOLA PESANAN</h1>
            @if($pesananPending->count() == null)
                <div class="alert alert-warning" role="alert">
                    Belum ada pesanan
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Alamat Pengiriman</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesananPending as $data)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>
                                {{ $data->items->item_name }}
                                <br>
                                <span class="badge bg-light text-dark">{{ $data->items->kategori->nama_kategori }}</span>
                            </td>
                            <td>
                                {{ $data->alamat }}
                                <br>
                                <span class="badge bg-dark">Kode Pos {{ $data->kode_pos }}</span>
                            </td>
                            <td>
                                <b>INV</b>{{ $data->nomor_invoice }}
                                <br>
                                <span class="badge bg-warning text-dark">{{ $data->status }}</span>
                            </td>
                            <td>{{ $data->jumlah_pesanan }}</td>
                            <td>Rp. {{ number_format($data->items->item_price) }}</td>
                            <td><b>Rp. {{ number_format($data->total_harga) }}</b></td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm fs-6 fw-bold text-white" onclick="event.preventDefault(); document.getElementById('delete-form-{{$data->id}}').submit();">
                                    <i class="uil uil-check me-1"></i> Terima
                                    <form id="delete-form-{{$data->id}}" action="{{url('pesanan/'. $data->id)}}" method="POST" style="display:none";>
                                        @csrf
                                        @method('PUT');
                                    </form>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @elseif(Auth::user()->role == 'member')
            <h1 class="fs-3 mb-5"><i class="uil uil-history me-1"></i> PESANAN KAMU</h1>
            @if($pesanan->count() == null)
                <div class="alert alert-warning" role="alert">
                    Belum ada pesanan
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Alamat Pengiriman</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanan as $data)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>
                                {{ $data->items->item_name }}
                                <br>
                                <span class="badge bg-light text-dark">{{ $data->items->kategori->nama_kategori }}</span>
                            </td>
                            <td>
                                {{ $data->alamat }}
                                <br>
                                <span class="badge bg-dark">Kode Pos {{ $data->kode_pos }}</span>
                            </td>
                            <td>
                                <b>INV</b>{{ $data->nomor_invoice }}
                                <br>
                                @if($data->status == 'Accepted')
                                <span class="badge bg-success">{{ $data->status }}</span>
                                @elseif($data->status == 'Pending')
                                <span class="badge bg-warning text-dark">{{ $data->status }}</span>
                                @endif
                            </td>
                            <td>{{ $data->jumlah_pesanan }}</td>
                            <td>Rp. {{ number_format($data->items->item_price) }}</td>
                            <td><b>Rp. {{ number_format($data->total_harga) }}</b></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endif
    </div>
</div>
{{--  --}}
@endsection

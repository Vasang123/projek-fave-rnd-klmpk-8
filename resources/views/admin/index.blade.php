@extends('layouts.app')


@section('content')
<div class="container">
    <h1 class="mt-5" style="color:#AD8B73">Manage Items</h1>
    @if (session('status'))
    <h6 class="alert alet-success">{{session('status')}}</h6>
    @endif
    <div class="container d-flex justify-content-end">
      <button type="button" class="btn btn-success d-flex justify-content-end mb-3"><a href="{{url('items')}}" class="text-decoration-none text-light">Add New</a> </button>
    </div>
    <table class="table table-borderless " style="p-5">
        <thead>
          <tr>
            <th scope="col"><h2 class="d-flex justify-content-center"  style="color:#AD8B73">ID</h2></th>
            <th scope="col"><h2 class="d-flex justify-content-center" style="color:#AD8B73">Name</h2></th>
            <th scope="col"><h2 class="d-flex justify-content-center" style="color:#AD8B73">Gambar</h2></th>
            <th scope="col"><h2 class="d-flex justify-content-center" style="color:#AD8B73">Description</h2></th>
            <th scope="col"><h2 class="d-flex justify-content-center" style="color:#AD8B73">Harga</h2></th>
            <th scope="col"><h2 class="d-flex justify-content-center" style="color:#AD8B73">Stock</h2></th>
            <th scope="col"><h2 class="d-flex justify-content-center" style="color:#AD8B73">Category</h2></th>
            <th scope="col"><h2 class="d-flex justify-content-center" style="color:#AD8B73">Option</h2></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
       
          <tr class="mb-5">
                <th scope="row">ID-000{{$item->id}}</th>
                <td>{{$item->item_name}}</td>
                <td>
                    <img src="{{asset('storage/images/'.$item->item_image)}}" width="200px" height="auto" ></td>
                <td width="200px">{{$item->item_desc}}</td>
                <td>Rp {{$item->item_price}}</td>
                <td class="ps-4">{{$item->item_stock}}</td>
                <td>{{$item->kategori->nama_kategori}}</td>
                <td class="d-flex justify-content-evenly ">
                    <button type="button" class="btn btn-primary"><a href="{{url('items/update/'. $item->id)}}" class="text-decoration-none text-light" >Update</a> </button>
                    <button type="button" class="btn btn-danger">
                        <a href="#" class="text-white text-decoration-none" onclick="event.preventDefault();document.getElementById('delete-form-{{$item->id}}').submit();">
                            Delete
                            <form id="delete-form-{{$item->id}}" action="{{url('items/delete/'. $item->id)}}" method="POST" style="display:none";>
                                @csrf
                                @method('DELETE');
                            </form>
                        </a>
                    </button>
                </td>
          </tr>
        
        @endforeach
        </tbody>
      </table>
</div>
@endsection

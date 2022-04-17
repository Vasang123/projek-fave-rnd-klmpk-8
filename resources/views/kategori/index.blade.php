@extends('layouts.app')


@section('content')
<div class="container col-md-8 mt-5">
    <h1 class="mb-5" style="color: #AD8B73;">Manage Kategori</h1>
    @if (session('status'))
    <h6 class="alert alet-success">{{session('status')}}</h6>
    @endif
    <div class="d-flex justify-content-end mb-5">
    <button type="button" class="btn btn-success"><a href="{{url('kategori/create')}}" class="text-decoration-none text-light" >Add Kategori</a> </button>
    </div>
    <table class="table container table-borderless">
        <thead align="center">
            <tr>
                <th scope="col" ><h2 style="color: #AD8B73;">Number</h2></th>
                <th scope="col"><h2 style="color: #AD8B73;">Category Name</h2></th>
                <th scope="col"><h2 style="color: #AD8B73;">Option</h2></th>
            </tr>
        </thead>
        <tbody align="center">
            @foreach($kategori as $data)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $data->nama_kategori }}</td>
                <td class="d-flex justify-content-evenly">
                    <button type="button" class="btn btn-primary"><a href="{{ route('kategori.edit', $data->id) }}" class="text-light text-decoration-none">Update</a> </button>
                    <button type="button" class="btn btn-danger">
                        <a href="#" class="text-white text-decoration-none" onclick="event.preventDefault();document.getElementById('delete-form-{{$data->id}}').submit();">
                            Delete
                            <form id="delete-form-{{$data->id}}" action="{{url('kategori/delete/'. $data->id)}}" method="POST" style="display:none";>
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

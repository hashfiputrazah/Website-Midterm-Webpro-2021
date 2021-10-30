@extends('layout.v_template')
@section('title', 'guru')

@section('content')
<a href="" class="btn btn-primary btn-sm">Add</a><br>

@if(session('pesan'))
<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{session('pesan')}}.
              </div>
@endif
<table class ="table table-bordered"> 
    <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama Guru</th>
            <th>Mata Pelajaran</th>
            <th>Foto Guru</th>
            <th>Action</th>
        </tr>
    </thead>
<tbody>
   
    @foreach ($guru as $data)
    <tr>
        <td></td>
        <td>{{$data->nip}}</td>
        <td>{{$data->nama_guru}}</td>
        <td>{{$data->mapel}}</td>
        <td><img src="{{url('foto_guru.jpg/'.$data->foto_guru)}}" alt=""></td>
        <td>
            <a href="/guru/detail/{{$data->id_guru}}"class="btn btn-sm btn-success">Detail</a>
            <a href=""class="btn btn-sm btn-warning">Edit</a>
            <a href=""class="btn btn-sm btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach

</tbody>
</table>
@endsection
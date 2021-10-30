@extends('layout.v_template')

@section('title', 'detailguru')
@section('content')
<table class="table">
<tr>
    <th width="100px">NIP</th>
    <th width="30px">:</th>
    <th>{{$guru->nip }}</th>
</tr>
<tr>
    <th width="100px">Nama Guru</th>
    <th width="30px">:</th>
    <th>{{$guru->nama_guru }}</th>
</tr>
<tr>
    <th width="100px">Mata Pelajaran</th>
    <th width="30px">:</th>
    <th>{{$guru->mapel}}</th>
</tr>
<tr>
    <th width="100px">Foto Guru</th>
    <th width="30px">:</th>
    <th><img src=></th>
</tr>
<tr>
<th>
    <a href="/guru" class="btn btn-success tbn sm">kembali</a>
</th>
</tr>
@endsection
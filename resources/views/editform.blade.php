@extends('layout')

@section('pagetitle','Edit Data')

@section('title','Perubahan data')

@section('contents')
    <form action="/biodata/{{$biodata->id}}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <p>Nama : <input type="text" name="nama" value="{{$biodata->nama}}"></p>
        <p>Alamat : <input type="text" name="alamat" value="{{$biodata->alamat}}"></p>
        <p><input type="submit" name="submit" value="Simpan"></p>
    </form>
@endsection
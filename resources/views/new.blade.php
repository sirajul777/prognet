@extends('layout')

@section('pagetitle','New Data')

@section('title','Input data baru')

@section('contents')
    <form action="/biodata" method="POST">
        @csrf
        <p>Nama : <input type="text" name="nama"></p>
        <p>Alamat : <input type="text" name="alamat"></p>
        <p><input type="submit" name="submit" value="Simpan"></p>
    </form>
@endsection
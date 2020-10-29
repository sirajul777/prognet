@extends('layout')

@section('pagetitle','List Biodata')

@section('title','Daftar Biodata')

@section('contents')
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
        @foreach($biodata as $b)
            <tr>
                <td>{{$b->id}}</td>
                <td>{{$b->nama}}</td>
                <td>{{$b->alamat}}</td>
                <td><a href="/biodata/{{$b->id}}/edit">Edit</a></td>
                <td>
                    <form action="/biodata/{{$b->id}}" method="POST"> 
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" name="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
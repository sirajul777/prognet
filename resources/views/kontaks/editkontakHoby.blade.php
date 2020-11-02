@extends('layout.apps')
@section('title','detail')
@section('titleContent','edit kontak hobbies ')
@section('mid')
<form id="tamkonhob" action="/kontak-hobbies/delete" method="POST">
    @csrf
    <input type="text" id="idkonHob" hidden name="idkonHob" value="{{ $idk }}">
    <div class="mb-3">
        <label for="hobby" class="form-label">Daftar Hobby</label>
        @foreach ($hobby_dell as $items)
                <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="isian[]" value="{{ $items }}">
                        <label class="form-check-label" for="flexCheckDefault">
                                {{ $items }}
                        </label>
                </div>
        @endforeach
    </div>
    
    <div class="modal-footer">
        <a href="/kontak-hobbies" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-danger">Delete</button>
    </div>
    
</form>
@endsection
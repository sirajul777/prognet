@extends('layout.apps')
@section('title','detail')
@section('titleContent','edit kontak')
@section('mid')
 <form id="updateData" action="{{ route('kontak.update', $editKontaks) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <input type="text" hidden id="id" name="id" value="{{ $editKontaks->id }}">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama lengkap</label>
                <input type="text" id="nama" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" value="{{ $editKontaks->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" id="alamat" value="{{ $editKontaks->alamat }}" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">telepon</label>
                <input type="text" id="telepon" name="telepon" class="form-control" id="telepon" value="{{ $editKontaks->telepon }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="text" id="email" name="email" class="form-control" id="email" value="{{ $editKontaks->email }}" required>
            </div>
            <div class="mb-3">
                <label for="golonganD" class="form-label">Golongan Darah</label>
                <select class="form-select" id="golonganD" aria-label="Default select example" name="golonganD"  required>
                    @foreach ($darahid as $item)
                        <option value="{{ $item->id }}"
                            @if ($item->id == $editKontaks->darahid)
                                SELECTED
                            @endif
                            >{{ $item->goldarah }}{{ $item->rhesus }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="hobby" class="form-label">Hobby</label>
               @foreach ($hobby as $item)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="hobby[]"
                    @if (in_array($item->id,$hoy))
                        CHECKED
                    @endif
                    >
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $item->hobby }}
                    </label>
                </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary edit" data-dismiss="modal">Close</button>
                <button type="submit" id="saveButton" class="btn btn-primary">Save changes</button>
            </div>
        </form>
@endsection
@extends('layout/apps')

@section('title','kontak')
@section('titleContent','List Kontak')
@section('modal')

<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-5" data-toggle="modal" data-target="#exampleModal">
    Insert Data
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert Data Baru</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kontak.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">telepon</label>
                        <input type="text" name="telepon" class="form-control" id="telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="text" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="golonganD" class="form-label">Golongan Darah</label>
                        <select class="form-select" aria-label="Default select example" name="golonganD" required>
                            <option value="" selected disable>Pilih golongan darah</option>
                            @foreach ($darahid as $item)
                            <option value="{{ $item->id }}">{{ $item->goldarah }} {{ $item->rhesus }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hobby" class="form-label">Hobby</label>
                        @foreach ($hobby as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="hobby[]">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $item->hobby }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary edit" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


@endsection

<!-- Modal -->


@section('mid')

<div class="table-responsive">
    <table class="table table-warning table-triped text-center">
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>telephon</th>
            <th>email</th>
            <th>alamat</th>
            <th>golongan darah</th>
            <th>hobby</th>
            <th>opsi</th>
        </tr>
        <?php 

    $no = 1;
    ?>
        @foreach($kontak as $k)
        <tr>
            <td class="table-dark"><?= $no++ ?></td>
            <td class="table-dark">{{ $k->nama }}</td>
            <td class="table-dark">{{ $k->telepon }}</td>
            <td class="table-dark">{{ $k->email }}</td>
            <td class="table-dark">{{ $k->alamat }}</td>
            <td class="table-dark">{{ $k->darah->goldarah }}{{  $k->darah->rhesus }}</td>
            <td class="table-dark">
                <ul>
                    @foreach($k->hobby as $hoby)
                    @if ($hoby)
                    <li> {{ $hoby->hobby }} </li>
                    @else
                    None
                    @endif
                    @endforeach
                </ul>
            </td>
            <td class="table-dark d-flex m-auto">
                <form action="/kontak/{{ $k->id }}" method="POST">
                    <button type="button" id="{{ $k->id }}" class="btn btn-info edit" data-toggle="modal"
                        data-target="#editModals">Edit</button>

                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>



        </tr>
        @endforeach


    </table>
</div>


@endsection

{{-- form edit --}}

<!-- Modal -->
<div class="modal fade" id="editModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="updateData" action="{{ route('kontak.update', $k) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="text" hidden id="edid" name="idkontaks">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama lengkap</label>
                        <input type="text" id="ednama" name="ednama" class="form-control" id="nama"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" id="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">telepon</label>
                        <input type="text" id="telepon" name="telepon" class="form-control" id="telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="text" id="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="golonganD" class="form-label">Golongan Darah</label>
                        <select class="form-select" id="golonganD" aria-label="Default select example" name="golonganD"
                            required>
                            @foreach ($darahid as $item)
                            <option value="{{ $item->id }}">{{ $item->goldarah }}{{ $item->rhesus }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="hobby" class="form-label">Hobby</label>
                        @foreach ($hobby as $item)
                        <div class="form-check">
                            <input class="form-check-input" id="hobby" type="checkbox" value="{{ $item->id }}"
                                name="hobby[]">
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
            </div>
        </div>
    </div>
</div>
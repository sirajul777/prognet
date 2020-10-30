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
                <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" required>
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
                        <option value="{{ $item->id }}">{{ $item->goldarah }}</option>
                    @endforeach
                </select>
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
        <th>opsi</th>
    </tr>
    <?php 

    $no = 1;
    $darah = array('A','B','AB','O' );
    ?>
        @foreach($kontak as $kontak)
            <tr>
                <td class="table-dark"><?= $no++ ?></td>
                <td class="table-dark">{{ $kontak->nama }}</td>
                <td class="table-dark">{{ $kontak->telepon }}</td>
                <td class="table-dark">{{ $kontak->email }}</td>
                <td class="table-dark">{{ $kontak->alamat }}</td>
                <td class="table-dark">{{ $kontak->darah->goldarah }}</td>
                
                <td class="d-flex m-auto">
                    <form action="/kontak/{{ $kontak->id }}" method="POST"> 
                        <button type="button" id="{{ $kontak->id }}" class="btn btn-info edit" data-toggle="modal" data-target="#editModals">Edit</button>
                        
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

        <form id="updateData" action="{{ route('kontak.update',$kontak) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <input type="text" hidden id="id" name="id">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama lengkap</label>
                <input type="text" id="nama" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" required>
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
                <select class="form-select" id="golonganD" aria-label="Default select example" name="golonganD" required>
                    <option value="" disable>Pilih golongan darah</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">AB</option>
                    <option value="4">O</option>
                </select>
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
    
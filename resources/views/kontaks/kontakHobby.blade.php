@extends('layout.apps')
@section('title','detail')
@section('titleContent','Detail kontak hobbies ')

@section('mid')

<div class="table-responsive">
<table class="table table-warning table-triped text-center">
    <tr>
        <th>no</th>
        <th>Nama</th>
        <th>Hobby</th>
        <th>opsi</th>
    </tr>
    <?php 

    $no = 1;
    
    ?>
        @foreach($k as $k)
            <tr>
                <td class="table-dark"><?= $no++ ?></td>
                <td class="table-dark">{{ $k->nama }}</td>
                <td class="table-dark">
                    <ul>
                        @foreach ($k->hobby as $hoby)
                            @if ($hoby)
                                <li> {{ $hoby->hobby }} </li>
                            @else
                            None
                            @endif
                        @endforeach
                            
                       
                    </ul>
                </td>
                <td class="table-dark">
                        <button type="button" id="{{ $k->id }}" class="btn btn-info editHob" data-toggle="modal" data-target="#editkh">Edit</button>
                        
                        <button type="submit" id="{{ $k->id }}" class="btn btn-success tamHobby" data-target="#tambah" data-toggle="modal">Tambah</button>
                </td>               
            </tr>
        @endforeach
    </table>
</div>  
@endsection


@section('modal')

    <!-- Button trigger modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah hobby</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="tamkonhob" action="{{ route('kontak-hobbies.store') }}" method="post">
            @csrf
            <input type="text" hidden id="idkonHob" name="idkonHob">
            <div class="mb-3">
                <label for="hobby" class="form-label">hobby</label>
                <select class="form-select" aria-label="Default select example" name="hobby" required>
                    <option value="" selected disable>Pilih Hobby</option>
                    @foreach ($h as $item)
                        <option value="{{ $item->id }}">{{ $item->hobby }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            
        </form>
      </div>
     
    </div>
  </div>
</div>


@endsection
<!-- Edit kh Modal -->
<div class="modal fade" id="editkh" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert Data Baru</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updatekh" action="{{ route('kontak-hobbies.update',$k) }}" method="POST">
            @csrf
             {{ method_field('PUT') }}
            <input type="text" hidden id="idkh" name="idkh">
            @foreach ($k->hobby as $item)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="isian[]" value="{{ $item->id }}">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $item->hobby }} <small>isian[{{ $item->id }}]</small>
                        </label>
                </div>
            @endforeach
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary edit" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
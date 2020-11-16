@extends('layout.apps')
@section('title','Golongan Darah')
@section('titleContent','List Golongan Darah')

@section('mid')

<div class="table-responsive">
  <table class="table table-warning table-triped text-center">
    <tr>
      <th>no</th>
      <th>darah</th>
      <th>Rhesus</th>

      <th>opsi</th>
    </tr>
    <?php 

    $no = 1;
    
    ?>
    @foreach($darah as $darah)
    <tr>
      <td class="table-dark"><?= $no++ ?></td>
      <td class="table-dark">{{ $darah->goldarah }}</td>
      <td class="table-dark">{{ $darah->rhesus }}</td>
      <td class="table-dark">
        <form action="/golonganDarah/{{ $darah->id }}" method="POST">
          <button type="button" id="{{ $darah->id }}" class="btn btn-info editDarah" data-toggle="modal"
            data-target="#editdarah">Edit</button>

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
        <form action="{{ route('golonganDarah.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="darah" class="form-label">Golongan Darah</label>
            <input type="text" name="darah" class="form-control" id="darah" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="rhesus" class="form-label">Rhesus</label>
            <input type="text" name="rhesus" class="form-control" id="rhesus" aria-describedby="emailHelp" required>
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
<!-- Edit darah Modal -->
<div class="modal fade" id="editdarah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Golongan Darah</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updatedarah" action="{{ route('golonganDarah.update',$darah) }}" method="POST">
          @csrf
          {{ method_field('PUT') }}
          <input type="text" hidden id="iddarah" name="iddarah">
          <div class="mb-3">
            <label for="darah" class="form-label">Golongan Darah</label>
            <input type="text" name="editDarah" class="form-control" id="editDarah" aria-describedby="emailHelp"
              required>
          </div>
          <div class="mb-3">
            <label for="rhesus" class="form-label">Rheusus</label>
            <input type="text" name="editRhesus" class="form-control" id="editRhesus" aria-describedby="emailHelp"
              required>
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
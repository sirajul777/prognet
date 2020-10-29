@extends('layout.apps')
@section('title','Hoby')
@section('titleContent','List Hoby')

@section('mid')

<div class="table-responsive">
<table class="table table-warning table-triped ">
    <tr>
        <th>no</th>
        <th>hobby</th>
        <th>create at</th>
        <th>update at</th>
        <th>opsi</th>
    </tr>
    <?php 

    $no = 1;

    ?>
        @foreach($hobby as $hobby)
            <tr>
                <td class="table-dark"><?= $no++ ?></td>
                <td class="table-dark">{{ $hobby->hobby }}</td>
                <td class="table-dark">{{ $hobby->created_at }}</td>
                <td class="table-dark">{{ $hobby->updated_at }}</td>
                <td class="d-flex m-auto">
                    <form action="/hobby/{{ $hobby->id }}" method="POST"> 
                        <button type="button" id="{{ $hobby->id }}" class="btn btn-info editHobby" data-toggle="modal" data-target="#editHobby">Edit</button>
                        
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
        <form action="{{ route('hobby.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="hobby" class="form-label">Nama Hoby</label>
                <input type="text" name="hobby" class="form-control" id="hobby" aria-describedby="emailHelp" required>
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
<!-- Edit hobby Modal -->
<div class="modal fade" id="editHobby" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert Data Baru</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateHobby" action="{{ route('hobby.update',$hobby) }}" method="POST">
            @csrf
             {{ method_field('PUT') }}
            <input type="text" hidden id="idHobby" name="idHobby">
            <div class="mb-3">
                <label for="hobby" class="form-label">Nama Hoby</label>
                <input type="text" name="editHobby" class="form-control" id=" " aria-describedby="emailHelp" required>
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
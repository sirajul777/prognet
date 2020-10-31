<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <style>
      body {
        font-size: .875rem;
      }

      /*
      * Sidebar
      */

      .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 48px 0 0; /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
      }
      .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
      }

      .sidebar .nav-link {
        font-weight: 500;
        color: #BBB;
      }

      .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #727272;
      }

      .sidebar .nav-link.active {
        color: #007bff;
      }

      .sidebar .nav-link:hover .feather,
      .sidebar .nav-link.active .feather {
        color: inherit;
      }

      .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
      }

      /*
      * Navbar
      */

      .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
      }

      .navbar .navbar-toggler {
        top: .25rem;
        right: 1rem;
      }

    </style>
    

    <title>@yield('title')</title>
  </head>
  <body>

    @include('layout.navbar')

    @include('layout.content')






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>

    {{-- jquery --}}
    <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    
    <script type="text/javascript">
      
        // setup csrf token js
        $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });

        const xhttp = new XMLHttpRequest;;
        
        
        // tombol edit kontak
        $(document).on('click','.edit',function(){
          var idEdit = $(this).attr('id');
          $.get('kontak/' + idEdit +'/edit', function (data) {
            $('#updateData #id').val(idEdit);
            $('#updateData #nama').val(data.nama);
            $('#updateData #alamat').val(data.alamat);
            $('#updateData #email').val(data.email);
            $('#updateData #telepon').val(data.telepon);
            $('#updateData #golonganD').val(data.darahid)
          })
        });

        // tombol edit hobby
        $(document).on('click','.editHobby',function(){
          var idEdit = $(this).attr('id');
          $.get('hobby/' + idEdit +'/edit', function (data) {
            $('#updateHobby #idHobby').val(idEdit);
            $('#updateHobby #editHobby').val(data.hobby);
          })
        });

        // tombol edit golongan darah
        $(document).on('click','.editDarah',function(){
          var idEdit = $(this).attr('id');
          
          $.get('golonganDarah/' + idEdit +'/edit', function (data) {
            $('#editdarah #iddarah').val(idEdit);
            $('#editdarah #editDarah').val(data.goldarah);
            $('#editdarah #editRhesus').val(data.rhesus);
          })
        });

        // tombol tambah hobby untuk kontak dengan id
        $(document).on('click','.tamHobby',function(){
          var idEdit = $(this).attr('id');
          $('#tamkonhob #idkonHob').val(idEdit);
        });
        // tombol edit kontak hobby
        $(document).on('click','.editHob',function(){
          var idEdit = $(this).attr('id');
        });



        // // delete kontak
        // $(document).on('click','.delete',function(){
        //   var idDelete = $(this).attr('id');
        //   confirm("Are You sure want to delete !");
        //   $.ajax({
        //       type: 'DELETE',
        //       url: "/kontak"+ '/'+idDelete,
        //       data: {id:idDelete},
        //       success: function() {
        //           $('#updateData #id').val(idEdit);
        //       }, error: function(response){
        //           console.log(response.responseText);
        //       }
        //   });
        // });
    </script>
  
    <!-- Option 2: Separate Popper.js and Bootstrap JS
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
    -->
  </body>
</html>
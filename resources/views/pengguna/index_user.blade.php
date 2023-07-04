@extends('template')
@section('content')
<link rel="stylesheet" href="{{asset('AdminLTE3/plugins/toastr/toastr.css')}}">
<style>
  #myInput {
  background-image: url('https://www.w3schools.com/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  /* margin-bottom: 12px; */
  }
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Pengguna</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Pengguna</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                @if ($message = Session::get('sukses'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
                </div>
                @endif
        
                @if ($message = Session::get('gagal'))
                <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
                </div>
                @endif
        
                @if ($message = Session::get('peringatan'))
                <div class="alert alert-warning alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Karyawan PT Shuanying International Indonesia
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                  {{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Launch Demo Modal</button> --}}
                                </li>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><li class="fa fa-plus">&nbsp;Tambah Data</li>
                                </button>
                                &nbsp;
                                &nbsp;
                                <li class="nav-item">
                                    <input class="form-control" id="myInput" type="text" placeholder="Search.." onkeyup="search()">
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>ID Anggota</th>
                                <th>Nama Anggota</th>
                                <th>Departemen</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody id="myTable">
                              @if(!isset($data))
                                <tr>
                                  <td style="text-align:center" colspan="6">No Data Available</td>
                                </tr>
                              @else
                                @foreach ($data as $row)
                                <tr>
                                  <td>{{$row->id_pengguna}}</td>
                                  <td>{{$row->nama_anggota}}</td>
                                  <td>{{$row->departemen}}</td>
                                  <td>{{$row->username}}</td>
                                  <td>{{$row->password}}</td>
                                  <td>
                                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalEditUser_{{ $row->id_pengguna }}">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#DeleteModal_{{ $row->id_pengguna }}">Delete</a>
                                  </td>
                                </tr>
                                @include('pengguna.edit_user')
                                @include('pengguna.delete_user')
                                @endforeach
                              @endif
                            </tbody>
                          </table>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </section>
            <!-- right col -->
        </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
@include('pengguna.add_user')

@endsection
<!-- jQuery -->
<script src="{{('AdminLTE3/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{('AdminLTE3/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE3/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('AdminLTE3/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('AdminLTE3/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('AdminLTE3/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('AdminLTE3/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('AdminLTE3/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('AdminLTE3/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLTE3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('AdminLTE3/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE3/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('AdminLTE3/plugins/toastr/toastr.js')}}"></script> --}}
<script>

    function search() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }

    function reset() {
      document.getElementById("myForm").reset();
    }

    function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
</script>
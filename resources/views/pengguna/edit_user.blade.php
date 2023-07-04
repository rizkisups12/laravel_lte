  <form id="edit" method="post" action="/index_user/update">
    {{ csrf_field() }}
    <!-- Modal -->
  <div class="modal fade" id="ModalEditUser_{{ $row->id_pengguna }}" tabindex="-1" role="dialog" aria-labelledby="ModalEditUserLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalEditUserLabel">Edit Data Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{-- <h4>{{ $row->id_pengguna }}</h4> --}}
            <div class="form-group">
              <label for="">ID Pengguna</label><br>
              <input class="form-control" type="text" name="id_pengguna" value="{{$row->id_pengguna}}" readonly><br>
            </div>
            <div class="form-group" style="display: flex;">
              <div class="column" style="flex:50%">
                <label for="">Nama Pengguna</label><br>
                <input class="form-control" type="text" name="nama_anggota" value="{{$row->nama_anggota}}">
              </div>
              &nbsp;&nbsp;&nbsp;
              <div class="column" style="flex:50%">
                <label for="">Departemen</label><br>
                <input class="form-control" type="text" name="departemen" value="{{$row->departemen}}">
              </div>
            </div>
            <div class="form-group" style="display: flex;">
              <div class="column" style="flex:50%">
                <label for="">Username</label><br>
                <input class="form-control" type="text" name="username" value="{{$row->username}}">
              </div>
              &nbsp;&nbsp;&nbsp;
              <div class="column" style="flex:50%">
                <label for="">Password</label><br>
                <input class="form-control" type="password" name="password" autocomplete="on" value="{{$row->password}}">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" class="btn btn-danger" onclick="reset()">Bersihkan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
<script>
    function reset() {
      document.getElementById("edit").reset();
    }
</script>
<form id="myForm" method="post" action="/index_user/store">
    {{ csrf_field() }}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">ID Pengguna</label><br>
                        <input class="form-control" type="text" name="id_pengguna"><br>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">Nama Pengguna</label><br>
                            <input class="form-control" type="text" name="nama_anggota">
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">Departemen</label><br>
                            <input class="form-control" type="text" name="departemen">
                        </div>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">Username</label><br>
                            <input class="form-control" type="text" name="username">
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">Password</label><br>
                            <input class="form-control" type="password" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="reset()">Bersihkan</button>
                </div>
            </div>
        </div>
    </div>
</form>

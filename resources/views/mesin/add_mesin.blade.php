<form id="myForm" method="post" action="/mesin/store">
    {{ csrf_field() }}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mesin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">ID Mesin</label><br>
                            <input class="form-control" type="text" name="id_mesin">
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">Nama Mesin</label><br>
                            <input class="form-control" type="text" name="nama_mesin">
                        </div>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">Tipe Mesin</label><br>
                            <input class="form-control" type="text" name="tipe_mesin">
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">Kapasitas</label><br>
                            <input class="form-control" type="text" name="kapasitas">
                        </div>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">Berat Mesin</label><br>
                            <input class="form-control" type="text" name="berat_mesin">
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">Tahun</label><br>
                            <input class="form-control" type="text" id="datepicker" name="tahun">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script>
    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
</script>

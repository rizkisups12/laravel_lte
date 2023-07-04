  <form id="edit" method="post" action="/mesin/update">
    {{ csrf_field() }}
    <!-- Modal -->
    <div class="modal fade" id="ModalEditMesin_{{ $row->id_mesin }}" tabindex="-1" role="dialog" aria-labelledby="ModalEditMesinLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalEditMesinLabel">Edit Data Mesin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group" style="display: flex;">
                <div class="column" style="flex:50%">
                    <label for="">ID Mesin</label><br>
                    <input class="form-control" type="text" name="id_mesin" value="{{$row->id_mesin}}">
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="column" style="flex:50%">
                    <label for="">Nama Mesin</label><br>
                    <input class="form-control" type="text" name="nama_mesin" value="{{$row->nama_mesin}}">
                </div>
            </div>
            <div class="form-group" style="display: flex;">
                <div class="column" style="flex:50%">
                    <label for="">Tipe Mesin</label><br>
                    <input class="form-control" type="text" name="tipe_mesin" value="{{$row->tipe_mesin}}">
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="column" style="flex:50%">
                    <label for="">Kapasitas</label><br>
                    <input class="form-control" type="text" name="kapasitas" value="{{$row->kapasitas}}">
                </div>
            </div>
            <div class="form-group" style="display: flex;">
                <div class="column" style="flex:50%">
                    <label for="">Berat Mesin</label><br>
                    <input class="form-control" type="text" name="berat_mesin" value="{{$row->berat_mesin}}">
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="column" style="flex:50%">
                    <label for="">Tahun</label><br>
                    <input class="form-control" type="text" id="datepickerEdit_{{ $row->id_mesin }}" name="tahun" value="{{$row->tahun}}">
                </div>
            </div>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" class="btn btn-danger" id="btn-clear">Bersihkan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script>
    $("#btn-clear").click(function(){
        $('input').attr('value', function() { return value = "" });
    });
    
    $('#datepickerEdit_{{ $row->id_mesin }}').datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
</script>
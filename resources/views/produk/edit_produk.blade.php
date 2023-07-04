<form id="edit" method="post" action="produk/update">
    {{ csrf_field() }}
    <!-- Modal -->
    <div class="modal fade" id="ModalEditproduk_{{ $row->id_produk }}" tabindex="-1" role="dialog" aria-labelledby="ModalEditProdukLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalEditProdukLabel">Edit Data Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group" style="display: flex;">
                <div class="column" style="flex:50%">
                    <label for="">Nomor Produk</label><br>
                    <input class="form-control" type="text" name="id_produk" value="{{$row->id_produk}}">
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="column" style="flex:50%">
                    <label for="">Nama Produk</label><br>
                    <input class="form-control" type="text" name="nama_produk" value="{{$row->nama_produk}}">
                </div>
            </div>
            <div class="form-group" style="display: flex;">
                <div class="column" style="flex:50%">
                    <label for="">Tipe Produk</label><br>
                    <input class="form-control" type="text" name="tipe_produk" value="{{$row->tipe_produk}}">
                </div>
                &nbsp;&nbsp;&nbsp;
                <div class="column" style="flex:50%">
                    <label for="">Berat Produk</label><br>
                    <input class="form-control" type="text" name="berat_produk" value="{{$row->berat_produk}}">
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
<script>
    $("#btn-clear").click(function(){
        $('input').attr('value', function() { return value = "" });
    });
</script>
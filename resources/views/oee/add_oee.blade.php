<form id="myForm" method="post" action="/oee/store">
    {{ csrf_field() }}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data OEE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tanggal Input</label><br>
                        <input class="form-control" type="date" name="tanggal">
                    </div>
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">Nomor Mesin</label><br>
                            <select name="nomor_mesin" id="nomor_mesin" class="form-control select2">
                                <option value="" selected> --- Pilih Nomor Mesin ---</option>
                                @foreach ($mesin as $row)
                                <option value="{{$row->id_mesin}}">{{$row->id_mesin}}</option>
                                @endforeach
                            </select>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">Nama Produk</label><br>
                            <select name="nama_produk" id="nama_produk" class="form-control select2">
                                <option value="" selected> --- Nama Produk ---</option>
                                @foreach ($produk as $row)
                                <option value="{{$row->nama_produk}}">{{$row->nama_produk}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">Breakdown (Menit)</label><br>
                            <input class="form-control" type="number" id="breakdown" name="breakdown">
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">Setup (Menit)</label><br>
                            <input class="form-control" type="number" name="setup" id="setup">
                        </div>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">Loading Time (Menit)</label><br>
                            <input class="form-control" type="number" name="loading_time" id="loading_time">
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">Downtime (Menit)</label><br>
                            <input class="form-control" type="number" name="downtime" id="downtime"  readonly>
                        </div>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">Operating Time (Menit)</label><br>
                            <input class="form-control" type="number" name="operating_time" id="operating_time">
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">Processed Amount (Unit)</label><br>
                            <input class="form-control" type="number" name="processed_amount" id="processed_amount">
                        </div>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">Cycle Time (%)</label><br>
                            <input class="form-control" type="number" name="cycle_time" id="cycle_time">
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">Defect Amount (Unit)</label><br>
                            <input class="form-control" type="number" name="defect_amount" id="defect_amount">
                        </div>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">Availablity (%)</label><br>
                            <input class="form-control" type="number" name="availability" id="availability" readonly>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">Perfomance (%)</label><br>
                            <input class="form-control" type="number" name="perfomance" id="perfomance" readonly>
                        </div>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <div class="column" style="flex:50%">
                            <label for="">Quality (%)</label><br>
                            <input class="form-control" type="number" name="quality" id="quality" readonly>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="column" style="flex:50%">
                            <label for="">OEE (%)</label><br>
                            <input class="form-control" type="number" name="oee" id="oee" readonly>
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

    //DOWNTIME
    $("#setup").change(function() {
        var breakdown = $("#breakdown").val();
        var setup = $("#setup").val();
        var loading_time = $("#loading_time").val();
        var downtime = parseInt(breakdown)*parseInt(setup)/parseInt(loading_time);
        document.getElementById('downtime').value = downtime;
    });

    $("#breakdown").change(function() {
        var breakdown = $("#breakdown").val();
        var setup = $("#setup").val();
        var loading_time = $("#loading_time").val();
        var downtime = parseInt(breakdown)*parseInt(setup)/parseInt(loading_time);
        document.getElementById('downtime').value = downtime;
    });
    
    $("#loading_time").change(function() {
        var breakdown = $("#breakdown").val();
        var setup = $("#setup").val();
        var loading_time = $("#loading_time").val();
        var downtime = parseInt(breakdown)*parseInt(setup)/parseInt(loading_time);
        document.getElementById('downtime').value = downtime;
    });

    //AVAILABLITY
    $("#loading_time").change(function() {
        var loading_time = $("#loading_time").val();
        var downtime = $("#downtime").val();
        var availability = parseInt(loading_time)-parseInt(downtime)/parseInt(loading_time)*100;
        document.getElementById('availability').value = availability;
    });

    //PERFOMANCE
    $("#operating_time").change(function() {
        var operating_time = $("#operating_time").val();
        var processed_amount = $("#processed_amount").val();
        var cycle_time = $("#cycle_time").val();
        var perfomance = parseInt(processed_amount)-parseInt(cycle_time)/parseInt(operating_time)*100;
        document.getElementById('perfomance').value = perfomance;
    });

    $("#processed_amount").change(function() {
        var operating_time = $("#operating_time").val();
        var processed_amount = $("#processed_amount").val();
        var cycle_time = $("#cycle_time").val();
        var perfomance = parseInt(processed_amount)-parseInt(cycle_time)/parseInt(operating_time)*100;
        document.getElementById('perfomance').value = perfomance;
    });
    
    $("#cycle_time").change(function() {
        var operating_time = $("#operating_time").val();
        var processed_amount = $("#processed_amount").val();
        var cycle_time = $("#cycle_time").val();
        var perfomance = parseInt(processed_amount)-parseInt(cycle_time)/parseInt(operating_time)*100;
        document.getElementById('perfomance').value = perfomance;
    });

    //QUALITY
    $("#processed_amount").change(function() {
        var processed_amount = $("#processed_amount").val();
        var defect_amount = $("#defect_amount").val();
        var quality = parseInt(processed_amount)-parseInt(defect_amount)/parseInt(processed_amount)*100;
        document.getElementById('quality').value = quality;
    });

    $("#defect_amount").change(function() {
        var processed_amount = $("#processed_amount").val();
        var defect_amount = $("#defect_amount").val();
        var quality = parseInt(processed_amount)-parseInt(defect_amount)/parseInt(processed_amount)*100;
        document.getElementById('quality').value = quality;
    });

    //OEE
    $("#defect_amount").change(function() {
        var availability = $("#availability").val();
        var perfomance = $("#perfomance").val();
        var quality = $("#quality").val();
        var oee = parseInt(availability)*parseInt(perfomance)*parseInt(quality);
        document.getElementById('oee').value = oee;
    });

    $("#processed_amount").change(function() {
        var availability = $("#availability").val();
        var perfomance = $("#perfomance").val();
        var quality = $("#quality").val();
        var oee = parseInt(availability)*parseInt(perfomance)*parseInt(quality);
        document.getElementById('oee').value = oee;
    });

    $("#cycle_time").change(function() {
        var availability = $("#availability").val();
        var perfomance = $("#perfomance").val();
        var quality = $("#quality").val();
        var oee = parseInt(availability)*parseInt(perfomance)*parseInt(quality);
        document.getElementById('oee').value = oee;
    });

</script>


<script type="text/javascript">
    
function simpan_pendapatan(){
var pendapatan = $("#pendapatan").val();
var keterangan_pendapatan = $("#keterangan_pendapatan").val();

if (pendapatan != '' && keterangan_pendapatan != ''){
    
$.ajax({
type :"POST",
url  :"<?php echo base_url('C_admin/simpan_pendapatan'); ?>",
data :"pendapatan="+pendapatan+"&keterangan_pendapatan="+keterangan_pendapatan,

success:function(html){
swal({
title:"", 
text:"Pendapatan berhasil di simpan",
timer:1500,
type:"success",
showCancelButton :false,
showConfirmButton :false
});
}
});    
    
} else {
 
swal({
title:"", 
text:"Masih terdapat data yang belum di isi",
timer:1500,
type:"error",
showCancelButton :false,
showConfirmButton :false
});
 
 
}



}    
    

function input_pendapatan(){
var total_karyawan =$("#total_karyawan").html();
var pendapatan = $("#pendapatan").val();
var keuntungan = pendapatan*15/100;
$("#keuntungan").val(keuntungan.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g,"$1,"));

var keuntungan_karyawan  = keuntungan/total_karyawan;
$("#keuntungan_karyawan").val(keuntungan_karyawan.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g,"$1,"));


}

</script>

<span  style="display: none;" id="total_karyawan"><?php echo  $data_karyawan->num_rows();?></span>



<div class="col-md-12">
<div class="x_panel">
<div class="col-md-6">
<label>Masukan pendapatan </label>
<input required="" onkeyup="input_pendapatan()" placeholder="Pendapatan ..."  class="form-control" type="text" name="nama_karyawan" id="pendapatan" value="">
<label>Nilai keuntungan </label>
<input readonly="" required="" placeholder="Keuntungan ..." class="form-control" type="text" name="jabatan" id="keuntungan" value="">
<div class="clearfix"></div>
<label>Nilai keuntungan yang dibagi terhadap <?php echo  $data_karyawan->num_rows();?> karyawan </label>
<input readonly="" required="" placeholder="Keuntungan setiap karyawan..." class="form-control" type="text" name="keuntungan_karyawan" id="keuntungan_karyawan" value="">
<div class="clearfix"></div>

</div>
<div class="col-md-6">
<label>Keterangan pendapatan </label>
<textarea class="form-control" id="keterangan_pendapatan" placeholder="Keterangan pendapatan..."></textarea>
<div class="footer">
<br>
<button onclick="simpan_pendapatan()" type="button" class="pull-right btn btn-success"> <span class="fa fa-save"></span> Simpan pendapatan</button>
</div>
</div>
    <div class="clearfix"></div><hr>   

<script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.min.js"></script>
<div class="col-md-12">
<script type="text/javascript">
$(document).ready(function() {
$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
{
return {
"iStart": oSettings._iDisplayStart,
"iEnd": oSettings.fnDisplayEnd(),
"iLength": oSettings._iDisplayLength,
"iTotal": oSettings.fnRecordsTotal(),
"iFilteredTotal": oSettings.fnRecordsDisplay(),
"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
};
};

var t = $("#tabelhome").dataTable({
initComplete: function() {
var api = this.api();
$('#tabelhome')
.off('.DT')
.on('keyup.DT', function(e) {
if (e.keyCode == 13) {
api.search(this.value).draw();
}
});
},
oLanguage: {
sProcessing: "loading..."
},
processing: true,
serverSide: true,
ajax: {"url": "<?php echo base_url('C_admin/data_json_pendapatan') ?> ", "type": "POST"},
columns: [
{
"data": "id_pendapatan",
"orderable": false
},
{"data": "pendapatan"},
{"data": "keuntungan_bersih"},
{"data": "keuntungan"},
{"data": "keterangan"},
{"data": "view"}


],
order: [[1, 'asc']],
rowCallback: function(row, data, iDisplayIndex) {
var info = this.fnPagingInfo();
var page = info.iPage;
var length = info.iLength;
var index = page * length + (iDisplayIndex + 1);
$('td:eq(0)', row).html(index);
}
});
});
</script>    


<div class="dashboard_graph" width="100%">
<table id="tabelhome"  class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
<tr role="row">
<th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">N0</th>
<th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:50px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Pendapatan</th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Keuntungan perusahaan</th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Keuntungan 15 %</th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Keterangan</th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Aksi</th>
</thead>
<tbody align="center">
</table>

</div>   
</div>    


</div>
</div>

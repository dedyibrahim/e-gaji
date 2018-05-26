
<script type="text/javascript">
function simpan_karyawan(){
var nama_karyawan = $("#nama_karyawan").val();
var jabatan_karyawan = $("#jabatan_karyawan").val();
var email_karyawan = $("#email_karyawan").val();
var password_karyawan = $("#password_karyawan").val();
var password_karyawan2 = $("#password_karyawan2").val();

if(password_karyawan != password_karyawan2 ) {

swal({
title:"", 
text:"Password yang anda masukan tidak sama",
timer:1500,
type:"error",
showCancelButton :false,
showConfirmButton :false
});    
    
} else if (nama_karyawan != ''&& jabatan_karyawan !='' && email_karyawan !='' && password_karyawan !=''){
$.ajax({
type :"POST",
url  :"<?php echo base_url('C_admin/simpan_karyawan'); ?>",
data :"nama_karyawan="+nama_karyawan+"&jabatan_karyawan="+jabatan_karyawan+"&email="+email_karyawan+"&password="+password_karyawan,

success:function(html){
swal({
title:"", 
text:"Data  karyawan berhasil di simpan",
timer:1500,
type:"success",
showCancelButton :false,
showConfirmButton :false
});
$("#nama_karyawan").val('');
$("#jabatan_karyawan").val('');
$("#email_karyawan").val('');
$("#password_karyawan").val('');
$("#password_karyawan2").val('')
}
});
}else{

swal({
title:"", 
text:"Masih terdapat data kosong",
timer:1500,
type:"error",
showCancelButton :false,
showConfirmButton :false
});


}

}

</script>
<div class="col-md-12">
<div class="x_panel">
<div class="col-md-6">
<label>Nama karyawan </label>
<input required="" placeholder="Nama Karyawan ..." class="form-control" type="text" name="nama_karyawan" id="nama_karyawan" value="">
<label>Jabatan karyawan </label>
<input required="" placeholder="Jabatan karyawan ..." class="form-control" type="text" name="jabatan" id="jabatan_karyawan" value="">
<div class="clearfix"></div>

</div>
<div class="col-md-6">
<label>Email karyawan </label>
<input required="" placeholder="Email Karyawan ..." class="form-control" type="text" name="email_karyawan" id="email_karyawan" value="">
<label>Password karyawan </label>
<input required="" placeholder="Password karyawan ..." class="form-control" type="password" name="password_karyawan" id="password_karyawan" value="">
<label>Ulangi password karyawan</label>
<input required="" placeholder="Password karyawan ..." class="form-control" type="password" name="password_karyawan" id="password_karyawan2" value="">
<div class="footer">
<br>
<button onclick="simpan_karyawan()" type="button" class="pull-right btn btn-success"> <span class="fa fa-save"></span> Simpan karyawan</button>
</div>
</div>
<div class="clearfix"></div><hr>   
<script src="<?php echo base_url('assets'); ?>/js/jquery-2.1.1.min.js"></script>
<div class="col-md-12">
<h3 align="center">DAFTAR KARYAWAN</h3> 
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
ajax: {"url": "<?php echo base_url('C_admin/data_json_karyawan') ?> ", "type": "POST"},
columns: [
{
"data": "id_karyawan",
"orderable": false
},
{"data": "nama"},
{"data": "titel"},
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
<th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:50px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nama Karyawan</th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Jabatan</th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Aksi</th>
</thead>
<tbody align="center">
</table>

</div>   
</div>    


</div>
</div>

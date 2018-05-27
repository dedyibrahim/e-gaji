<script type="text/javascript">
function simpan_penarikan(){
var jumlah_penarikan  = $("#jumlah_penarikan").val();
var banding_penarikan = $("#banding_penarikan").val();
var  keterangan_penarikan = $("#keterangan_penarikan").val();
var cek = banding_penarikan -jumlah_penarikan;
if(  cek < 0 ) {
swal({
title:"", 
text:"Saldo anda tidak cukup untuk penarikan sebannyak itu ..",
type:"error",
timer: 3000,
showCancelButton :false,
showConfirmButton :false
});
$("#jumlah_penarikan").val('');
$("#keterangan_penarikan").val('');

} else if(jumlah_penarikan == '' && keterangan_penarikan =='' ){
    
swal({
title:"", 
text:"Masih terdapat data kosong..",
type:"warning",
timer: 3000,
showCancelButton :false,
showConfirmButton :false
});    

} else {
$.ajax({

type:"POST",
url:"<?php echo base_url('C_karyawan/simpan_penarikan') ?>",
data :"jumlah_penarikan="+jumlah_penarikan+"&keterangan_penarikan="+keterangan_penarikan,
success:function(html){
swal({
title:"", 
text:"Data penarikan disimpan ..",
type:"success",
timer: 3000,
showCancelButton :false,
showConfirmButton :false
});


}

});    

}    

}

</script>
<div class="x_panel">
<div class="x_title">
<h2>BUAT DATA PENARIKAN PENDAPATAN ANDA </h2>
<ul class="nav navbar-right panel_toolbox">
<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
</ul>
<?php 
$data = $this->session->all_userdata();
$id = $data['id_karyawan'];    

$karyawan = $this->db->get_where('karyawan',array('id_karyawan'=>$id))->row_array(); ?>
<div class="clearfix"></div>
</div>
<div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
<div class="col-md-6">
<label>Masukan jumlah penarikan :</label>
<input  type="text" class="form-control" value="" id="jumlah_penarikan">
<label>Keterangan penarikan :</label>
<input type="text" class="form-control" value="" id="keterangan_penarikan">
<input type="hidden" class="form-control" value="<?php echo  $karyawan['saldo'] ?>" id="banding_penarikan">
</div>
<div class="clearfix"></div>   
<hr>
<div class="footer">
<button onclick="simpan_penarikan();" class="btn pull-right btn-success btn btn-md"><span class="fa fa-save"></span> SIMPAN PENARIKAN</button>
</div>


</div>
</div>
<!-----------data penarikan--------------->
<div class="x_panel">
<div class="x_title">
<h2>DATA PENARIKAN ANDA </h2>
<ul class="nav navbar-right panel_toolbox">
<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
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
ajax: {"url": "<?php echo base_url('C_karyawan/data_json_penarikan/')?> ", "type": "POST"},
columns: [
{
"data": "id_penarikan",
"orderable": false
},
{"data": "jumlah_penarikan"},
{"data": "keterangan_penarikan"},
{"data": "status_penarikan"},
{"data": "waktu_penarikan"},
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
<table width='100%' id="tabelhome"  class="table table-striped table-bordered dataTable"  role="grid" aria-describedby="datatable-fixed-header_info"><thead>
<tr role="row">
<th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:1px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">N0</th>
<th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:50px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Jumlah penarikan</th>
<th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:50px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Keterangan</th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Status</th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Waktu penarikan</th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Aksi</th>
</thead>
<tbody align="center">
</table>
</div></div>   
    </div>
</div>
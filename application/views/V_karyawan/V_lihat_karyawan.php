<?php $kar =  $data_karyawan->row_array(); ?>
<div class="col-md-12 col-sm-6 col-xs-12">
<div class="x_panel">
<div class="x_title">
    Saldo yang dimiliki <?php echo $kar['nama_karyawan']; ?> adalah <strong>Rp.<?php echo number_format($kar['saldo']); ?></strong>

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
ajax: {"url": "<?php echo base_url('C_karyawan/data_json_lihat_karyawan/')?> ", "type": "POST"},
columns: [
{
"data": "id_data_pendapatan",
"orderable": false
},
{"data": "pendapatan"},
{"data": "keuntungan_bersih"},
{"data": "keuntungan"},
{"data": "keuntungan_karyawan"},
{"data": "ket_pendapatan"}


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
<th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:50px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Pendapatan</th>
<th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:50px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Pendapatan perusahaan</th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Pendapatan karyawan</th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Pendapatan <?php echo $kar['nama_karyawan']; ?></th>
<th  align="center" class="sorting"        aria-controls="datatable-fixed-header" rowspan="1"  colspan="1" style="width: 1px;" aria-label="Position: activate to sort column ascending">Keterangan</th>
</thead>
<tbody align="center">
</table>
</div>   
</div> 


</div>
</div>
</div>
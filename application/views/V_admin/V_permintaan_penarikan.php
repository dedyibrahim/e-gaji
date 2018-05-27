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
ajax: {"url": "<?php echo base_url('C_admin/data_json_permintaan_penarikan/')?> ", "type": "POST"},
columns: [
{
"data": "id_penarikan",
"orderable": false
},
{"data": "nama_karyawan"},
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
<th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:50px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nama penarik</th>
<th  align="center" class="sorting_asc"    aria-controls="datatable-fixed-header" rowspan="1" colspan="1" style="width:50px;" aria-label="Name: activate to sort column descending" aria-sort="ascending">Jumlah</th>
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
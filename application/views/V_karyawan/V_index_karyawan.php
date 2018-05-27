<div class="x_panel">
<div class="x_title">
<h2>DATA PENDAPATAN PERUSAHAAN</h2>
<ul class="nav navbar-right panel_toolbox">
<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">

<?php 
$this->db->select('pendapatan');
$this->db->select('keterangan_pendapatan');
$this->db->select('keuntungan_bersih');
$this->db->select('keuntungan');

$chart = $this->db->get('data_pendapatan_perusahaan');

?>



<style>
canvas{
-moz-user-select: none;
-webkit-user-select: none;
-ms-user-select: none;

}

</style>
<canvas id="myChart" width="300" height="100"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var options = {
animation: true,
scaleLabel:
function(label){return  ' $' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");}

};
var myChart = new Chart(ctx,{
type: 'bar',
data: {
labels: [<?php 
foreach ($chart->result_array() as $tampil_chart){
echo json_encode($tampil_chart['keterangan_pendapatan']),',';
}
?>],
datasets: [{
label: 'Pendapatan 15 %',
backgroundColor:"rgba(38, 185, 154, 0.31)",
borderColor:"rgba(38, 185, 154, 0.7)",
pointBorderColor:"rgba(38, 185, 154, 0.7)",
pointBackgroundColor:"rgba(38, 185, 154, 0.7)",
pointHoverBackgroundColor:"#fff",
pointHoverBorderColor:"rgba(220,220,220,1)",
pointBorderWidth:1,
data: [<?php 
foreach ($chart->result_array() as $tampil_chart){
echo json_encode($tampil_chart['keuntungan']),',';
}
?>

],
},{
label: 'Pendapatan bersih',
backgroundColor:"#26B99A",
borderColor:"rgba(3, 88, 106, 0.70)",
pointBorderColor:"rgba(3, 88, 106, 0.70)",
pointBackgroundColor:"rgba(3, 88, 106, 0.70)",
pointHoverBackgroundColor:"#fff",
pointHoverBorderColor:"rgba(151,187,205,1)",
pointBorderWidth:1,
data: [<?php 
foreach ($chart->result_array() as $tampil_chart){
echo json_encode($tampil_chart['keuntungan_bersih']),',';
}
?>

]

}, {
label: 'Pendapatan penjualan',
backgroundColor:"#03586A",
borderColor:"rgba(3, 88, 106, 0.70)",
pointBorderColor:"rgba(3, 88, 106, 0.70)",
pointBackgroundColor:"rgba(3, 88, 106, 0.70)",
pointHoverBackgroundColor:"#fff",
pointHoverBorderColor:"rgba(151,187,205,1)",
pointBorderWidth:1,
data: [<?php 
foreach ($chart->result_array() as $tampil_chart){
echo json_encode($tampil_chart['pendapatan']),',';
}
?>

],
}
]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero:true
}
}]
}
}
}),options;

</script>
</div>
</div>
<!--------------------------------->
<?php $data_kar = $this->session->all_userdata(); 
$this->db->select('data_pendapatan_perusahaan.keterangan_pendapatan');
$this->db->select('data_pendapatan_perusahaan.keuntungan');
$this->db->select('data_pendapatan.keuntungan_karyawan');
$this->db->from('data_pendapatan');
$this->db->join('data_pendapatan_perusahaan', 'data_pendapatan_perusahaan.id_pendapatan = data_pendapatan.id_pendapatan');
$this->db->where('id_karyawan',$data_kar['id_karyawan']);
$query = $this->db->get();

//echo print_r($query);

?>

<div class="x_panel">
<div class="x_title">
<h2>DATA PENDAPATAN ANDA </h2>
<ul class="nav navbar-right panel_toolbox">
<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">
<style>
canvas{
-moz-user-select: none;
-webkit-user-select: none;
-ms-user-select: none;

}

</style>
<canvas id="anda" width="300" height="100"></canvas>
<script>
var ctx = document.getElementById("anda").getContext('2d');
var options = {
animation: true,
scaleLabel:
function(label){return  ' $' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");}

};
var myChart = new Chart(ctx,{
type: 'bar',
data: {
labels: [<?php 
foreach ($query->result_array() as $tampil_chart){
echo json_encode($tampil_chart['keterangan_pendapatan']),',';
}
?>],
datasets: [{
label: 'Pendapatan 15 %',
backgroundColor:"#26B99A",
borderColor:"rgba(3, 88, 106, 0.70)",
pointBorderColor:"rgba(3, 88, 106, 0.70)",
pointBackgroundColor:"rgba(3, 88, 106, 0.70)",
pointHoverBackgroundColor:"#fff",
pointHoverBorderColor:"rgba(151,187,205,1)",
pointBorderWidth:1,
data: [<?php 
foreach ($query->result_array() as $tampil_chart){
echo json_encode($tampil_chart['keuntungan']),',';
}
?>

]

}, {
label: 'Pendapatan anda',
backgroundColor:"#03586A",
borderColor:"rgba(3, 88, 106, 0.70)",
pointBorderColor:"rgba(3, 88, 106, 0.70)",
pointBackgroundColor:"rgba(3, 88, 106, 0.70)",
pointHoverBackgroundColor:"#fff",
pointHoverBorderColor:"rgba(151,187,205,1)",
pointBorderWidth:1,
data: [<?php 
foreach ($query->result_array() as $tampil_chart){
echo json_encode($tampil_chart['keuntungan_karyawan']),',';
}
?>

],
}
]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero:true
}
}]
}
}
}),options;

</script>

</div>
</div>

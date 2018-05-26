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
type: 'line',
data: {
labels: [<?php 
foreach ($chart->result_array() as $tampil_chart){
echo json_encode($tampil_chart['keterangan_pendapatan']),',';
}
?>],
datasets: [{
label: 'Pendapatan 15 %',
//backgroundColor:"rgba(38, 185, 154, 0.31)",
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
//backgroundColor:"rgba(3, 88, 106, 0.3)",
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
//backgroundColor:"rgba(3, 88, 106, 0.3)",
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
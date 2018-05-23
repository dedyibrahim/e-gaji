<?php 
$this->db->select('pendapatan');
$this->db->select('keterangan_pendapatan');

$chart = $this->db->get('data_pendapatan_perusahaan');

?>
<style>
	canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
<canvas id="myChart" width="400" height="150"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
 var options = {
        animation: false,
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
            label: '#PENDAPATAN PENJUALAN',
            data: [<?php 
foreach ($chart->result_array() as $tampil_chart){
        echo json_encode($tampil_chart['pendapatan']),',';
}
?>],
            backgroundColor: window.chartColors.blue,
            
            borderColor: [
            ],
            borderWidth: 2
        }]
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
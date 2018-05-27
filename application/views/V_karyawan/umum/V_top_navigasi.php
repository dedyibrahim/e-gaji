<div class="top_nav">
<div class="nav_menu">
<nav>
<div class="nav toggle">
<a id="menu_toggle"><i class="fa fa-bars"></i></a>
</div>

<ul class="nav navbar-nav navbar-right">
<li class="">
<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<img src="<?php echo base_url('/uploads/karyawan_thumb/');?><?php  $valid =  $this->session->all_userdata();
echo  $valid['gambar']; ?> " alt=""><?php echo  $valid['nama']; ?>
<span class=" fa fa-angle-down"></span>
</a>
<ul class="dropdown-menu dropdown-usermenu pull-right">
<li><a href="<?php echo base_url('C_karyawan/pengaturan_akun');?>"><i class="fa fa-gears pull-right"></i>Pengaturan akun</a></li>
<li><a href="<?php echo base_url('C_masuk/keluar');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
</ul>
</li>


</ul>
</nav>
</div>
</div>
<!-- /top navigation -->
<div class="right_col" role="main" >
<?php 
$data = $this->session->all_userdata();
$id = $data['id_karyawan'];    
$karyawan = $this->db->get_where('karyawan',array('id_karyawan'=>$id))->row_array();

$saldo_perusahaan = $this->db->get('user')->row_array();
?>

<div class="row top_tiles" style="margin:10px 0;">
<div class="col-md-4 tile-stats" >
<span>Saldo perusahaan</span>
<h2>Rp.<?php echo number_format($saldo_perusahaan['saldo_perusahaan']); ?></h2>
<span class="sparkline_two" style="height: 160px;"><canvas width="196" height="40" style="display: inline-block; width: 196px; height: 40px; vertical-align: top;"></canvas></span>
</div>
<div class="col-md-4 tile" >
<p align="center">

<span>Saldo anda saat ini</span>
<h2>Rp.<?php echo number_format($karyawan['saldo']); ?></h2>
<span class="sparkline_two" style="height: 160px; margin: 0px;"><canvas width="196" height="40" style="display: inline-block; width: 196px; height: 40px; vertical-align: top;"></canvas></span>

</p>
</div>
<div class="col-md-4 tile-stats pull-right">
<span>Total penarikan saldo anda</span>
<h2>Rp.<?php 
$id = $this->session->all_userdata();
$data = $this->db->get_where('data_penarikan',array('id_karyawan'=>$id['id_karyawan'],'status_penarikan'=>'Terkonfirmasi'));
$jumlah = 0;
foreach ($data->result_array() as $jumlah_penarikan){
 $jumlah +=$jumlah_penarikan['jumlah_penarikan'];    
}
echo number_format($jumlah)
?></h2>
<span class="sparkline_three" style="height: 160px;"><canvas width="200" height="40" style="display: inline-block; width: 200px; height: 40px; vertical-align: top;"></canvas></span>
</div>

</div>

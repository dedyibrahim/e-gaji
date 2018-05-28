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
<?php 
$data = $this->session->all_userdata();
$id = $data['id_karyawan'];    
$karyawan = $this->db->get_where('karyawan',array('id_karyawan'=>$id))->row_array();

$saldo_perusahaan = $this->db->get('user')->row_array();
?>
<!-- /top navigation -->
<div class="right_col" role="main" >
<!-- top tiles -->
<div  class="row top_tiles" >
<a href="<?php echo base_url('C_karyawan');?>">   
<div  class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
<div class="tile-stats">
<div class="icon"><i class="fa fa-building-o"></i></div>
<div class="count">&nbsp;</div>
<h3>Rp.<?php echo number_format($saldo_perusahaan['saldo_perusahaan']); ?></h3>
<p>Total Saldo perusahaan</p>
</div>
</div></a>



<a href="<?php echo base_url('C_karyawan');?>">   
<div class="animated flipInY col-lg-4 col-md-7 col-sm-6 col-xs-12">
<div class="tile-stats">
<div class="icon"><i class="fa fa-money"></i></div>
<div class="count">&nbsp;</div>
<h3>Rp.<?php echo number_format($karyawan['saldo']); ?></h3>
<p>Saldo yang anda miliki</p>
</div>
</div></a>

<a href="<?php echo base_url('C_karyawan');?>">   
<div class="animated flipInY col-lg-4 col-md-3 col-sm-6 col-xs-12">
<div class="tile-stats">
<div class="icon"><i class="fa fa-exchange"></i></div>
<div class="count">&nbsp;</div>

<h3>Rp.<?php 
$id = $this->session->all_userdata();
$data = $this->db->get_where('data_penarikan',array('id_karyawan'=>$id['id_karyawan'],'status_penarikan'=>'Terkonfirmasi'));
$jumlah = 0;
foreach ($data->result_array() as $jumlah_penarikan){
 $jumlah +=$jumlah_penarikan['jumlah_penarikan'];    
}
echo number_format($jumlah)
?></h3>
<p>Total saldo yang telah ditarik</p>
</div>
</div></a>
</div>





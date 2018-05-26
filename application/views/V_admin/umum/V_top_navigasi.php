<div class="top_nav">
<div class="nav_menu">
<nav>
<div class="nav toggle">
<a id="menu_toggle"><i class="fa fa-bars"></i></a>
</div>

<ul class="nav navbar-nav navbar-right">
<li class="">
<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<img src="<?php echo base_url('/uploads/user_thumb/');?><?php  $valid =  $this->session->all_userdata();
echo  $valid['gambar']; ?> " alt=""><?php echo  $valid['nama']; ?>
<span class=" fa fa-angle-down"></span>
</a>
<ul class="dropdown-menu dropdown-usermenu pull-right">
<li><a href="<?php echo base_url('C_admin/pengaturan_admin');?>"><i class="fa fa-gear pull-right"></i>Pengaturan admin</a></li>
<li><a href="<?php echo base_url('C_login/keluar');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
</ul>
</li>


</ul>
</nav>
</div>
</div>
<!-- /top navigation -->
<div class="right_col" role="main" >
<!-- top tiles -->
<div  class="row top_tiles" >
<a href="<?php echo base_url('C_admin/input_karyawan');?>">   
<div  class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="tile-stats">
<div class="icon"><i class="fa fa-user"></i></div>
<div class="count"><?php echo $this->db->get('karyawan')->num_rows(); ?></div>
<h3>Total karyawan</h3>
<p>Total karyawan saat ini</p>
</div>
</div></a>

<a href="#">   
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="tile-stats">
<div class="icon"></div>
<div class="count"><?php $id_user =$this->session->all_userdata();
 $id_user['id_user'];
 $this->db->select('saldo_perusahaan');
 $data2 = $this->db->get('user')->row_array();
 echo "Rp. ".number_format($data2['saldo_perusahaan']);?></div>
<h3>Saldo perusahaan</h3>
<p>Saldo bersih perusahaan</p>
</div>
</div></a>

<a href="#">   
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="tile-stats">
<div class="icon"></div>
<div class="count"><?php 

$this->db->select('saldo');
$saldo_karyawan = $this->db->get('karyawan');
$data_saldo = 0;
foreach ($saldo_karyawan->result_array() as $saldo){
    
     $data_saldo += $saldo['saldo'];
}
echo "Rp.".number_format($data_saldo);

?></div>
<h3>Saldo Karyawan</h3>
<p>Saldo seluruh karyawan</p>
</div>
</div></a>

<a href="<?php echo base_url('C_admin/pengeluaran_perusahaan');?>">   
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="tile-stats">
<div class="icon"><i class="fa fa-minus-square"></i></div>
<div class="count">0</div>

<h3>Data pengeluaran</h3>
<p>Data pengeluaran perusahaa</p>
</div>
</div></a>
</div>

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

<a href="<?php echo base_url('C_toko/konfirmasi_penjualan');?>">   
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="tile-stats">
<div class="icon"><i class="fa fa-money"></i></div>
<div class="count">0</div>
<h3>Pendapatan</h3>
<p>Pendapatan saat ini</p>
</div>
</div></a>

<a href="<?php echo base_url('C_toko/penjualan_selesai');?>">   
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="tile-stats">
<div class="icon"><i class="fa fa-money"></i></div>
<div class="count">0</div>
<h3>Keuntungan</h3>
<p>Keuntungan saat ini</p>
</div>
</div></a>

<a href="<?php echo base_url('C_toko/penjualan_ditolak');?>">   
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="tile-stats">
<div class="icon"><i class="fa fa-minus-square-o"></i></div>
<div class="count">0</div>

<h3>Pengeluaran</h3>
<p>Pengeluaran saat ini</p>
</div>
</div></a>
</div>

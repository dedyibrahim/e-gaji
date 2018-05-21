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
<li><a href="<?php echo base_url('C_masuk/keluar');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
</ul>
</li>


</ul>
</nav>
</div>
</div>
<!-- /top navigation -->
<div class="right_col" role="main" >
<!-- top tiles -->


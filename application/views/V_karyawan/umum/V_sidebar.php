<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<div class="menu_section">
<h3>General</h3>
<ul class="nav side-menu">
<li><a><i class="fa fa-money"></i>DATA KEUANGAN<span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="<?php echo  base_url('C_karyawan'); ?>">DATA TRANSAKSI</a></li>
<li><a href="<?php echo base_url('C_karyawan/data_penarikan'); ?>">DATA PENARIkAN</a></li>
</ul>
</li>

<li><a><i class="fa fa-money"></i>SYSTEM KASBON<span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="<?php echo base_url('C_karyawan/buat_kasbon'); ?>">BUAT KASBON</a></li>
</ul>
</li>


</ul>
</div>
</div>
<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
<a data-toggle="tooltip" data-placement="top" onclick="" title="Menu Utama" href="<?php echo base_url('C_menu'); ?>">
<span class="glyphicon glyphicon-backward" aria-hidden="true"></span>
</a>
<a data-toggle="tooltip" data-placement="top" title="FullScreen">
<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
</a>
<a data-toggle="tooltip" data-placement="top" title="Lock">
<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
</a>
<a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('C_masuk/keluar'); ?>">
<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
</a>
</div>
<!-- /menu footer buttons -->
</div>
</div>


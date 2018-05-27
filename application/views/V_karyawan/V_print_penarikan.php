<body onload="window.print();" ></body>
<?php $data = $penarikan->row_array(); ?>

<div style=" float:none; border:1px #ccc solid; display:block ">
<H2 align="center">BUKTI PERMINTAAN PENARIKAN DANA</H2>

<div style=" width:50%; padding:10px;  border:1px #ccc solid;margin:10px; ">
<table border="0px" style="font-size:12px;">
<tr><th>Nomor penarikan</th><td>: e-gaji/trx_dn/0000<?php echo $this->uri->segment(3); ?></td></tr>
<tr><th>Nama penarik</th><td>: <?php echo $data['nama_karyawan'] ?></td></tr>
<tr><th>Status penarikan</th><td>: <?php echo $data['status_penarikan'] ?></td></tr>
<tr><th>Keterangan penarikan</th><td>: <?php echo $data['keterangan_penarikan'] ?></td></tr>

</table>
</div>

<div style=" width:40%; border:1px #ccc solid;margin:10px; ">
<table border="0px" style="font-size:20px; ">
<tr><th>Jumlah penarikan</th></tr>
<tr><td> Rp.<?php echo number_format($data['jumlah_penarikan']); ?></td></tr>

</table>
</div>

</div><br>
<div style="border:1px #000 dashed; "></div>



<script type="text/javascript">
function simpan_karyawan(){
var nama_karyawan      = $("#nama_karyawan").val();
var jabatan_karyawan   = $("#jabatan_karyawan").val();
var email_karyawan     = $("#email_karyawan").val();
var status             = $("#status").val();
var password_karyawan  = $("#password_karyawan").val();
var password_karyawan2 = $("#password_karyawan2").val();
var id_karyawan = "<?php echo $this->uri->segment(3);  ?>";

if(password_karyawan != password_karyawan2 ) {

swal({
title:"", 
text:"Password yang anda masukan tidak sama",
timer:1500,
type:"error",
showCancelButton :false,
showConfirmButton :false
});    
    
} else if (nama_karyawan != ''&& jabatan_karyawan !='' && email_karyawan !='' && password_karyawan !=''){
$.ajax({
type :"POST",
url  :"<?php echo base_url('C_admin/update_karyawan'); ?>",
data :"status="+status+"&id_karyawan="+id_karyawan+"&nama_karyawan="+nama_karyawan+"&jabatan_karyawan="+jabatan_karyawan+"&email="+email_karyawan+"&password="+password_karyawan,


success:function(html){
swal({
title:"", 
text:"Data  karyawan berhasil di update",
timer:1500,
type:"success",
showCancelButton :false,
showConfirmButton :false
});

$("#nama_karyawan").val('');
$("#jabatan_karyawan").val('');
$("#email_karyawan").val('');
$("#password_karyawan").val('');
$("#password_karyawan2").val('');


}
});
}else{

swal({
title:"", 
text:"Masih terdapat data kosong",
timer:1500,
type:"error",
showCancelButton :false,
showConfirmButton :false
});


}

}
<?php $data = $data_karyawan->row_array();?>

</script>
<div class="col-md-12">
<div class="x_panel">
<div class="col-md-6">
<label>Nama karyawan </label>
<input required="" placeholder="Nama Karyawan ..."  value="<?php echo $data['nama_karyawan']; ?>" class="form-control" type="text" name="nama_karyawan" id="nama_karyawan" value="">
<label>Jabatan karyawan </label>
<input required="" placeholder="Jabatan karyawan ..."value="<?php echo $data['jabatan']; ?>" class="form-control" type="text" name="jabatan" id="jabatan_karyawan" value="">
<label>Status karyawan</label>
<select class="form-control" id="status">
    <option value="Aktif"><?php echo $data['status']; ?></option>    
    <option value="Aktif">Aktif</option>    
    <option value="Tidak">Tidak</option>    
    
</select>
<div class="clearfix"></div>

</div>
<div class="col-md-6">
<label>Nama karyawan </label>
<input required="" placeholder="Email Karyawan ..." value="<?php echo $data['email']; ?>" class="form-control" type="text" name="email_karyawan" id="email_karyawan" value="">
<label>Password karyawan </label>
<input required="" placeholder="Password karyawan ..." class="form-control" type="password" name="password_karyawan" id="password_karyawan" value="">
<label>Ulangi password karyawan</label>
<input required="" placeholder="Password karyawan ..." class="form-control" type="password" name="password_karyawan" id="password_karyawan2" value="">
<div class="footer">
<br>
<button onclick="simpan_karyawan()" type="button" class="pull-right btn btn-success"> <span class="fa fa-save"></span> Simpan karyawan</button>
</div>
</div>
    


</div>
</div>

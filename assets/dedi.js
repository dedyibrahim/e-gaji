function simpan_karyawan(){
var nama_karyawan = $("#nama_karyawan").val();
var jabatan_karyawan = $("#jabatan_karyawan").val();

if (nama_karyawan != ''&& jabatan_karyawan !=''){
$.ajax({
type :"POST",
url  :"<?php echo base_url('C_admin/simpan_karyawan'); ?>",
data :"nama_karyawan="+nama_karyawan+"&jabatan_karyawan="+jabatan_karyawan,

success:function(html){
swal({
title:"", 
text:"Data  karyawan berhasil di simpan",
timer:1500,
type:"success",
showCancelButton :false,
showConfirmButton :false
});
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
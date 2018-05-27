
<div class="x_panel">
<div class="x_title">
<h2>PENGATURAN AKUN</h2>
<ul class="nav navbar-right panel_toolbox">
<li class="pull-right "><a class="close-link"><i class="fa fa-close"></i></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="x_content">

<?php foreach ($data_karyawan->result_array() as $data_user){}?>

<div class="col-md-6">
<label>Nama admin</label>    
<input type="text" id="nama_admin" class="form-control" value="<?php echo $data_user['nama_karyawan'];?>">
<label>Email admin</label>  
<input type="text" id="email_admin" class="form-control" value="<?php echo $data_user['email'];?>">
<label>Status admin</label>  
<input type="text" readonly="" class="form-control" value="<?php echo $data_user['status'];?>">
<label>Level admin</label>  
<input type="text" readonly="" class="form-control" value="<?php echo $data_user['level'];?>">
<input type="hidden" id="password_banding" readonly="" class="form-control" value="<?php echo $data_user['password'];?>">
</div>
<div class="col-md-6">
<div class="profile_pic">
<label>FOTO PROFILE</label> 
<img src="<?php echo base_url();?>uploads/karyawan_thumb/<?php echo $data_user['gambar'];?>" alt="" class="img-thumbnail profile_img">
<br><br>
<button class="btn btn-warning " data-toggle="modal" data-target=".bs-example-modal-sm"><span class="fa fa-save"></span> UPDATE FOTO</button>
</div>
</div>    
<div class="col-md-12">
<div class="clearfix"></div>
<hr>    
<button  class="btn btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal-s" ><span class="fa fa-save"></span> SIMPAN PERUBAHAN</button>

</div>
</div>
    
</div>
<script type="text/javascript">
function simpan_admin(){
var nama_admin       = $("#nama_admin").val();
var password_banding = $("#password_banding").val();
var password_cek     = $("#password_cek").val();
var email_admin      = $("#email_admin").val();


if(md5(password_cek) != password_banding ){

swal({
title:"MALING !!", 
text:"Ada maling mau ngerubah data ni kayanya...",
type:"error",
timer: 3000,
showCancelButton :false,
showConfirmButton :false
});

} else {
    

 


$.ajax({
type:"POST",
url :"<?php  echo base_url('C_karyawan/ubah_karyawan') ?>",
data:"nama_admin="+nama_admin+"&email_admin="+email_admin,

success:function(html){

swal({
title:"", 
text:"Perubahan data berhasil disimpan silahkan reload halaman anda",
timer:3000,
type:"success",
showCancelButton :false,
showConfirmButton :false
});
} 


});

} 
}
</script>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">UPDATE FOTO ADMIN</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?php echo base_url('C_karyawan/update_foto') ?>" enctype="multipart/form-data" >
          
                          <h4>Upload :</h4>
                          <input type="file" class="form-control" name="update_foto" >
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">KELUAR</button>
                          <button type="submit"  class="btn btn-primary">UPDATE FOTO</button>
                        </form>
                        </div>

                      </div>
                    </div>
                  </div>

 <div class="modal fade bs-example-modal-s" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">VERIFIKASI AKUN</h4>
                        </div>
                        <div class="modal-body">
                            <label> Masukan password anda :</label>
                            <input type="password" class="form-control" id="password_cek" placeholder="password anda..">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">KELUAR</button>
                          <button type="button" onclick="simpan_admin()"  class="btn btn-primary">SIMPAN</button>
                        </div>

                      </div>
                    </div>
                  </div>
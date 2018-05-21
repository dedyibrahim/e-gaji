<?php
class Data_admin extends CI_Model {

public function __construct() {
parent::__construct();
}

function data_karyawan() {
$this->datatables->select('id_karyawan,'
. 'karyawan.nama_karyawan as nama,'
. 'karyawan.jabatan as titel,');
$this->datatables->from('karyawan');
$this->datatables->add_column('view','<a class="btn btn-sm  fa fa-trash btn-danger btn" href="'.base_url().'C_admin/hapus_karyawan/$1"></a> || <a class="btn btn-sm  fa fa-pencil btn-warning btn" href="'.base_url().'C_admin/edit_karyawan/$1"></a> || <a class="btn btn-sm  fa fa-eye btn-success btn" href="'.base_url().'C_admin/lihat_karyawan/$1"></a>  ', 'id_karyawan');
return $this->datatables->generate();

}

function data_pendapatan() {
$this->datatables->select('id_pendapatan,'
. 'data_pendapatan_perusahaan.pendapatan as pendapatan,'
. 'data_pendapatan_perusahaan.keuntungan as keuntungan,'
. 'data_pendapatan_perusahaan.keuntungan_bersih as keuntungan_bersih,'
. 'data_pendapatan_perusahaan.keterangan_pendapatan as keterangan,'
        );
$this->datatables->from('data_pendapatan_perusahaan');
$this->datatables->add_column('view','<a class="btn btn-sm  fa fa-pencil btn-warning btn" href="'.base_url().'C_admin/edit_karyawan/$1"></a> ', 'id_pendapatan');
return $this->datatables->generate();

}
function data_json_lihat_karyawan($id_karyawan) {
$this->datatables->select('id_data_pendapatan,'
 .'data_pendapatan.keuntungan as keuntungan,'
 .'data_pendapatan.keuntungan_karyawan as keuntungan_karyawan,'
 .'data_pendapatan_perusahaan.pendapatan as pendapatan,'
 .'data_pendapatan_perusahaan.keuntungan_bersih as keuntungan_bersih,'
 .'data_pendapatan_perusahaan.keterangan_pendapatan as ket_pendapatan,'
        );
$this->datatables->from('data_pendapatan');
$this->datatables->join('data_pendapatan_perusahaan','data_pendapatan_perusahaan.id_pendapatan = data_pendapatan.id_pendapatan');
$this->datatables->where('id_karyawan',$id_karyawan);
$this->datatables->add_column('view','<a class="btn btn-sm  fa fa-pencil btn-warning btn" href="'.base_url().'C_admin/edit_karyawan/$1"></a> ', 'id_data_pendapatan');
return $this->datatables->generate();

}


}
?>
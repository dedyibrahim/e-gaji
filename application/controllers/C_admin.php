<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_admin extends CI_Controller {
public function __construct() {
parent::__construct();

$this->load->helper('form');
$this->load->model('M_login');
$this->load->library('session');
$this->load->library('upload');
$this->load->library('form_validation');
$this->load->library('datatables');
$this->load->database();
$this->load->helper('url');
}

public function index(){
$this->load->view('V_admin/umum/V_header');
$this->load->view('V_admin/umum/V_sidebar');
$this->load->view('V_admin/umum/V_top_navigasi');
$this->load->view('V_admin/umum/V_footer');

}
public function input_karyawan(){
$this->load->view('V_admin/umum/V_header');
$this->load->view('V_admin/umum/V_sidebar');
$this->load->view('V_admin/umum/V_top_navigasi');
$this->load->view('V_admin/V_input_karyawan');
$this->load->view('V_admin/umum/V_footer');
}

public function simpan_karyawan(){
if(isset($_POST['jabatan_karyawan'])){
$data = array(
'nama_karyawan'    => $this->input->post('nama_karyawan'),
'jabatan'          => $this->input->post('jabatan_karyawan'),
'email'            => $this->input->post('email'),
'password'         => md5($this->input->post('password')),
);
$this->db->insert('karyawan',$data);
}
}
public function update_karyawan(){
if(isset($_POST['jabatan_karyawan'])){

$id = $this->input->post('id_karyawan');
$data = array(
'nama_karyawan'    => $this->input->post('nama_karyawan'),
'jabatan'          => $this->input->post('jabatan_karyawan'),
'email'            => $this->input->post('email'),
'password'         => md5($this->input->post('password')),
);
$this->db->update('karyawan',$data,array('id_karyawan'=>$id));
}
}

public function input_pendapatan(){
$edit = $this->db->get('karyawan');

$this->load->view('V_admin/umum/V_header');
$this->load->view('V_admin/umum/V_sidebar');
$this->load->view('V_admin/umum/V_top_navigasi');
$this->load->view('V_admin/V_input_pendapatan',['data_karyawan'=>$edit]);
$this->load->view('V_admin/umum/V_footer');
}
public function edit_karyawan(){
$id = $this->uri->segment(3);   
$edit = $this->db->get_where('karyawan',array('id_karyawan'=>$id));

$this->load->view('V_admin/umum/V_header');
$this->load->view('V_admin/umum/V_sidebar');
$this->load->view('V_admin/umum/V_top_navigasi');
$this->load->view('V_admin/V_edit_karyawan',['data_karyawan'=>$edit]);
$this->load->view('V_admin/umum/V_footer');
}


public function data_json_karyawan(){
$this->load->model('Data_admin');
header('Content-Type: application/json');
echo $this->Data_admin->data_karyawan();       
}

public function data_json_pendapatan(){
$this->load->model('Data_admin');
header('Content-Type: application/json');
echo $this->Data_admin->data_pendapatan();       
}

public function data_json_lihat_karyawan($id_karyawan){
    
$this->load->model('Data_admin');
header('Content-Type: application/json');
echo $this->Data_admin->data_json_lihat_karyawan($id_karyawan);       

}

public function hapus_karyawan(){
$id = $this->uri->segment(3);
$this->db->delete('karyawan',array('id_karyawan'=>$id));  
$this->input_karyawan();    
}

public function lihat_karyawan(){
$id = $this->uri->segment(3);
$karyawan = $this->db->get_where('karyawan',array('id_karyawan'=>$id));

$this->load->view('V_admin/umum/V_header');
$this->load->view('V_admin/umum/V_sidebar');
$this->load->view('V_admin/umum/V_top_navigasi');
$this->load->view('V_admin/V_lihat_karyawan',['data_karyawan'=>$karyawan]);
$this->load->view('V_admin/umum/V_footer');
}

public function simpan_pendapatan(){
if($this->input->post('pendapatan')){
$karyawan        = $this->db->get('karyawan');
$jumlah_karyawan = $this->db->get('karyawan')->num_rows();
$id_pendapatan   = $this->db->get('id_pendapatan')->num_rows();

$keuntungan          = $this->input->post('pendapatan')*15/100;
$keuntungan_karyawan = $keuntungan / $jumlah_karyawan; 
$pendapatan_bersih   = $this->input->post('pendapatan') - $keuntungan;
        
foreach ($karyawan->result_array() as $id){
    
  $data_pendapatan = array(
 'id_karyawan'           => $id['id_karyawan'],
 'id_pendapatan'         => $id_pendapatan,
 'keuntungan'            => $keuntungan,
 'keuntungan_karyawan'   => $keuntungan_karyawan,
  );
  $this->db->insert('data_pendapatan',$data_pendapatan);
  }
  
  $data_pendapatan_perusahaan = array(
 'id_pendapatan'         => $id_pendapatan,
 'keterangan_pendapatan' => $this->input->post('keterangan_pendapatan'),
 'pendapatan'            => $this->input->post('pendapatan'),
 'keuntungan_bersih'     => $pendapatan_bersih,
 'keuntungan'            => $keuntungan,
  );
  $this->db->insert('data_pendapatan_perusahaan',$data_pendapatan_perusahaan);

  
  
 $id_pendapatan_simpan = array(
     'pendapatan' =>$id_pendapatan,
 );
 $this->db->insert('id_pendapatan',$id_pendapatan_simpan);

 
}
}
}
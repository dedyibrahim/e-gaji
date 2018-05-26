<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_admin extends CI_Controller {
public function __construct() {
parent::__construct();

$this->load->helper('form');
$this->load->model('M_login');
$this->load->library('session');
$this->load->library('upload');
$this->load->helper(array('form', 'url'));
$this->load->library('form_validation');
$this->load->library('datatables');
$this->load->database();
$this->load->helper('url');
}

public function index(){
$this->load->view('V_admin/umum/V_header');
$this->load->view('V_admin/umum/V_sidebar');
$this->load->view('V_admin/umum/V_top_navigasi');
$this->load->view('V_admin/V_index_admin');
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


$id_user =$this->session->all_userdata();
$id_user['id_user'];
$this->db->select('saldo_perusahaan');
$data2 = $this->db->get('user')->row_array();
$data2['saldo_perusahaan'];
$update_saldo_perusahaan = array(
'saldo_perusahaan' =>$pendapatan_bersih + $data2['saldo_perusahaan'],
);
$this->db->update('user',$update_saldo_perusahaan,array('id_user'=>$id_user['id_user']));



}
}
public function pengaturan_admin(){
$this->load->view('V_admin/umum/V_header');
$this->load->view('V_admin/umum/V_sidebar');
$this->load->view('V_admin/umum/V_top_navigasi');
$this->load->view('V_admin/V_pengaturan_admin');
$this->load->view('V_admin/umum/V_footer');
}

public function ubah_admin(){

if(isset($_POST['nama_admin'])){

$id_user = $this->session->all_userdata();

$data = array(
'nama' =>$this->input->post('nama_admin'),
'email' =>$this->input->post('email_admin'),

);

$this->db->update('user',$data,array('id_user'=>$id_user['id_user']));
}
}
public function update_foto(){
$config['upload_path']          = './uploads/user/';
$config['allowed_types']        = 'gif|jpg|png';
$config['encrypt_name']         =TRUE;
$config['overwrite']            =TRUE;
$config['create_thumb']        = TRUE ;
$this->upload->initialize($config);

if (!$this->upload->do_upload('update_foto'))
{
$error = array('error' => $this->upload->display_errors());
echo "<H3>Ada eror yeuh,kalo masih kebingungan hubungi aja lagi develovernya yah di 081289*03*6* ".$error['error']."</H3>";
}
else
{

$config2['image_library']  = 'gd2';
$config2['source_image']   = './uploads/user/'.$this->upload->file_name;
$config2['new_image']      = './uploads/user_thumb/'.$this->upload->file_name;
$config2['maintain_ratio'] = TRUE;
$config2['width']          = 350;
$config2['height']         = 350;

$this->load->library('image_lib', $config2);
$this->image_lib->resize();
$id = $this->session->all_userdata();
$data_user = $this->db->get_where('user',array('id_user'=>$id['id_user']))->row_array();
if($data_user != NULL)
unlink ('./uploads/user/'.$data_user['gambar']);
unlink ('./uploads/user_thumb/'.$data_user['gambar']);

$data_update = array(
'gambar' =>$this->upload->file_name,
);
$this->db->update('user',$data_update,array('id_user'=>$id['id_user']));

$this->session->set_userdata(array('gambar'=>$this->upload->file_name));

$this->pengaturan_admin();
}
}

}
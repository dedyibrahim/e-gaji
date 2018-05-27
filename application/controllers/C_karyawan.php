<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_karyawan extends CI_Controller {
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

$this->load->view('V_karyawan/umum/V_header');
$this->load->view('V_karyawan/umum/V_sidebar');
$this->load->view('V_karyawan/umum/V_top_navigasi');
$this->load->view('V_karyawan/V_index_karyawan');
$this->load->view('V_karyawan/umum/V_footer');

}
public function data_transaksi(){
$data = $this->session->all_userdata();

$id = $data['id_karyawan'];    
$karyawan = $this->db->get_where('karyawan',array('id_karyawan'=>$id));

$this->load->view('V_karyawan/umum/V_header');
$this->load->view('V_karyawan/umum/V_sidebar');
$this->load->view('V_karyawan/umum/V_top_navigasi');
$this->load->view('V_karyawan/V_lihat_karyawan',['data_karyawan'=>$karyawan]);
$this->load->view('V_karyawan/umum/V_footer');

}

public function data_json_lihat_karyawan(){
$data = $this->session->all_userdata();

$id_karyawan = $data['id_karyawan'];   

$this->load->model('Data_admin');
header('Content-Type: application/json');
echo $this->Data_admin->data_json_lihat_karyawan($id_karyawan);       

}
public function data_json_penarikan(){

$this->load->model('Data_admin');
header('Content-Type: application/json');
echo $this->Data_admin->data_penarikan();       

}

public function pengaturan_akun(){
$data = $this->session->all_userdata();
$id = $data['id_karyawan'];    
$karyawan = $this->db->get_where('karyawan',array('id_karyawan'=>$id));

$this->load->view('V_karyawan/umum/V_header');
$this->load->view('V_karyawan/umum/V_sidebar');
$this->load->view('V_karyawan/umum/V_top_navigasi');
$this->load->view('V_karyawan/V_pengaturan_akun',['data_karyawan'=>$karyawan]);
$this->load->view('V_karyawan/umum/V_footer');

}
public function update_foto(){
$config['upload_path']          = './uploads/karyawan/';
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
$config2['source_image']   = './uploads/karyawan/'.$this->upload->file_name;
$config2['new_image']      = './uploads/karyawan_thumb/'.$this->upload->file_name;
$config2['maintain_ratio'] = TRUE;
$config2['width']          = 350;
$config2['height']         = 350;

$this->load->library('image_lib', $config2);
$this->image_lib->resize();
$id = $this->session->all_userdata();
$data_user = $this->db->get_where('karyawan',array('id_karyawan'=>$id['id_karyawan']))->row_array();

if($data_user != NULL)
unlink ('./uploads/karyawan/'.$data_user['gambar']);
unlink ('./uploads/karyawan_thumb/'.$data_user['gambar']);

$data_update = array(
'gambar' =>$this->upload->file_name,
);
$this->db->update('karyawan',$data_update,array('id_karyawan'=>$id['id_karyawan']));

$this->session->set_userdata(array('gambar'=>$this->upload->file_name));

$this->pengaturan_akun();
}
}

public function ubah_karyawan(){

if(isset($_POST['nama_admin'])){

$id_karyawan= $this->session->all_userdata();

$data = array(
'nama_karyawan' =>$this->input->post('nama_admin'),
'email' =>$this->input->post('email_admin'),

);

$this->db->update('karyawan',$data,array('id_karyawan'=>$id_karyawan['id_karyawan']));
}
}

public function data_penarikan(){

$this->load->view('V_karyawan/umum/V_header');
$this->load->view('V_karyawan/umum/V_sidebar');
$this->load->view('V_karyawan/umum/V_top_navigasi');
$this->load->view('V_karyawan/V_data_penarikan');
$this->load->view('V_karyawan/umum/V_footer');

}

public function simpan_penarikan(){
$id = $this->session->all_userdata();

$data = array(
'jumlah_penarikan'     => $this->input->post('jumlah_penarikan'),
'keterangan_penarikan' => $this->input->post('keterangan_penarikan'),
'id_karyawan'          => $id['id_karyawan'],   
'status_penarikan'     =>"Belum terkonfirmasi",   
);

$this->db->insert('data_penarikan',$data);


}

public function print_penarikan(){
$id = $this->uri->segment(3);

$this->db->select('*');
$this->db->from('data_penarikan');
$this->db->join('karyawan', 'karyawan.id_karyawan = data_penarikan.id_karyawan');
$this->db->where('id_penarikan',$id);
$query = $this->db->get();    


$this->load->view('V_karyawan/V_print_penarikan',['penarikan'=>$query]);

}

}
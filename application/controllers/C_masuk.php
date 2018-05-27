<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_masuk extends CI_Controller {
    
public function __construct() {
parent::__construct();
$this->load->helper('form');
$this->load->model('M_login');
$this->load->library('session');
$this->load->helper('url');
$this->load->database();
$this->load->helper('url');
}
public function index(){
$this->load->view('V_masuk');
}
public function login(){
if(isset($_POST['btn_login'])){
$email    =   $this->input->post('email');
$password =   $this->input->post('password');
$tampil   = $this->M_login->masuk($email,$password);

if($tampil==1 ){
$setsesi = $this->db->get_where('karyawan',['email'=>$email]);
foreach ($setsesi->result() as $value) {
$sess_data= array(
'nama'              =>$value->nama_karyawan,
'level'             =>$value->level,
'id_karyawan'       =>$value->id_karyawan,
'status'            =>$value->status,
'gambar'            =>$value->gambar,
);
$ok =  $this->session->set_userdata($sess_data);
}

$ambil_sesi = $this->session->all_userdata();


if($ambil_sesi['level'] == 'Karyawan' ){

redirect('C_karyawan');
    
}



}else{
    
    
redirect('C_masuk');


}

}

}
public function keluar(){
$this->session->sess_destroy();

redirect('C_masuk');
}

}
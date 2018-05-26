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

}
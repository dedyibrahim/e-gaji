<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function __construct() {
        parent::__construct();
            $this->load->database();

    }
    public function login($email,$password){
      $ada= $this->db->get_where('user',array('email'=>$email, 'password'=>md5($password)));
      
     if($ada->num_rows()>0){
        return 1;
     }else{
        return 0;
    }
    
        
    }
    public function masuk($email,$password){
      $ada= $this->db->get_where('karyawan',array('email'=>$email, 'password'=>md5($password)));
      
     if($ada->num_rows()>0){
        return 1;
     }else{
        return 0;
    }
    
        
    }

    
    
    
    
}

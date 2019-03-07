<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class Auth extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('m_Pegawai');
    }
    
    function login(){
       if(isset($_POST['submit'])){
       $username = $this->input->post('username');
       $password = $this->input->post('password');
       $hasil = $this->m_Pegawai->login($username, $password);
       //$this->m_barang->tampildata($username);
              if ($hasil==1){
                 $sessiondata = array(
                          'username' => $username,
                          'loginuser' => TRUE
                     );
                 $this->session->set_userdata($sessiondata);
                 redirect("dashboard");
              }
              else{
                 redirect('Auth/login');
              }                     
        }
        else{
           chek_login_session();
           $this->load->view('form_login');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('Auth/login');
    }
    
    function lupapass(){
        $var1 = rand(0, 9);
        $var2 = rand(0, 9);
        $data['var1'] = $var1;
        $data['var2'] = $var2;
        $this->load->view('LupaPassword',$data);
    }
    
    function resetpass(){
        if(isset($_POST['submit'])){
            $ktp = $this->input->post('ktp');
            $pass1 = $this->input->post('passnew');
            $pass2 = $this->input->post('passnew2');
            $data       = array('password'=>md5($pass1));
            $var1 = $this->input->post('var1');
            $var2 = $this->input->post('var2');
            $jawaban = $this->input->post('jawaban');
            $benar = $var1+$var2;
            if($jawaban==$benar){
                if($pass1==$pass2){
                     $this->m_Pegawai->editPass($data,$ktp);
                     redirect('Auth/login');
                 }else{
                     echo "<script type='text/javascript'>alert('password baru tidak cocok')</script>";
                 }
            }else{
                echo "<script type='text/javascript'>alert('jawaban perhitungan salah')</script>";
                redirect('Auth/lupapass');
            }
                 
              
              
        }
    }
    
    
}
   



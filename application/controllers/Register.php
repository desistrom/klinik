<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Register
 *
 * @author yoga_
 */
class Register extends CI_controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('m_pegawai');
    }
    
    function index(){
        $this->load->view('Register');
    }
    
    function signup(){
        if(isset($_POST['submit'])){
            // proses data
            
            $this->form_validation->set_rules('nama', 'NAME','required');
            $this->form_validation->set_rules('username', 'USERNAME','required');
            
            $nama       =  $this->input->post('nama');
            $username   =  $this->input->post('username');
            $password   =  $this->input->post('password');
            $ktp    =  $this->input->post('ktp');
            
            if($nama!=null || $username!=null || $password!=null || $ktp!=null ){
                $this->m_pegawai->add($nama, $username, $password, $ktp);
                redirect('Auth/login');
            }
                else{
                    redirect('register');
                    echo 'data masih ada yang belum di isi';
                }
        }
    }
}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Promo extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('m_Promo');
        chek_session();
    }
    
    function index(){
        $data['record'] = $this->m_Promo->tampilkan_data();
        $this->template->load('template','promo/lihat_promo',$data);
    }
    function inputPromo(){
        if(isset($_POST['submit'])){
            // proses barang
            $namaPromo  =   $this->input->post('nama_promo');
            $tglPromo   =   $this->input->post('date_promo');
            $bsrDiskon  =   $this->input->post('diskon_promo');
            $username = $_SESSION['username'];
            $data       = array('nama_promo'=>$namaPromo,
                                'date_promo'=>$tglPromo,
                                'besar_diskon'=>(($bsrDiskon))*0.01,
                                'username'=>$username);
            $this->m_Promo->post($data);
            redirect('promo');
        }else{
            $this->template->load('template','input_promo');
        }
    }
    
    function edit(){
        if(isset($_POST['submit'])){
            // proses barang
            $id         =   $this->input->post('id');
            $namaPromo  =   $this->input->post('nama_promo');
            $tglPromo   =   $this->input->post('date_promo');
            $bsrDiskon  =   $this->input->post('besar_diskon');
            $username = $_SESSION['username'];
            $data       = array('nama_promo'=>$namaPromo,
                                'date_promo'=>$tglPromo,
                                'besar_diskon'=>(($bsrDiskon))*0.01,
                                'username'=>$username);
            $this->m_Promo->edit($data, $id);
            redirect('promo');
        }else{
            $id=  $this->uri->segment(3);
            $data['record']     =  $this->m_Promo->get_one($id)->row_array();
            //$this->load->view('barang/form_edit',$data);
            $this->template->load('template','promo/form_edit',$data);
        }
    }
    function delete(){
        $id=  $this->uri->segment(3);
            $this->m_Promo->delete($id);
            redirect('promo');
    }
}


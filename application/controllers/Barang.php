<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Barang
 *
 * @author yoga_
 */
class Barang extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('m_barang');
        chek_session();
    }
    
    function index(){
        $data['record'] = $this->m_barang->tampil_data();
        $this->template->load('template','barang/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses barang
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
            $harga      =   $this->input->post('harga');
                
                if($nama!=null || $harga!=null){
                    $data = array(
                            'nama_barang'=>$nama,
                            'kategori_id'=>$kategori,
                            'harga'=>$harga
                            );
                    $this->m_barang->post($data);
                    redirect('barang');
                }else{
                    redirect('barang/post');
                }
        }
        else{
            $this->load->model('m_kategori');
            $data['kategori']=  $this->m_kategori->tampilkan_data()->result();
            //$this->load->view('barang/form_input',$data);
            $this->template->load('template','barang/form_input',$data);
        }
        
    }
    
    function delete(){
            $id=  $this->uri->segment(3);
            $this->m_barang->delete($id);
            redirect('barang');
        }
    
    function edit(){
       if(isset($_POST['submit'])){
            // proses barang
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
            $harga      =   $this->input->post('harga');
            $data       = array('nama_barang'=>$nama,
                                'kategori_id'=>$kategori,
                                'harga'=>$harga);
            $this->m_barang->edit($data,$id);
            redirect('barang');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('m_kategori');
            $data['kategori']   =  $this->m_kategori->tampilkan_data()->result();
            $data['record']     =  $this->m_barang->get_one($id)->row_array();
            //$this->load->view('barang/form_edit',$data);
            $this->template->load('template','barang/form_edit',$data);
        }
    }
 
    
    
    
    
}

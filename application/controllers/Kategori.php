<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Signup
 *
 * @author yoga_
 */
class Kategori extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('m_kategori');
        // $this->load->model('m_operator');
        $this->load->library(array('form_validation'));
        chek_session();
    }
    
    function index(){
        $data['record']=  $this->m_kategori->tampilkan_data();
        $this->template->load('template','kategori/lihat_data',$data);
    }

    function post(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data['nama_kategori'] = $this->input->post('kategori');
            $this->db->insert('kategori_barang',$data);
            redirect('kategori');
            exit();
        }
        $this->template->load('template','kategori/form_input');
    }

    function edit($id=null){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // $data['kategori_id'] = $this->input->post('id');
            $data['nama_kategori'] = $this->input->post('kategori');
            // print_r($data);
            // return false;
            $this->db->update('kategori_barang',$data,array('kategori_id'=>$this->input->post('id')));
            redirect('kategori');
        }
        $data['record'] = $this->db->get_where('kategori_barang',array('kategori_id'=>$id))->row_array();
        $this->template->load('template','kategori/form_edit',$data);
    }
    
    
}

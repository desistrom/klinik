<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transaksi
 *
 * @author yoga_
 */
class Transaksi extends CI_Controller {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->model(array('m_barang', 'm_transaksi', 'm_Promo'));
        chek_session();
    }

    function index() {
        if (isset($_POST['submit'])) {
            $this->m_transaksi->simpan_barang();
            redirect('transaksi');
        } else {
            $data['barang'] = $this->m_barang->tampil_data();
            $data['detail'] = $this->m_transaksi->tampilkan_detail_transaksi();
            $data['promo'] = $this->m_Promo->tampilkan_data()->result();
            $this->template->load('template', 'transaksi/form_transaksi', $data);
//            $data['detail'] = $this->m_transaksi->
        }
    }

    function hapusitem() {
        $id = $this->uri->segment(3);
        $this->m_transaksi->hapusitem($id);
        redirect('transaksi');
    }

    function selesai_belanja() {
        $tanggal = date('Y-m-d');
        $user = $this->session->userdata('username');
        $id_op = $this->db->get_where('pegawai', array('username' => $user))->row_array();
        $data = array('pegawai_id' => $id_op['pegawai_id'], 'tanggal_transaksi' => $tanggal);
        
        $this->m_transaksi->selesai_belanja($data);
        redirect('transaksi');
        
        
        
    }

    function laporan() {
        if (isset($_POST['submit'])) {
            $tanggal1 = $this->input->post('tanggal1');
            $tanggal2 = $this->input->post('tanggal2');
            $data['record'] = $this->m_transaksi->laporan_periode($tanggal1, $tanggal2);
            $this->template->load('template', 'transaksi/laporan', $data);
        }if (isset($_POST['submitall'])){
            $data['record'] = $this->m_transaksi->tampilkan_laporan();
            $this->template->load('template', 'transaksi/laporan', $data);
        } else {
            $data['record'] = $this->m_transaksi->tampilkan_laporan();
            $this->template->load('template', 'transaksi/laporan', $data);
        }
    }

    function excel() {
        header("Content-type=appalication/vnd.ms-excel");
        header("content-disposition:attachment;filename=laporantransaksi.xls");
        $data['record'] = $this->model_transaksi->laporan_default();
        $this->load->view('transaksi/laporan_excel', $data);
    }

    function pdf() {
        $this->load->library('cfpdf');
        $pdf = new FPDF('P', 'mm', 'A5');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 'L');
        $pdf->SetFontSize(14);
        $pdf->Text(10, 10, 'LAPORAN TRANSAKSI');
        $pdf->SetFont('Arial', 'B', 'L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10, '', '', 1);
        $pdf->Cell(10, 7, 'No', 1, 0);
        $pdf->Cell(27, 7, 'Nama Barang', 1, 0);
        $pdf->Cell(30, 7, 'Quantity', 1, 0);
        $pdf->Cell(38, 7, 'Harga', 1, 1);
        // tampilkan dari database
        $pdf->SetFont('Arial', '', 'L');
        $data = $this->m_transaksi->laporan_default();
        $no = 1;
        $total = 0;
        foreach ($data->result() as $r) {
            $pdf->Cell(10, 7, $no, 1, 0);
            $pdf->Cell(27, 7, $r->nama_barang, 1, 0);
            $pdf->Cell(30, 7, $r->qty, 1, 0);
            $pdf->Cell(38, 7, $r->harga*$r->qty-$r->qty*$r->besar_diskon*$r->harga, 1, 1);
            $no++;
            $total=$total+($r->harga*$r->qty-$r->qty*$r->besar_diskon*$r->harga);
        }
        // end
        $pdf->Cell(67, 7, 'Total', 1, 0, 'R');
        $pdf->Cell(38, 7, $total, 1, 0);
        $pdf->Output();
    }

}

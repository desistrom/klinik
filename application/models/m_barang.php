<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_barang
 *
 * @author yoga_
 */
class m_barang extends CI_Model {

    //put your code here
    function tampil_data() {
        $username = $_SESSION['username'];
        $query = "select c.barang_id, c.nama_barang, d.nama_kategori, c.harga
                from pegawai a join pegawai_barang b on a.pegawai_id=b.id_pegawai join barang c on 
                b.id_barang=c.barang_id join kategori_barang d on c.kategori_id=d.kategori_id
                where a.username='$username'";
        return $this->db->query($query);
    }

    function post($data) {
            $this->db->insert('barang', $data);
            $res = $this->db->insert_id();
            $id_barang = $this->db->insert_id();
            $username = $_SESSION["username"];
            $query = "SELECT pegawai_id FROM pegawai WHERE username='$username'";
            $query1 = $this->db->query($query);
            foreach ($query1->result() as $row) {
                $id = $row->pegawai_id;
            }
            $data2 = array('id_barang' => $id_barang,
                'id_pegawai' => $id);
            $this->db->insert('pegawai_barang', $data2);

            return $res;
        }
        
    function edit($data,$id){
        $this->db->where('barang_id',$id);
        $this->db->update('barang',$data);
    }
    /*
    public function getByBarang($nama){
        
        $result = $this->db->select('*')
                ->from('barang')
                ->where('nama_barang',$nama)
                ->get();
        
        return $result;
    }*/

    function delete($id) {
        $this->db->where('barang_id', $id);
        $this->db->delete('barang');
    }
    
    function get_one($id){
        $param  =   array('barang_id'=>$id);
        return $this->db->get_where('barang',$param);
    }

}

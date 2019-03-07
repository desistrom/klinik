<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class m_Promo extends CI_Model{
    
    function post($data){
        $this->db->insert('Promo',$data);
//        $id_barang = $this->db->insert_id();
//        $username = $_SESSION["username"];
//        $query = "SELECT pegawai_id FROM pegawai WHERE username='$username'";
//        $query1 = $this->db->query($query);//QUERY EXECUTE
//        foreach ($query1->result() as $row) {
//			$id = $row->pegawai_id;
//		}
//        $data2 = array('id_barang' => $id_barang,
//                        'id_pegawai' => $id);
//        $this->db->insert('pegawai_barang',$data2);  
    }
    function tampilkan_data(){
        $username = $_SESSION['username'];
        $result = $this->db->select('*')
                ->from('promo')
                // ->where('username', $username)
                ->get();
         
        return $result;
    }
    function get_one($id){
        $param  =   array('promo_id'=>$id);
        return $this->db->get_where('promo',$param);
    }
    function edit($data,$id){
        $this->db->where('promo_id',$id);
        $this->db->update('promo',$data);
    }
    function delete($id) {
        $this->db->where('promo_id', $id);
        $this->db->delete('promo');
    }
}
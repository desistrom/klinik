<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author yoga_
 */
class m_Pegawai extends CI_model {
    //put your code here
    function login($username,$password)
    {
        $chek =  $this->db->get_where('pegawai',array('username'=>$username,'password'=>  md5($password)));
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    function tampildata()
    {
        return $this->db->get('pegawai');
    }
    
    function add($nama, $username, $password, $ktp){
        $data = array(
                'nama_lengkap' => $nama,
                'username' => $username,
                'password' => md5($password),
                'KTP'  => $ktp
                );

        $this->db->insert('pegawai',$data);
    }
    
    function getPass($ktp)
    {
        $chek =  $this->db->get('pegawai')
                ->where('KTP',$ktp);
        if($chek->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
    }
    
    function editPass($data,$ktp){
//        $where = array(
//                'KTP' => $ktp);
//        );
//        $data = array(
//                'password' => md5($pass1)
//            );
        
        //$query = $this->db->query('UPDATE SET password = ' $data ' * FROM '.$this->table_name.' '.$id);
//       $query = $this->db->query('UPDATE SET password = '.$pass1.' FROM pegawai WHERE KTP = '.$ktp.'');
//       return $query;
//        $this->db->where($where);
//        $this->db->update('pegawai',$data);
        
         $this->db->where('KTP',$ktp);
         $this->db->update('pegawai',$data);
        
//        echo hasil,hasil2;
        
//        $query = $this->db->query('UPDATE SET password = '$data' * FROM '.$this->table_name.' '.$id);
//	return $query->result_array();
    }
}


































                           
<?php

    function chek_session(){
    $CI= & get_instance();
    $session=$CI->session->userdata('loginuser');
        if($session!=TRUE){
            redirect('Auth/login');
        }
    }
    
    function chek_login_session(){
    $CI= & get_instance();
    $session=$CI->session->userdata('loginuser');
        if($session==TRUE){
            redirect('dashboard');
        }
    }
    
    function chek_id(){
        $username = $_SESSION["username"];
        $query = "SELECT pegawai_id FROM pegawai WHERE username='$username'";
        $query1 = $this->db->query($query);
        foreach ($query1->result() as $row) {
			$id = $row->pegawai_id;
		}
        return $id;
    }

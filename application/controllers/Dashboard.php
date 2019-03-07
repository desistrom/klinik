<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author yoga_
 */
class Dashboard extends CI_Controller{
    //put your code here
    function index(){
        chek_session();
        $this->template->load('template','v_dashboard');
//$this->load->view('template','v_dashboard');
    }
}

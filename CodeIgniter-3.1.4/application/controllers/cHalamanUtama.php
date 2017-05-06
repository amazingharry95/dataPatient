<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class cHalamanUtama extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('');
        $this->load->helper('url_helper');
        $this->load->library('session');
        
        /*if ($this->session->userdata() === NULL){
            redirect();
        }*/
    }
    
    public function index(){
        $head['title'] = 'Home | DATA PATIENT';
        $head['halamanUtama'] = 1;
        /*$data['username'] = $this->session->userdata('id_user');
        $data['fullName'] = $this->session->userdata('name');*/
    
        $this->load->view('heading/headHome', $head);
        $this->load->view('home');
        $this->load->view('footing/footHome');
    }
}
?>
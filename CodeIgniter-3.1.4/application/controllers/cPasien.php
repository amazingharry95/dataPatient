<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cPasien extends CI_Controller{
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
        $head['title'] = 'Entry Patient | DATA PATIENT';
        
        $this->load->view('heading/headHome', $head);
        $this->load->view('newPatient');
        $this->load->view('footing/footEntry');
    }
    
    public function upload_file(){
        $status = "";
        $msg = "";
        $file_element_name = 'userfile';
        
        if(empty($_POST['title'])){
            $status = 'error';
            $msg = 'Please enter a title!';
        }
        
       if ($status != "error")
    {
        $config['upload_path'] = './files/';
        $config['allowed_types'] = 'txt|csv';
        $config['max_size'] = 1024 * 8;
        $config['encrypt_name'] = TRUE;
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload($file_element_name))
        {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
        }
        else
        {
            $data = $this->upload->data();
            $file_id = $this->files_model->insert_file($data['file_name'], $_POST['title']);
            if($file_id)
            {
                $status = "success";
                $msg = "File successfully uploaded";
            }
            else
            {
                unlink($data['full_path']);
                $status = "error";
                $msg = "Something went wrong when saving the file, please try again.";
            }
        }
        @unlink($_FILES[$file_element_name]);
    }
    echo json_encode(array('status' => $status, 'msg' => $msg));
    }
}
?>
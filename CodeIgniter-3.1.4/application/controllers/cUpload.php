<?php

class Upload extends CI_Controller{
	
    public function __construct(){
        parent::construct();
    }
    
    public function index(){
        $this->load->view('coba');
    }
    
    public function uploadFile(){
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'txt | csv';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024';
        
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } 
            else {
                if (file_exists('uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : uploads/' . $_FILES['file']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } 
                    else {
                        echo 'File successfully uploaded : uploads/' . $_FILES['file']['name'];
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
        
    }
}

?>
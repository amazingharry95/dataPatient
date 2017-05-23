<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cDataPasien extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('patientModel');
        $this->load->helper('date');
        $this->load->database();
    }
    
    function getNamaFile($idPatient){
        $namaFile = $this->patientModel->getFileName($idPatient);
        
        return $namaFile;
    }
    
    function getCOData(){
        $idpatient = $this->uri->segment('3');
        $namaFile = $this->getNamaFile($idpatient);
        #echo "<script>console.log( 'Debug Objects: " . $namaFile . "' );</script>";
        $path = "C:\wamp\www\dataPatient\CodeIgniter-3.1.4\assets\scripts\getDataCO.py";
        $result = shell_exec("python $path $namaFile");
        #print_r($result);
        #echo "<script>console.log( 'Debug Objects: " . $result . "' );</script>";
        echo $result;
        #return $result;
    }
    
    function getCO2Data(){
        $idpatient = $this->uri->segment('3');
        $namaFile = $this->getNamaFile($idpatient);
        $path = "C:\wamp\www\dataPatient\CodeIgniter-3.1.4\assets\scripts\getDataCO2.py";
        $result = shell_exec("python $path $namaFile");
        
        echo $result;
    }
    
    function getKetoneData(){
        $idpatient = $this->uri->segment('3');
        $namaFile = $this->getNamaFile($idpatient);
        $path = "C:\wamp\www\dataPatient\CodeIgniter-3.1.4\assets\scripts\getDataKetone.py";
        $result = shell_exec("python $path $namaFile");
        
        echo $result;
    }
    
    function getHumidData(){
        $idpatient = $this->uri->segment('3');
        $namaFile = $this->getNamaFile($idpatient);
        $path = "C:\wamp\www\dataPatient\CodeIgniter-3.1.4\assets\scripts\getDataHumid.py";
        $result = shell_exec("python $path $namaFile");
        
        echo $result;
    }
    
    function getVOCData(){
        $idpatient = $this->uri->segment('3');
        $namaFile = $this->getNamaFile($idpatient);
        $path = "C:\wamp\www\dataPatient\CodeIgniter-3.1.4\assets\scripts\getDataVOC.py";
        $result = shell_exec("python $path $namaFile");
        
        echo $result;
    }
}
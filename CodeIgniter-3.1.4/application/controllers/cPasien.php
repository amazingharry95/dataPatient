<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cPasien extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('patientModel');
        $this->load->helper('date');
        $this->load->database();
        
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
    
    protected function cekNumberRow($tipe, $diagnosa){
        $numberRow = $this->patientModel->countRow($tipe, $diagnosa);
        
        #echo $numberRow;
        return str_pad($numberRow+1, 3, "0", STR_PAD_LEFT);
    }
    
    protected function convertType($tipe){
        if ($tipe == 'RANDOM'){
            return 1;
        }
        else if ($tipe == 'FASTING'){
            return 2;
        }
    }
    
    protected function convertDiagnose($diagnosa){
        if($diagnosa == 'HEALTHY'){
            return 1;
        }
        else if ($diagnosa == 'AMID'){
            return 2;
        }
        else if ($diagnosa == 'CHRONIC'){
            return 3;
        }
    }
    
    public function getID($tipe, $diagnosa){
        switch ($tipe){
            case 1:
                $type = "R";
                break;
            case 2:
                $type = "F";
                break;
            default:
                $type = "U";
        }
        
        switch ($diagnosa){
            case 1:
                $diagnose = "H";
                break;
            case 2:
                $diagnose = "A";
                break;
            case 3:
                $diagnose = "C";
                break;
            default:
                $diagnose = "H";
        }
        
        $idNomor = $this->cekNumberRow($tipe, $diagnosa);
        
        $idPatient = $type.$diagnose.$idNomor;
        
        return $idPatient;
    }
    
    public function getPatient(){
        $head['title'] = 'Home | DATA PATIENT';
        $head['halamanUtama'] = 1;
    
        $query = $this->db->get("patient");
        $data['records'] = $query->result();
        
        $this->load->view('heading/headHome', $head);
        $this->load->view('home', $data);
        $this->load->view('footing/footHome');
    }
    
    public function addPatient(){
        //$this->load->model('patientModel');
        
        if($this->input->get()){
            $namaPatient = strtoupper($this->input->get('patientName'));
            $diagnosa = $this->convertDiagnose($this->input->get('diagnosa'));
            $tipe = $this->convertType($this->input->get('patientType'));
            $bgl = $this->input->get('bloodGlucose');
            $idPatient = $this->getID($tipe, $diagnosa);
            
            $data = array(
                'IDPATIENT' => $idPatient,
                'NAMAPATIENT' => $namaPatient,
                'DIAGNOSAPATIENT' => $diagnosa,
                'JENISPATIENT' => $tipe,
                'TANGGALRECORD' => date('Y-m-d', now()),
                'KADARGULA' => $bgl
            );
            if($this->patientModel->insertPatient($data)){
                $this->session->set_userdata('message', 'Save Patient Data');
                $this->session->mark_as_flash('message');
                
                redirect(base_url());
            }
        }
    }
    
    public function deletePatient(){
        $idPatient = $this->input->post('idpatient',TRUE);
        $this->patientModel->deletePatient($idPatient);
    }
    
    public function getProfile(){
        $idpatient = $this->uri->segment('3');
        $pasien['profil'] = $this->patientModel->getPatient($idpatient);
        
        $head['title'] = "$idpatient - Profile | DATA PATIENT";
        
        $this->load->view('heading/headHome', $head);
        $this->load->view('profilePatient', $pasien);
        $this->load->view('footing/footEntry');
        
        
    }
}
?>
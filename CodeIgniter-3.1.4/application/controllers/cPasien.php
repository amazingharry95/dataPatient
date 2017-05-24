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
        $this->load->view('home_v2', $data);
        $this->load->view('footing/footHome');
    }
    
    public function getPatient2(){
        #console.log('masuk');
        $allPatient = $this->patientModel->makeDataTables();
        #console.log('masuk');
        #console.log($allPatient);
        $data = array();
        
        foreach($allPatient as $row)
        {
            
            if($row->FOTOPATIENT == ''){
                $potoPatient = 'noPhoto.jpg';
            }
            else if(explode('.',$row->FOTOPATIENT)[1] == ''){
                $potoPatient = 'noPhoto.jpg';
            }
            else{
                $potoPatient = $row->FOTOPATIENT;
            }
            
            $sub_array = array();
            $sub_array[] = '<img src="'.base_url().'uploads/images/'.$potoPatient.'" class="img-thumbnail" width="100" height="50" />';
            $sub_array[] = $row->NAMAPATIENT;
            if ($row->DIAGNOSAPATIENT == 1){
                $sub_array[] = "<span class='label label-success label-mini'>HEALTHY</span>";
            }
            else if ($row->DIAGNOSAPATIENT == 2){
                $sub_array[] = "<span class='label label-warning label-mini'>AMID</span>";
            }
            else if ($row->DIAGNOSAPATIENT == 3){
                $sub_array[] = "<span class='label label-danger label-mini'>CHRONIC</span>";
            }
            
            $sub_array[] = "<a href='".base_url()."index.php/cPasien/getProfile/".$row->IDPATIENT."'><button class='btn btn-success btn-xs' data-target='#myProfile' data-toggle='modal'><i class='glyphicon glyphicon-eye-open'></i></button></a>";
            $sub_array[] = "<a href='".base_url()."index.php/cPasien/showEditPage/".$row->IDPATIENT."'><button class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></button>";
            $sub_array[] = "<button class='btn btn-danger btn-xs delpatient' data-id='".$row->IDPATIENT."'><i class='fa fa-trash-o'></i></button>";
            $data[] = $sub_array;
        }
        
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->patientModel->get_all_data(),  
            "recordsFiltered" => $this->patientModel->get_filtered_data(),  
            "data" => $data
        );
        echo json_encode($output);
    }
    
    function showEditPage(){
        $idpatient = $this->uri->segment('3');
        $pasien['profil'] = $this->patientModel->getPatient($idpatient);
        
        $head['title'] = "Edit Profile | DATA PATIENT";
        $head['id'] = $idpatient;
        
        $this->load->view('heading/headHome', $head);
        $this->load->view('editPatient', $pasien);
        $this->load->view('footing/footEntry');
        
    }
    
    function editPatient(){
        $idPatient = $this->uri->segment('3');
        $updateNamaPatient = strtoupper($this->input->post('patientName'));
        $updateDiagnosa = $this->convertDiagnose($this->input->post('diagnosa'));
        $updateTipe = $this->convertType($this->input->post('patientType'));
        $updateBgl = $this->input->post('bloodGlucose');
        
        if(isset($_FILES['patientSensor'])){
            echo "<script>console.log( 'Debug Objects: masuk' );</script>";
        }else{
            echo "<script>console.log( 'Debug Objects: gak' );</script>";
        }
        
        $updateData = array(
            'NAMAPATIENT' => $updateNamaPatient,
            'DIAGNOSAPATIENT' => $updateDiagnosa,
            'JENISPATIENT' => $updateTipe,
            'KADARGULA' => $updateBgl,
            'SENSORDATA' => $this->uploadSensor()
        );
        
        echo "<script>console.log( 'Debug Objects: " . $updateData['NAMAPATIENT'] . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $updateData['DIAGNOSAPATIENT'] . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $updateData['JENISPATIENT'] . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $updateData['KADARGULA'] . "' );</script>";
        echo "<script>console.log( 'Debug Objects: " . $updateData['SENSORDATA'] . "' );</script>";
        
        if($this->patientModel->updatePatient($idPatient, $updateData)){
                $fileSensorPasien = $updateData['SENSORDATA'];
                $path = "C:\wamp\www\dataPatient\CodeIgniter-3.1.4\assets\scripts\getStatisticFeatures\main.py";
                $result = shell_exec("python $path $fileSensorPasien $updateDiagnosa");
                
                $dataSensor = explode(',', $result);
                echo "<script>console.log( 'Debug Objects: " . $dataSensor[0] . "' );</script>";
                $inputDataSensor = array(
                    'AVG_CO' => $dataSensor[0],
                    'STD_CO' => $dataSensor[1],
                    'STD_CO2' => $dataSensor[2],
                    'STD_KETONE' => $dataSensor[3],
                    'AVG_HUMID' => $dataSensor[4],
                    'STD_VOC' => $dataSensor[5],
                    'IDPATIENT' => $idPatient,
                    'KELAS' => $updateDiagnosa
                );
                
                if($this->patientModel->insertDataSensor($inputDataSensor)){
                    redirect(base_url("index.php/cPasien/getProfile/$idPatient"));
                }
                else{
                    echo "<script>alert('Error Insert Data!');</script>";
                }
        }
    }
    
    
    function addPatient2(){
            $namaPatient = strtoupper($this->input->post('patientName'));
            $diagnosa = $this->convertDiagnose($this->input->post('diagnosa'));
            $tipe = $this->convertType('RANDOM');
            $bgl = $this->input->post('bloodGlucose');
            #echo "<script>alert($diagnosa)</script>";
            $idPatient = $this->getID($tipe, $diagnosa);
        
            #echo "<script>alert('masuk')</script>";
            
            $patientData = array(
                'IDPATIENT' => $idPatient,
                'NAMAPATIENT' => $namaPatient,
                'DIAGNOSAPATIENT' => $diagnosa,
                'JENISPATIENT' => $tipe,
                'TANGGALRECORD' => date('Y-m-d', now()),
                'KADARGULA' => $bgl,
                'FOTOPATIENT' => $this->uploadFoto(),
                'SENSORDATA' => $this->uploadSensor()
            );
            
            #echo "<script>alert('masuk')</script>";
        
            if($this->patientModel->insertPatient($patientData)){
                $fileSensorPasien = $patientData['SENSORDATA'];
                $path = "C:\wamp\www\dataPatient\CodeIgniter-3.1.4\assets\scripts\getStatisticFeatures\main.py";
                $result = shell_exec("python $path $fileSensorPasien $diagnosa");
                
                $dataSensor = explode(',', $result);
                $inputDataSensor = array(
                    'AVG_CO' => $dataSensor[0],
                    'STD_CO' => $dataSensor[1],
                    'STD_CO2' => $dataSensor[2],
                    'STD_KETONE' => $dataSensor[3],
                    'AVG_HUMID' => $dataSensor[4],
                    'STD_VOC' => $dataSensor[5],
                    'IDPATIENT' => $idPatient,
                    'KELAS' => $diagnosa
                );
                
                if($this->patientModel->insertDataSensor($inputDataSensor)){
                    redirect(base_url());
                }
                else{
                    echo "<script>alert('Error Insert Data!');</script>";
                }
                //panggil fungsi python buat ambil statistik data
                //insert statistik data ke db
                
            }
    }
    
    function uploadFoto(){
        if(isset($_FILES['patientImage'])){
            #$extension = explode('.', $_FILES['patientImage']['name']);
            #$new_name = rand().'.'.$extension[1];
            $new_name = $_FILES['patientImage']['name'];
            $destination = './uploads/images/'.$new_name;
            move_uploaded_file($_FILES['patientImage']['tmp_name'], $destination);
            
            return $new_name;
        }
    }
    
    function uploadSensor(){
        if(isset($_FILES['patientSensor'])){
            #$extension = explode('.', $_FILES['patientSensor']['name']);
            #$new_name = rand().'.'.$extension[1];
            $new_name = $_FILES['patientSensor']['name'];
            $destination = './uploads/sensors/'.$new_name;
            move_uploaded_file($_FILES['patientSensor']['tmp_name'], $destination);
            
            return $new_name;
        }
    }
    
    public function deletePatient(){
        $idPatient = $this->input->post('idpatient',TRUE);
        $this->patientModel->deletePatient($idPatient);
    }
    
    public function getProfile(){
        $idpatient = $this->uri->segment('3');
        $pasien['profil'] = $this->patientModel->getPatient($idpatient);
        
        $head['title'] = "Profile | DATA PATIENT";
        $head['id'] = $idpatient;
        
        $this->load->view('heading/headProfile', $head);
        $this->load->view('profilePatient', $pasien);
        $this->load->view('footing/footEntry');
    }
}
?>
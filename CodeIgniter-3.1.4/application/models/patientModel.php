<?php
    class patientModel extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        
        public function insertPatient($data){
            if($this->db->insert("patient", $data)){
                return true;
            }
        }
        
        public function countRow($tipe, $diagnosa){
            $this->db->select('NAMAPATIENT');
            $this->db->from('patient');
            $this->db->where("DIAGNOSAPATIENT = $diagnosa and JENISPATIENT = $tipe");
            
            $query = $this->db->get();
            return $query->num_rows();
        }
        
        public function deletePatient($idPatient){
            $this->db->where('IDPATIENT',$idPatient);
            if($this->db->delete('patient')){
                return true;
            }
        }
        
        public function getPatient($idPatient){
            $this->db->select('*');
            $this->db->from('patient');
            $this->db->where('IDPATIENT', $idPatient);  
            $query = $this->db->get();
            
            return $query->row();
        }
        
        public function makeDataTables(){
           $query = $this->db->get('patient');
           
           return $query->result();
        }
        
        function get_filtered_data(){  
           $query = $this->db->get('patient');
            
           return $query->num_rows();  
        }
        
        function get_all_data(){  
           $this->db->select("*");  
           $this->db->from('patient');
            
           return $this->db->count_all_results();  
        }
        
        function getFileName($idPatient){
            $this->db->select('SENSORDATA');
            $this->db->from('patient');
            $this->db->where('IDPATIENT', $idPatient);
            $query = $this->db->get();
            $row = $query->row();
            
            return $row->SENSORDATA;
        }
        
        function insertDataSensor($dataSensor){
            if($this->db->insert("recorddata", $dataSensor)){
                return true;
            }
        }
        
        function updatePatient($idPatient, $updateData){
            $this->db->where("IDPATIENT", $idPatient);
            $this->db->update("patient", $updateData);
            
            return true;
        }
    }
?>
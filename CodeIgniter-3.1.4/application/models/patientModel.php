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
    }
?>
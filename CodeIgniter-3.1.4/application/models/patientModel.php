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
    }
?>
<?php
class Addcd_model extends CI_Model {

        public function check_artist($band) {
                $this->db->select('id');
                $this->db->from('bands');
                $this->db->where('name',$band);
                //$query = $this->db->get();
                $band_id = $this->db->get();
                $band_id=$band_id->result_array();
                if (!isset($band_id['0'])) {
                        $this->db->insert('bands', array('name'=>$band));
                        $this->db->select('id');
                        $this->db->from('bands');
                        $this->db->where('name',$band);
                        $band_id = $this->db->get();
                }
                return $band_id;
                
        }

        public function insert_man($data) {
                if ($this->db->insert('albums',$data)) {
                return true;
                }
        }

        public function insert_artist($data) {
                $this->db->insert('bands', array('name'=>$data));
                return true;
        }

}
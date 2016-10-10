<?php
class Albums_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_collection()
        {
                $this->db->select('albums.id,title,band_id,year,label,name');
                $this->db->from('albums');
                $this->db->join('bands','bands.id = albums.band_id');
                $query = $this->db->get();
                return $query->result_array();
        }
}

<?php
class Albums_model extends CI_Model {

        public function get_collection()
        {
               $this->db->select('albums.id,albums.title,albums.band_id,albums.year,albums.label,bands.name');
               $this->db->from('albums');
               $this->db->join('bands','bands.id = albums.band_id','inner');
               $query = $this->db->get();
               return $query->result_array();
        }
}

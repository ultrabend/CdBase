<?php
class Bands_model extends CI_Model {

        public function get_band($id)
        {
            $this->db->select('bands.id,bands.name,bands.country,bands.area,bands.yearbegin');
            $this->db->from('bands');
            //$this->db->join('bands','bands.id = albums.band_id','inner');
            $this->db->where('bands.name', $id);
            $query = $this->db->get();
            return $query->result_array();
        }
}
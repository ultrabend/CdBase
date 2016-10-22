<?php
class Cards_model extends CI_Model {

        public function get_card($id)
        {
            $this->db->select('albums.id,albums.title,albums.band_id,albums.year,albums.label,albums.nb_tracks,albums.barcode,bands.name');
            $this->db->from('albums');
            $this->db->join('bands','bands.id = albums.band_id','inner');
            $this->db->where('albums.id', $id);
            $query = $this->db->get();
            return $query->result_array();
        }
}
<?php
class Albums_model extends CI_Model {

        public function get_collection($limit,$start)
        {
            $this->db->limit($limit,$start);
            $this->db->select('albums.id,albums.title,albums.band_id,albums.year,albums.label,bands.name');
            $this->db->from('albums');
            $this->db->join('bands','bands.id = albums.band_id','inner');
            $this->db->order_by('bands.name','asc');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_max()
        {
            $this->db->select('albums.id,albums.title,albums.band_id,albums.year,albums.label,bands.name');
            $this->db->from('albums');
            $this->db->join('bands','bands.id = albums.band_id','inner');
            $this->db->order_by('bands.name','asc');
            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_artists(){
        	$this->db->select('id,name');
            $this->db->from('bands');
            $this->db->order_by('name','ASC');
            $query = $this->db->get();
            return $query->result_array();	
        }
}

<?php
class Addcd_model extends CI_Model {

        /**** basic query **************/
        public function insert_artist($data) {
                $this->db->insert('bands', $data);
                return true;
        }

        /****** MusicBrainz query ******/

        public function check_artist($band) {
                $this->db->select('id');
                $this->db->from('bands');
                $this->db->where('name',$band);
                $band_id = $this->db->get()->result_array();
                if (!isset($band_id['0'])) {
                        $this->db->insert('bands', array('name'=>$band));
                        $this->db->select('id');
                        $this->db->from('bands');
                        $this->db->where('name',$band);
                        $band_id = $this->db->get()->result_array();;
                }
                return $band_id['0']['id'];
        }

        public function insert_man($data) {
                if ($this->db->insert('albums',$data)) {
                return true;
                }
        }

        public function check_id($data){
                $this->db->select('id');
                $this->db->from('albums');
                $this->db->where('brainz_album',$data);
                $query = $this->db->get()->result_array();
                return $query;
        }

        public function insert_tracks($data) {
                $this->db->insert('tracks', $data);
                return true;
        }
        
        /****************** Discogs query **************/

        public function check_artist_discogs($band) {
                $this->db->select('id');
                $this->db->from('bands');
                $this->db->where('name',$band);
                $band_id = $this->db->get()->result_array();
                if (!isset($band_id['0'])) {
                        /*$this->db->insert('bands', array('name'=>$band,'discogs_id'=>$id));
                        $this->db->select('id');
                        $this->db->from('bands');
                        $this->db->where('name',$band);
                        $band_id = $this->db->get()->result_array();;*/
                        return false;
                }
                else{
                        return $band_id['0']['id'];        
                }
                
        }

        public function check_discogs_id($data){
                $this->db->select('id');
                $this->db->from('albums');
                $this->db->where('discogs_id',$data);
                $query = $this->db->get()->result_array();
                return $query;
        }

        public function search_artist_discogs($id){
                $this->db->select('id');
                $this->db->from('albums');
                $this->db->where('discogs_id',$data);
                $query = $this->db->get()->result_array();
                return $query;
        }

}
<?php
class Addcd_model extends CI_Model {

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

        public function insert_artist($data) {
                $this->db->insert('bands', array('name'=>$data));
                return true;
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

        public function cover_recup($id,$album){
       // Le chemin de sauvegarde
        $path = base_url().'assets/img/covers';
        // L'url du fichier
        $url = "http://coverartarchive.org/release/".urlencode($id)."/front";
            
        if (file_get_contents($url)) {
            // On coupe le chemin
            $exp = explode('/',$url);
            // On recup l'adresse du serveur
            $serv = $exp[0].'//'.$exp[2];
            // On recup le nom du fichier
            $name = array_pop($exp);
            // On genere le contexte (pour contourner les protections anti-leech)
            $xcontext = stream_context_create(array("http"=>array("header"=>"Referer: ".$serv."\r\n")));
            // On tente de recuperer l'image
            $content = file_get_contents($url,false,$xcontext);
            if ($content === false) {
                echo "\nImpossible de récuperer le fichier.";
                exit(1);
            }
            // Sinon, si c'est bon, on sauvegarde le fichier
            $album= preg_replace('#[^0-9a-z]+#i', '-', $album);
            $test = file_put_contents($path.'/'.$album.'_'.$name.'.jpg',$response);
            if ($test === false) {
                echo "\nImpossible de sauvegarder le fichier.";
                exit(1);
            }
            return true;
            }
        }
    
}
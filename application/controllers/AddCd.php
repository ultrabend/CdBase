<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCd extends CI_Controller {

        public function __construct()
        {
                parent::__construct();               
                
                $this->load->library('Musicbrainz');
                $this->load->library('Discogs');
                $this->load->library('Url_picture');
                $this->load->model('Addcd_model');
                $this->lang->load('header', 'english');
        }

/***********   add manual **********************************************/
        
        public function manual()
        {
        	$this->load->helper('form');
	        $this->load->view('templates/header');
			$this->load->view('addcd/manual');
			$this->load->view('templates/footer.php');
        }

        public function addman()
        {
            $this->load->model('Addcd_model');     //model loaded
            $test = $this->input->post('album');
            if (isset($test)) {
                $data = array(
                    'title'=> $this->input->post('album'),
                    'year'=> $this->input->post('year'),
                    'nb_tracks'=> $this->input->post('tracks'),
                    'label'=> $this->input->post('label'),
                    'barcode'=> $this->input->post('barcode'),
                    'band_id'=> $this->input->post('name'));
            }
            else{
                redirect('AddCd/manual');
            }
            $tmp = $this->Addcd_model->check_artist($data['band_id']);
            $data['band_id'] = $tmp;
            $this->Addcd_model->insert_man($data);
            redirect('Albums/index/0');
        }

/************** MusicBrainz add release by title **************************/

        public function release(){

            $this->load->helper('form');
            $this->load->view('templates/header');
            $this->load->view('addcd/release.php');
            $this->load->view('templates/footer.php');

        }

        public function release_list(){
            
            $album = $this->input->post('album');
            $artist = $this->input->post('artist');

            if (isset($album)) {
                $datas['albums'] = $this->musicbrainz->release_search($album,$artist);
                $datas['albums'] = $datas['albums']['releases'];
            }
            else{
                redirect('AddCd/release');
            }
            $this->load->view('templates/header');
            $this->load->view('addcd/release_list',$datas);
            $this->load->view('templates/footer.php');
        }

        public function save_release($i){
            // suppression majuscule accentuées
            $_SESSION['album'][$i]['band_id'] = $this->Addcd_model->check_artist($_SESSION['album'][$i]['band_id']);
            $_SESSION['album'][$i]['title'] = htmlentities($_SESSION['album'][$i]['title'], ENT_NOQUOTES, 'utf-8');
            $_SESSION['album'][$i]['title'] = preg_replace("/&(.)(acute|cedil|circ|ring|tilde|uml|grave);/", "$1", $_SESSION['album'][$i]['title']);
            $_SESSION['album'][$i]['title'] = strtolower($_SESSION['album'][$i]['title']);
            $_SESSION['album'][$i]['title'] = ucfirst($_SESSION['album'][$i]['title']);
            $this->Addcd_model->insert_man($_SESSION['album'][$i]);
            $id = $this->Addcd_model->check_id($_SESSION['album'][$i]['brainz_album']);
            $datas = $this->musicbrainz->discsearch($_SESSION['album'][$i]['brainz_album']);
                    
            $j=0;
            foreach ($datas['media'] as $CD) {
                $j++;
                foreach ($CD['tracks'] as $track) {
                    $tracks['album_id']=$id['0']['id'];
                    $tracks['ncd']=$j;
                    $tracks['id_track']=$track['number'];
                    $tracks['title']=$track['title'];
                    $tracks['duration']=$track['length'];
                    $this->Addcd_model->insert_tracks($tracks);
                }
            }
            $this->url_picture->capture($_SESSION['album'][$i]['brainz_album'],$_SESSION['album'][$i]['title']);
            redirect('Cards/index/'.$id[0]['id']);
        }


/********** MusicBrainz Add with barcode **************************************/

        public function barcode(){

            $this->load->helper('form');
            $this->load->view('templates/header');
            $this->load->view('addcd/barcode');
            $this->load->view('templates/footer.php');

        }

        public function add_barcode(){
            $barcode = $this->input->post('barcode');
            if (isset($barcode)) {
                $datas = $this->musicbrainz->BarcodeSearch($barcode);
                $album['brainz_album'] = $datas['releases']['0']['id'];
                $album['title'] = $datas['releases']['0']['title'];
                $album['band_id'] = $datas['releases']['0']['artist-credit']['0']['artist']['name'];
                $album['format'] = $datas['releases']['0']['media'][0]['format'];
                $album['media'] = $datas['releases']['0']['count'];
                $album['nb_tracks'] = $datas['releases']['0']['track-count'];
                $album['year'] = $datas['releases']['0']['date'];
                //$album['country'] = $datas['releases']['0']['country'];
                $album['barcode'] = $datas['releases']['0']['barcode'];
            }
            else{
                redirect('AddCd/barcode');
            }
            $album['band_id'] = $this->Addcd_model->check_artist($album['band_id']);
            $this->Addcd_model->insert_man($album);
            $id  = $this->Addcd_model->check_id($album['brainz_album']);
            $datas = $this->musicbrainz->discsearch($album['brainz_album']);
            $i=0;
            foreach ($datas['media'] as $CD) {
                $i++;
                foreach ($CD['tracks'] as $track) {
                    $tracks['album_id']=$id['0']['id'];
                    $tracks['ncd']=$i;
                    $tracks['id_track']=$track['number'];
                    $tracks['title']=$track['title'];
                    $tracks['duration']=$track['length'];
                    $this->Addcd_model->insert_tracks($tracks);
                }
            } 
            $this->url_picture->capture($album['brainz_album'],$album['title']);

            redirect('Cards/index/'.$id[0]['id']);
        }

/************** import cd cover ***************************************/

        public function import_cover(){

            $this->load->helper('form');
            $this->load->view('templates/header');
            $this->load->view('addcd/import_cover');
            $this->load->view('templates/footer.php');

        }

        public function download_cover(){
            $url = $this->input->post('url');
            $title = str_replace("'", "-", $_SESSION['album']['title']);
            $title = str_replace(" ", "-", $title);
            $this->url_picture->coverdown($url,$title);
            $album_id = $this->session->userdata('album_id');
            redirect ('cards/index/'.$album_id);        }

/************** Discogs add release  **************************/

        public function discogs_release(){
            $this->load->helper('form');
            $this->load->view('templates/header');
            $this->load->view('addcd/discogs_release.php');
            $this->load->view('templates/footer.php');
        }

        public function discogs_release_list(){           
            $release = $this->input->post('album');
            $artist = $this->input->post('artist');

            if (isset($release)) {
                $datas['albums'] = $this->discogs->discogs_release_search($release,$artist);
                $datas['albums'] = $datas['albums']['results'];
            }
            else{
                redirect('AddCd/discogs_release');
            }
            $this->load->view('templates/header');
            $this->load->view('addcd/discogs_release_list',$datas);
            $this->load->view('templates/footer.php');
        }

        public function discogs_save_release($i){
            $this->load->model('Addcd_model');
            $datas = $this->discogs->discogs_release_import($i); // Import release data
            $release['title'] = $datas['title'];
            $release['discogs_id'] = $datas['id'];
            $release['band_id'] = $datas['artists'][0]['name'];
            $band['band_discogs_id'] = $datas['artists'][0]['id'];
            $release['country'] = $datas['country'];
            $release['released'] = $datas['released'];
            $release['year'] = $datas['year'];
            $release['label'] = $datas['labels'][0]['name'];
            $release['barcode'] = $datas['identifiers'][0]['value'];
            $release['format'] = $datas['formats'][0]['name'];
            $release['media'] = $datas['formats'][0]['qty'];
            $release['genre'] = $datas['styles'][0];  
            $release['nb_tracks'] = count($datas['tracklist']) ;
            // test band if band exist, if not download data from discogs

            $release['band_id'] = $this->Addcd_model->check_artist_discogs($release['band_id']);

            if ($release['band_id']==false) {
                $tmp = $this->discogs->discogs_artist_import($band['band_discogs_id']);
                $artist['name'] = $tmp['name'];
                $artist['profile'] = $tmp['profile'];
                $artist['urls'] = implode(";", $tmp['urls']);
                $i=0;
                foreach ($tmp['members'] as $member) {
                    $members[$i] = $member['name'];
                    $i++;
                }
                $artist['members'] = implode(";", $members);
                $artist['discogs_id'] = $tmp['id'];
                $this->Addcd_model->insert_artist($artist);
                $release['band_id'] = $this->Addcd_model->check_artist_discogs($artist['name']);
            }
            $release['title'] = htmlentities($release['title'], ENT_NOQUOTES, 'utf-8');
            $release['title'] = preg_replace("/&(.)(acute|cedil|circ|ring|tilde|uml|grave);/", "$1", $release['title']);
            $release['title']= strtolower($release['title']);
            $release['title'] = ucfirst($release['title']); 
            
            $this->Addcd_model->insert_man($release); // insert data to database
            $id = $this->Addcd_model->check_discogs_id($release['discogs_id']);

            $j=0;
            foreach ($datas['tracklist'] as $track) {
                $j++;
                    $tracks['album_id']=$id[0]['id'];
                    $tracks['id_track']=$track['position'];
                    $tracks['title']=$track['title'];
                    $tracks['duration']=$track['duration'];
                    $this->Addcd_model->insert_tracks($tracks);
            }  
            redirect('Cards/index/'.$id[0]['id']);
        }


}        
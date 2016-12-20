<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCd extends CI_Controller {

        public function __construct()
        {
                parent::__construct();               
                
                $this->load->library('session');
                $this->load->library('Musicbrainz');
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
            //print_r($tmp);die();
            $data['band_id'] = $tmp;
            $this->Addcd_model->insert_man($data);
            redirect('Albums/index/0');
        }

/************** add release by title **************************/

        public function release(){

            $this->load->helper('form');
            $this->load->view('templates/header');
            $this->load->view('addcd/release.php');
            $this->load->view('templates/footer.php');

        }

        public function release_list(){
            
            $album = $this->input->post('album');

            if (isset($album)) {
                $datas['albums'] = $this->musicbrainz->release_search($album);
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
            $this->load->model('Addcd_model');
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
            //print_r($_SESSION['album'][$i]['title']);die();
            $this->url_picture->capture($_SESSION['album'][$i]['brainz_album'],$_SESSION['album'][$i]['title']);
            redirect('Cards/index/'.$id[0]['id']);
        }


/********** Add with barcode **************************************/

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
            //print_r($_SESSION['album']['title']);die();
            $title = str_replace("'", "-", $_SESSION['album']['title']);
            $title = str_replace(" ", "-", $title);
            //print_r($title);die();
            $this->url_picture->coverdown($url,$title);
            redirect ('cards/index/'.$_SESSION['album']['id']);
            //print_r($_SESSION['album']);die();

        }
}        
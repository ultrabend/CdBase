<?php
class AddCd extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                
                $this->load->model('Addcd_model');
        }

        public function manual()
        {
        	$this->load->helper('form');
	        $this->load->view('templates/header');
			$this->load->view('manual');
			$this->load->view('templates/footer.php');
        }

        public function release(){

            $this->load->helper('form');
            $this->load->view('templates/header');
            $this->load->view('release.php');
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
            $this->load->view('release_list',$datas);
            $this->load->view('templates/footer.php');
        }

        public function save_release($id){
            $this->load->model('Addcd_model');
            $data = $this->musicbrainz->discsearch($id);
            print_r($data);die();

        }


        public function addman()
        {
        	$this->load->model('Addcd_model');     //model loaded
            $tmp = $this->input->post('album');
            if (isset($tmp)) {
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
            $band = $this->Addcd_model->check_artist($data['band_id']);
            if (isset($band['0']['id'])) {
                $data['band_id'] = $band['0']['id'];
            }
            else {
                $this->Addcd_model->insert_artist($data['band_id']);
                $tmp = $this->Addcd_model->check_artist($data['band_id']);
                $data['band_id'] = $tmp['0']['id'];
            }
            $this->Addcd_model->insert_man($data);
            redirect('Albums');
        }

        public function barcode(){

            $this->load->view('templates/header');
            //$this->load->view('catalog.php');
            $this->load->view('templates/footer.php');

        }


}        
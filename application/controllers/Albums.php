<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Albums_model');
        }

        public function index()
        {
                $datas['albums'] = $this->Albums_model->get_collection();
		$this->load->view('templates/header');
		$this->load->view('albums/catalog',$datas);
		$this->load->view('templates/footer.php');
        }

        public function by_artist()
        {
                $datas['artists'] = $this->Albums_model->get_artists();
                $this->load->view('templates/header');
                $this->load->view('albums/by_artist',$datas);
                $this->load->view('templates/footer.php');
        }
}

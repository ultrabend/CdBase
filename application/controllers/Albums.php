<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Albums_model');
                $this->lang->load('header', 'english');
        }

        public function index($page)
        {
                $datas['collection'] = $this->Albums_model->get_max();
                $max = count($datas['collection']);                
                unset($datas['collection']);
                $limit = 10;
                $datas['page'] = $page;
                $datas['albums'] = $this->Albums_model->get_collection($limit,$page);
                
                $this->load->library('pagination');
                $config['base_url'] = site_url('albums/index');
                $config['total_rows'] = $max;
                $config['per_page'] = $limit;
                $config['first_url'] = site_url('Albums/index/0');
                $config['next_link'] = "<img width=20px src='".base_url('assets/img/icons/arrow_right.png')."'>";
                $config['prev_link'] = "<img width=20px src='".base_url('assets/img/icons/arrow_left.png')."'>";
                $this->pagination->initialize($config);

		$this->load->view('templates/header');
		$this->load->view('albums/catalog',$datas);
		$this->load->view('templates/footer_collection');
        }

        public function by_artist()
        {
                $datas['artists'] = $this->Albums_model->get_artists();
                $this->load->view('templates/header');
                $this->load->view('albums/by_artist',$datas);
                $this->load->view('templates/footer');
        }
}

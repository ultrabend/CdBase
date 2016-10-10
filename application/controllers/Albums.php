<?php
class Albums extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Albums_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $datas['albums'] = $this->Albums_model->get_collection();
								$this->load->view('templates/header.php');
								$this->load->view('catalog.php',$datas);
								$this->load->view('templates/footer.php');
        }

}

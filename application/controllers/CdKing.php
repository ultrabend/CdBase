<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CdKing extends CI_Controller {

    public function __construct()
    {
        parent::__construct();               
    }

	public function index(){

		$this->load->helper('form');
		$this->load->view('templates/header');
        $this->load->view('ad_log');
        $this->load->view('templates/footer.php');
		
	}

	public function logged()
	{
		echo "test";
	}

}


 ?>
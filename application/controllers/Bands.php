<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/******************************
* class used for bands cards
******************************/
class Bands extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Bands_model');
		$this->lang->load('header', 'english');
	}

	public function index($id)
	{
		$id = urldecode($id);
		$datas['band'] = $this->Bands_model->get_band($id);
		$this->load->view('templates/header');
		$this->load->view('band',$datas);
		$this->load->view('templates/footer.php');
	}

}
 ?>
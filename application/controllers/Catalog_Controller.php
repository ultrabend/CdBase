<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog_Controller extends CI_Controller {

	public function index()
	{
		if ( ! file_exists(APPPATH.'views/catalog.php'))
			{
							// Whoops, we don't have a page for that!
							show_404();
			}
		$this->load->view('templates/header.php');
		$this->load->view('catalog.php');
		$this->load->view('templates/footer.php');
	}
}

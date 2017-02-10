<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/******************************
* class used for albums cards
******************************/
class Cards extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cards_model');
		$this->load->library('Url_picture');
		$this->lang->load('header', 'english');
	}

	public function index($id)
	{
       	$this->load->helper('form');
		$datas['album'] = $this->Cards_model->get_card($id);
		$datas['tracks'] = $this->Cards_model->get_tracks($id);
		$this->load->view('templates/header');
		$this->load->view('cards/card',$datas);
		$this->load->view('templates/footer_card.php');
	}

	public function delete($id){
		$this->db->delete('albums', array('id' => $id));
		$this->db->delete('tracks', array('album_id' => $id));
		redirect('Albums/index/0');
	}

	public function artist_bio($id){
		$datas['artist'] = $this->Cards_model->get_artist($id);
		$this->load->view('templates/header');
		$this->load->view('cards/artist_bio',$datas);
		$this->load->view('templates/footer.php');
	}
}
 ?>
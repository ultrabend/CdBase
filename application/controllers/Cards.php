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
		$this->load->library('session');
		$this->load->model('Cards_model');
	}

	public function index($id)
	{
		$datas['album'] = $this->Cards_model->get_card($id);
		$datas['tracks'] = $this->Cards_model->get_tracks($id);
		$this->load->view('templates/header');
		$this->load->view('card',$datas);
		$this->load->view('templates/footer.php');
	}

	public function delete($id){
		$this->db->delete('albums', array('id' => $id));
		$this->db->delete('tracks', array('album_id' => $id));
		redirect('Albums');
	}

	public function add_cover(){
		
	}
}
 ?>
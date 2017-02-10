<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**************************************
****  Artist **********************
************************/

class Artist extends CI_Controller
{
	
        public function __construct()
        {
                parent::__construct();               
   
                $this->load->model('Artists_model');
                $this->lang->load('header', 'english');
        }


        public function index(){
        	
        }
}

 ?>
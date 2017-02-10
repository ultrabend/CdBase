<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

        class Settings extends CI_Controller
        {
        	
                public function __construct()
                {
                        parent::__construct();               
                        $this->load->model('Settings_model');
                        $this->lang->load('header', 'english');
                }

                public function index()
                {
                        $this->load->view('templates/header');
                        $this->load->view('settings/options');
                        $this->load->view('templates/footer');
                }
        }

 ?>
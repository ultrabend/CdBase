<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->lang->load(array('header'),'english');
          $this->load->helper('form');
          $this->load->helper('html');
          $this->load->library('form_validation');
          $this->load->model('login_model');
     }

      public function index()
     {
          $username = $this->input->post("input-username");
          $password = $this->input->post("input-password");

          $this->form_validation->set_rules("input-username", "Username", "trim|required");
          $this->form_validation->set_rules("input-password", "Password", "trim|required");

          if ($this->form_validation->run() == TRUE)
          {
               if ($this->input->post('btn_login') == "Login")
               {
                    $usr_result = $this->login_model->get_user($username, $password);
                    if ($usr_result > 0)
                    {
                         $usr_data = $this->login_model->get_user_data($username, $password);
                         $sessiondata = array(
                              'username' => $username,
                              'language' => $usr_data[0]['language'],
                              'loginuser' => TRUE
                         );
                         $this->session->set_userdata($sessiondata);
                         redirect('Settings');
                    }
               }
               else
               {
                    redirect('Login');
               }
          }
          else
          {
               $this->load->view('templates/header');
               $this->load->view('login_view');
               $this->load->view('templates/footer');
               
          }
     }

     public function logoff()
     {
          $this->session->sess_destroy();
          redirect("Welcome");
     }

}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
     function __construct()
     {
          parent::__construct();
     }

     function get_user($usr, $pwd)
     {
          $sql = "select * from users where username = '" . $usr . "' and password = '" . md5($pwd) . "' and status = 'active'";
          $query = $this->db->query($sql);
          return $query->num_rows();
     }
          function get_user_data($usr, $pwd)
     {
          $sql = "select username,language from users where username = '" . $usr . "' and password = '" . md5($pwd) . "' and status = 'active'";
          $query = $this->db->query($sql);
          return $query->result_array();
     }
}?>
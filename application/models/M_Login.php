<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_Login extends CI_Model {
    function get_detail($username, $password) {
        $sql    = "SELECT * from admin where username='$username' and password='$password'";
        $query  = $this->db->query($sql);

        if($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}

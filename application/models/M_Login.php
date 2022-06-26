<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {
    function auth_admin($username, $password) {
		$query = $this->db->query("SELECT * FROM admin WHERE username='$username' AND password=MD5('$password') LIMIT 1");
		return $query;
	}

	function auth_anggota($username, $password) {
		$query = $this->db->query("SELECT * FROM anggota WHERE nik='$username' AND nik='$password' LIMIT 1");
		return $query;
	}
    
}

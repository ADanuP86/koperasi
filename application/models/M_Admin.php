<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {
	public function tampil_data() {
		$this->db->order_by('id_admin', 'DESC');
    	$query = $this->db->get('admin');
    	return $query->result();
	}

	public function edit_data($where, $table) {
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table) {
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	
}

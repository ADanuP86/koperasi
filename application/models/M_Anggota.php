<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Anggota extends CI_Model {
	public function tampil_data() {
		$this->db->order_by('id_anggota', 'DESC');
    	$query = $this->db->get('anggota');
    	return $query->result();
	}

	public function input_data($data, $table) {
		$this->db->insert($table, $data);
	}

	public function delete_data($where, $table) {
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit_data($where, $table) {
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table) {
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function anggota_status($status) {
		$this->db->order_by('id_anggota', 'DESC');
      	return  $this->db->get_where('anggota', $status);
    }
	
}

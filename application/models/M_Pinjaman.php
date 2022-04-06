<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pinjaman extends CI_Model {

	public function get($table, $data = null, $where = null)
        {
            if ($data != null) {
                return $this->db->get_where($table, $data)->row_array();
            } else {
                return $this->db->get_where($table, $where)->result_array();
            }
        }
	
	public function tampil_data() {
		return $this->db->get('pinjaman');
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

	public function join4table() {
      $this->db->select('*');
      $this->db->from('pinjaman');
      $this->db->join('jenis_pinjaman as a','a.id_jepin = pinjaman.id_jepin','LEFT');
      $this->db->join('anggota as b','b.id_anggota = pinjaman.idanggota','LEFT');
      $this->db->join('admin as c','c.id_admin = pinjaman.idadmin','LEFT');
      $query = $this->db->get();
      return $query;
   }
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pinjaman extends CI_Model {
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

    public function getSumTotalSimpanan() {
        $this->db->select_sum('besar_simpanan');
        $query = $this->db->get('simpanan');
        if ($query->num_rows() > 0) {
            return $query->row()->besar_simpanan;
        } else {
            return 0;
        }
    }
	
}

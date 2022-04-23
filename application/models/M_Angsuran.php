<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Angsuran extends CI_Model {
	public function joincekpinjaman() {
		$this->db->select('*');
		$this->db->order_by('id_pinjaman', 'DESC');
		$this->db->from('pinjaman');
		$this->db->join('admin as c','c.id_admin = pinjaman.idadmin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = pinjaman.idanggota','LEFT');
		$this->db->where('status_pinjaman', 'Belum Lunas');
		return $this->db->get()->result();
	}

	public function joincekangsur($id_pinjaman) {
		$this->db->select('*');
		$this->db->from('pinjaman');
		$this->db->join('admin as c','c.id_admin = pinjaman.idadmin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = pinjaman.idanggota','LEFT');
		$this->db->where('pinjaman.id_pinjaman', $id_pinjaman);
		return $this->db->get()->result();
	}

	public function joinangsuran($id_pinjaman) {
		$this->db->select('*');
		$this->db->from('angsuran');
		$this->db->join('pinjaman as a','a.id_pinjaman = angsuran.id_pinjaman','LEFT');
		$this->db->join('admin as c','c.id_admin = angsuran.idAdmin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = angsuran.idAnggota','LEFT');
		$this->db->where('angsuran.id_pinjaman', $id_pinjaman);
		return $this->db->get()->result();
	}

	public function joineditangsuran() {
		$this->db->select('*');
		$this->db->from('angsuran');
		$this->db->join('pinjaman as a','a.id_pinjaman = angsuran.id_pinjaman','LEFT');
		$this->db->join('admin as c','c.id_admin = angsuran.idAdmin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = angsuran.idAnggota','LEFT');
		return $this->db->get()->result();
	}

	public function count_angsur($id_pinjaman) {
		$this->db->select('id_pinjaman');
		$this->db->from('angsuran');
		$this->db->where('angsuran.id_pinjaman', $id_pinjaman);
		return $this->db->count_all_results();
	}

	public function selectpinjaman() {
		$this->db->order_by('id_pinjaman', 'DESC');
		$this->db->where('status_pinjaman', 'Belum Lunas');
		return $this->db->get('pinjaman')->result_array();
	}

	public function selectanggota() {
		$this->db->order_by('id_anggota', 'DESC');
		$this->db->where('status', 'Aktif');
		return $this->db->get('anggota')->result_array();
	}

	public function selectadmin() {
		$this->db->order_by('id_admin', 'DESC');
        return $this->db->get('admin')->result_array();
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
	
}

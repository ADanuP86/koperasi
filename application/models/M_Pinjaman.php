<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pinjaman extends CI_Model {
	public function join4table() {
		$this->db->select('*');
		$this->db->order_by('id_pinjaman', 'DESC');
		$this->db->from('pinjaman');
		//$this->db->join('jenis_pinjaman as a','a.id_jepin = pinjaman.id_jepin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = pinjaman.idanggota','LEFT');
		$this->db->join('admin as c','c.id_admin = pinjaman.idadmin','LEFT');
		return $this->db->get()->result();
	}
	
	public function selectanggota() {
		$this->db->order_by('id_anggota', 'DESC');
		$this->db->where('status', 'Aktif');
		return $this->db->get('anggota')->result_array();
	}

	/*public function selectjenis() {
		$this->db->order_by('id_jepin', 'DESC');
        return $this->db->get('jenis_pinjaman')->result_array();
    }*/

	public function selectadmin() {
		$this->db->order_by('id_admin', 'DESC');
        return $this->db->get('admin')->result_array();
    }

	public function joinbuktipinjaman($idanggota) {
		$this->db->select('*');
		//$this->db->order_by('id_pinjaman', 'DESC');
		$this->db->from('pinjaman');
		//$this->db->join('jenis_simpanan as a','a.id_jesim = simpanan.id_jesim','LEFT');
		$this->db->join('admin as c','c.id_admin = pinjaman.idadmin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = pinjaman.idanggota','LEFT');
		$this->db->where('b.id_anggota', $idanggota);
		return $this->db->get()->result();
	}

	public function pinjaman_statuslunas() {
		$this->db->select('*');
		$this->db->order_by('id_pinjaman', 'DESC');
		$this->db->from('pinjaman');
		//$this->db->join('jenis_pinjaman as a','a.id_jepin = pinjaman.id_jepin','LEFT');
		$this->db->join('admin as c','c.id_admin = pinjaman.idadmin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = pinjaman.idanggota','LEFT');
		$this->db->where('status_pinjaman', 'Lunas');
		return $this->db->get()->result();
	}

	public function pinjaman_statusbelumlunas() {
		$this->db->select('*');
		$this->db->order_by('id_pinjaman', 'DESC');
		$this->db->from('pinjaman');
		//$this->db->join('jenis_pinjaman as a','a.id_jepin = pinjaman.id_jepin','LEFT');
		$this->db->join('admin as c','c.id_admin = pinjaman.idadmin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = pinjaman.idanggota','LEFT');
		$this->db->where('status_pinjaman', 'Belum Lunas');
		return $this->db->get()->result();
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

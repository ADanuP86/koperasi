<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Angsuran extends CI_Model {
	public function joindataangsuran() {
		$this->db->select('*');
		$this->db->from('angsuran');
		$this->db->join('pinjaman as a','a.id_pinjaman = angsuran.id_pinjaman','LEFT');
		$this->db->join('admin as c','c.id_admin = angsuran.idAdmin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = angsuran.idAnggota','LEFT');
		return $this->db->get()->result();
	}

	public function tampil_by_date($tgl_awal, $tgl_akhir) {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
		$this->db->select('*');
		$this->db->from('angsuran');
		$this->db->join('pinjaman as a','a.id_pinjaman = angsuran.id_pinjaman','LEFT');
		$this->db->join('admin as c','c.id_admin = angsuran.idAdmin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = angsuran.idAnggota','LEFT');
		$this->db->where('DATE(tgl_angsur) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir); // Tambahkan where tanggal nya
		return $this->db->get()->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  	}

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

	public function joineditangsuran($id_angsuran) {
		$this->db->select('*');
		$this->db->from('angsuran');
		$this->db->join('pinjaman as a','a.id_pinjaman = angsuran.id_pinjaman','LEFT');
		$this->db->join('admin as c','c.id_admin = angsuran.idAdmin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = angsuran.idAnggota','LEFT');
		$this->db->where('angsuran.id_angsuran', $id_angsuran);
		return $this->db->get()->result();
	}

	public function count_angsur($id_pinjaman) {
		$this->db->select('id_pinjaman');
		$this->db->from('angsuran');
		$this->db->where('angsuran.id_pinjaman', $id_pinjaman);
		return $this->db->count_all_results();
	}

	public function count_jumlah($id_pinjaman) {
		$this->db->select('jumlah_angsur');
		$this->db->from('pinjaman');
		$this->db->where('pinjaman.id_pinjaman', $id_pinjaman);
		return $this->db->get()->row();
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

	function update_statuslunas($id_pinjaman) {
		$this->db->set('status_pinjaman', 'Lunas');
		$this->db->where('id_pinjaman', $id_pinjaman);
		$this->db->update('pinjaman');
	}

	function update_statusbelumlunas($id_pinjaman) {
		$this->db->set('status_pinjaman', 'Belum Lunas');
		$this->db->where('id_pinjaman', $id_pinjaman);
		$this->db->update('pinjaman');
	}
	
}

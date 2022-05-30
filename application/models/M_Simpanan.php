<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Simpanan extends CI_Model {
	public function join4table() {
		$this->db->select('*');
		$this->db->order_by('id_simpanan', 'DESC');
		$this->db->from('simpanan');
		$this->db->join('jenis_simpanan as a','a.id_jesim = simpanan.id_jesim','LEFT');
		$this->db->join('anggota as b','b.id_anggota = simpanan.id_anggota','LEFT');
		$this->db->join('admin as c','c.id_admin = simpanan.id_admin','LEFT');
		return $this->db->get()->result();
	}

	public function cari_pekerjaan($pekerjaan) {
		$this->db->select('*');
		$this->db->order_by('id_simpanan', 'DESC');
		$this->db->from('simpanan');
		$this->db->join('jenis_simpanan as a','a.id_jesim = simpanan.id_jesim','LEFT');
		$this->db->join('anggota as b','b.id_anggota = simpanan.id_anggota','LEFT');
		$this->db->join('admin as c','c.id_admin = simpanan.id_admin','LEFT');
		$this->db->where('b.pekerjaan', $pekerjaan);
		return $this->db->get()->result();
    }

	public function cari_status($status) {
		$this->db->select('*');
		$this->db->order_by('id_simpanan', 'DESC');
		$this->db->from('simpanan');
		$this->db->join('jenis_simpanan as a','a.id_jesim = simpanan.id_jesim','LEFT');
		$this->db->join('anggota as b','b.id_anggota = simpanan.id_anggota','LEFT');
		$this->db->join('admin as c','c.id_admin = simpanan.id_admin','LEFT');
		$this->db->where('b.status', $status);
		return $this->db->get()->result();
    }

	public function tampil_by_date($tgl_awal, $tgl_akhir) {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
		$this->db->select('*');
		$this->db->order_by('id_simpanan', 'DESC');
		$this->db->from('simpanan');
		$this->db->join('jenis_simpanan as a','a.id_jesim = simpanan.id_jesim','LEFT');
		$this->db->join('anggota as b','b.id_anggota = simpanan.id_anggota','LEFT');
		$this->db->join('admin as c','c.id_admin = simpanan.id_admin','LEFT');
		$this->db->where('DATE(tgl_simpan) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir); // Tambahkan where tanggal nya
		return $this->db->get()->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  	}

	public function tampil($tgl_awal, $tgl_akhir, $pekerjaan, $status) {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
		$this->db->select('*');
		$this->db->order_by('id_simpanan', 'DESC');
		$this->db->from('simpanan');
		$this->db->join('jenis_simpanan as a','a.id_jesim = simpanan.id_jesim','LEFT');
		$this->db->join('anggota as b','b.id_anggota = simpanan.id_anggota','LEFT');
		$this->db->join('admin as c','c.id_admin = simpanan.id_admin','LEFT');
        $this->db->where('DATE(tgl_masuk) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir);
		$this->db->where('b.pekerjaan', $pekerjaan);
		$this->db->where('b.status', $status); // Tambahkan where tanggal nya
    	return $this->db->get()->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  	}

	public function selectanggota() {
		$this->db->order_by('id_anggota', 'DESC');
        $this->db->where('status', 'Aktif');
        return $this->db->get('anggota')->result_array();
    }

	public function selectjenis() {
		$this->db->order_by('id_jesim', 'DESC');
        return $this->db->get('jenis_simpanan')->result_array();
    }

	public function selectadmin() {
		$this->db->order_by('id_admin', 'DESC');
        return $this->db->get('admin')->result_array();
    }

	public function joinceksimpanan($id_anggota) {
		$this->db->select('*');
		$this->db->order_by('id_simpanan', 'DESC');
		$this->db->from('simpanan');
		$this->db->join('jenis_simpanan as a','a.id_jesim = simpanan.id_jesim','LEFT');
		$this->db->join('admin as c','c.id_admin = simpanan.id_admin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = simpanan.id_anggota','LEFT');
		$this->db->where('b.id_anggota', $id_anggota);
		return $this->db->get()->result();
	}

	public function joinbuktisimpanan($id_simpanan) {
		$this->db->select('*');
		$this->db->from('simpanan');
		$this->db->join('jenis_simpanan as a','a.id_jesim = simpanan.id_jesim','LEFT');
		$this->db->join('admin as c','c.id_admin = simpanan.id_admin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = simpanan.id_anggota','LEFT');
		$this->db->where('simpanan.id_simpanan', $id_simpanan);
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

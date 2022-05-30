<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Anggota extends CI_Model {
	public function tampil_data() {
		$this->db->order_by('id_anggota', 'DESC');
    	$query = $this->db->get('anggota');
    	return $query->result();
	}

	public function tampil_pekerjaan() {
		$this->db->distinct();
		$this->db->select('pekerjaan');
		$query = $this->db->get('anggota');
		return $query->result();
	}

	public function cari_pekerjaan($pekerjaan) {
        $this->db->where('pekerjaan', $pekerjaan);
        return $this->db->get('anggota')->result();
    }

	public function cari_status($status) {
        $this->db->where('status', $status);
        return $this->db->get('anggota')->result();
    }

	public function tampil_by_date($tgl_awal, $tgl_akhir) {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
        $this->db->where('DATE(tgl_masuk) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir); // Tambahkan where tanggal nya
    	return $this->db->get('anggota')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  	}

	public function tampil($tgl_awal, $tgl_akhir, $pekerjaan, $status) {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
        $this->db->where('DATE(tgl_masuk) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir);
		$this->db->where('pekerjaan', $pekerjaan);
		$this->db->where('status', $status); // Tambahkan where tanggal nya
    	return $this->db->get('anggota')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
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

	//public function anggota_status($status) {
	//	$this->db->order_by('id_anggota', 'DESC');
      //	return $this->db->get_where('anggota', $status);
    //}

	public function anggota_status() {
		$this->db->order_by('id_anggota', 'DESC');
		$this->db->select('*');
		$this->db->from('anggota');
		return $this->db->get()->result();
		$this->db->where('DISTINCT','nama_anggota');
		return $this->db->get()->result();
	}
}

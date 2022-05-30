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

	public function joincekpinjaman($id_pinjaman) {
		$this->db->select('*');
		//$this->db->order_by('id_pinjaman', 'DESC');
		$this->db->from('angsuran');
		$this->db->join('anggota as b','b.id_anggota = angsuran.idAnggota','LEFT');
		$this->db->join('admin as c','c.id_admin = angsuran.idAdmin','LEFT');
		$this->db->join('pinjaman as a','a.id_pinjaman = angsuran.id_pinjaman','LEFT');
		$this->db->where('a.id_pinjaman', $id_pinjaman);
		return $this->db->get()->result();
	}

	public function cari_statuspinjam($status_pinjaman) {
		$this->db->select('*');
		$this->db->order_by('id_pinjaman', 'DESC');
		$this->db->from('pinjaman');
		$this->db->join('anggota as b','b.id_anggota = pinjaman.idanggota','LEFT');
		$this->db->join('admin as c','c.id_admin = pinjaman.idadmin','LEFT');
		$this->db->where('pinjaman.status_pinjaman', $status_pinjaman);
		return $this->db->get()->result();
	}

	public function tampil_by_date($tgl_awal, $tgl_akhir) {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
		$this->db->select('*');
		$this->db->order_by('id_pinjaman', 'DESC');
		$this->db->from('pinjaman');
		//$this->db->join('jenis_pinjaman as a','a.id_jepin = pinjaman.id_jepin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = pinjaman.idanggota','LEFT');
		$this->db->join('admin as c','c.id_admin = pinjaman.idadmin','LEFT');
		$this->db->where('DATE(tgl_pinjam) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir); // Tambahkan where tanggal nya
		return $this->db->get()->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  	}

	public function tampil($tgl_awal, $tgl_akhir, $status_pinjaman) {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
		$this->db->select('*');
		$this->db->order_by('id_pinjaman', 'DESC');
		$this->db->from('pinjaman');
		$this->db->join('anggota as b','b.id_anggota = pinjaman.idanggota','LEFT');
		$this->db->join('admin as c','c.id_admin = pinjaman.idadmin','LEFT');
		$this->db->where('DATE(tgl_pinjam) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir);
		$this->db->where('status_pinjaman', $status_pinjaman); // Tambahkan where tanggal nya
		return $this->db->get()->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
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

	public function joinbuktipinjaman($id_pinjaman) {
		$this->db->select('*');
		$this->db->from('pinjaman');
		$this->db->join('admin as c','c.id_admin = pinjaman.idadmin','LEFT');
		$this->db->join('anggota as b','b.id_anggota = pinjaman.idanggota','LEFT');
		$this->db->where('pinjaman.id_pinjaman', $id_pinjaman);
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

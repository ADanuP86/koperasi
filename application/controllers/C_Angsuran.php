<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Angsuran extends CI_Controller {
	function __construct() {
    	parent::__construct();
		$this->load->helper('Rupiah');
		$this->load->helper('Dateindo');
    	$this->load->model('M_Angsuran');
    }

	public function angsuran() {  
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
        $data['koperasi'] = $this->M_Angsuran->joincekpinjaman();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Angsuran/V_Angsuran', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_buktiangsuran($id_angsuran) {
		$this->load->library('mypdf');
		$data['angsuran'] = $this->M_Angsuran->joineditangsuran($id_angsuran);
		$this->mypdf->generate('Angsuran/Bukti_Angsuran', $data, 'Bukti_Angsuran_Anggota_Koperasi', 'A4', 'potrait');
	}

	public function cetak_buktilunas($id_angsuran) {
		$this->load->library('mypdf');
		$data['angsuran'] = $this->M_Angsuran->joineditangsuran($id_angsuran);
		$this->mypdf->generate('Angsuran/Bukti_Lunas', $data, 'Bukti_Angsuran_Lunas_Anggota_Koperasi', 'A4', 'potrait');
	}

	public function cek_angsur($id_pinjaman) {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$data['koperasi'] = $this->M_Angsuran->joincekangsur($id_pinjaman);
		$data['angsur'] = $this->M_Angsuran->joinangsuran($id_pinjaman);
		$data['total_angsur'] = $this->M_Angsuran->count_angsur($id_pinjaman);
		//$data['pinjaman'] = $this->M_Angsuran->selectpinjaman();
		//$data['anggota'] = $this->M_Angsuran->selectanggota();
		$data['adm'] = $this->M_Angsuran->selectadmin();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Angsuran/V_Angsur', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_angsuran($id_pinjaman) {
		$jumlah = $this->M_Angsuran->count_jumlah($id_pinjaman);
		foreach ($jumlah as $jml) {}

		$pinjaman = $this->M_Angsuran->joincekangsur($id_pinjaman);
		foreach ($pinjaman as $pjm) {
			$besar_pinjaman[] = $pjm->besar_pinjaman; 
			$total_besarpinjaman = $pjm->besar_pinjaman+$pjm->besar_pinjaman/100*$pjm->jasa;
		}

		$angsuran = $this->M_Angsuran->joinangsuran($id_pinjaman);
		foreach ($angsuran as $angs) {
			$arrBesarAngsuran[] = $angs->besar_angsuran; 
			$total_besarangsuran = array_sum($arrBesarAngsuran);
		}

		$total = $this->M_Angsuran->count_angsur($id_pinjaman);

		$id_angsuran = $this->input->post('id_angsuran');
		$tgl_angsur = $this->input->post('tgl_angsur');
		$id_pinjaman = $this->input->post('id_pinjaman');
		$angsuran_ke = $this->input->post('angsuran_ke');
		$besar_angsuran = $this->input->post('besar_angsuran');
		$idAnggota = $this->input->post('idAnggota');
		$idAdmin = $this->input->post('idAdmin');
	 
		$data = array(
			'tgl_angsur' => $tgl_angsur,
			'id_pinjaman' => $id_pinjaman,
			'angsuran_ke' => $angsuran_ke,
			'besar_angsuran' => $besar_angsuran,
			'idAnggota' => $idAnggota,
			'idAdmin' => $idAdmin
		);

		$total_besarangsuran = $total_besarangsuran+$besar_angsuran;

		if($total >= $jml) { //|| $total_besarangsuran > $total_besarpinjaman
			$this->session->set_flashdata('gagal', 'Data Yang Anda Masukkan Gagal, Melebihi Jumlah Angsuran.');
		}
		elseif($total_besarangsuran > $total_besarpinjaman) {
			$this->session->set_flashdata('gagal', 'Data Yang Anda Masukkan Gagal, Melebihi Pinjaman.');
		}
		else {
			$this->M_Angsuran->input_data($data, 'angsuran');
			$this->session->set_flashdata('tambah', 'Data Yang Anda Masukkan Berhasil.');
		}
		
		if($total_besarangsuran == $total_besarpinjaman) {
			$this->M_Angsuran->update_statuslunas($id_pinjaman);
		}

		redirect('C_Angsuran/cek_angsur/' . $id_pinjaman);
	}

	public function delete($id_angsuran) {
		$where = array('id_angsuran' => $id_angsuran);
		$this->M_Angsuran->delete_data($where, 'angsuran');
		$this->session->set_flashdata('hapus', 'Data Yang Anda Hapus Berhasil.');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function edit($id_angsuran) {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$data['angsur'] = $this->M_Angsuran->joineditangsuran($id_angsuran);
		$data['pinjaman'] = $this->M_Angsuran->selectpinjaman();
		$data['anggota'] = $this->M_Angsuran->selectanggota();
		$data['adm'] = $this->M_Angsuran->selectadmin();
		$where = array('id_angsuran' => $id_angsuran);
		$data['koperasi'] = $this->M_Angsuran->edit_data($where, 'angsuran')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Angsuran/Edit_Angsuran', $data);
		$this->load->view('templates/footer');
	}

	public function update($id_pinjaman) {
		//$jumlah = $this->M_Angsuran->count_jumlah($id_pinjaman);
		//foreach ($jumlah as $jml) {}

		$pinjaman = $this->M_Angsuran->joincekangsur($id_pinjaman);
		foreach ($pinjaman as $pjm) {
			$besar_pinjaman[] = $pjm->besar_pinjaman; 
			$total_besarpinjaman = $pjm->besar_pinjaman+$pjm->besar_pinjaman/100*$pjm->jasa;
		}

		$angsuran = $this->M_Angsuran->joinangsuran($id_pinjaman);
		foreach ($angsuran as $angs) {
			$arrBesarAngsuran[] = $angs->besar_angsuran; 
			$total_besarangsuran = array_sum($arrBesarAngsuran);
		}

		//$total = $this->M_Angsuran->count_angsur($id_pinjaman);

		$id_angsuran = $this->input->post('id_angsuran');
		$tgl_angsur = $this->input->post('tgl_angsur');
		$id_pinjaman = $this->input->post('id_pinjaman');
		$angsuran_ke = $this->input->post('angsuran_ke');
		$besar_angsuran = $this->input->post('besar_angsuran');
		$idAnggota = $this->input->post('idAnggota');
		$idAdmin = $this->input->post('idAdmin');
	 
		$data = array(
			'tgl_angsur' => $tgl_angsur,
			'id_pinjaman' => $id_pinjaman,
			'angsuran_ke' => $angsuran_ke,
			'besar_angsuran' => $besar_angsuran,
			'idAnggota' => $idAnggota,
			'idAdmin' => $idAdmin
		);

		$where = array(
			'id_angsuran' => $id_angsuran
		);
		
		$total_besarangsuran = $total_besarangsuran-$angs->besar_angsuran+$besar_angsuran;
		//$total_besarangsuran = $total_besarangsuran+$besar_angsuran;
		//var_dump($total_besarangsuran);
		//var_dump($total_besarangsurann);
		//var_dump($data);
		//die();

		//if($total >= $jml) { //|| $total_besarangsuran > $total_besarpinjaman
		//	$this->session->set_flashdata('gagal', 'Data Yang Anda Masukkan Gagal, Melebihi Jumlah Angsuran.');
		//}
		if($total_besarangsuran > $total_besarpinjaman) {
			$this->session->set_flashdata('gagal', 'Data Yang Anda Edit Gagal, Melebihi Jumlah Pinjaman.');
		}
		else {
			$this->M_Angsuran->update_data($where, $data, 'angsuran');
			$this->session->set_flashdata('tambah', 'Data Yang Anda Edit Berhasil.');
		}
		
		if($total_besarangsuran == $total_besarpinjaman) {
			$this->M_Angsuran->update_statuslunas($id_pinjaman);
		}
		if($total_besarangsuran < $total_besarpinjaman) {
			$this->M_Angsuran->update_statusbelumlunas($id_pinjaman);
		}

		redirect('C_Angsuran/cek_angsur/' . $id_pinjaman);
	}

	public function update2() {
		$id_angsuran = $this->input->post('id_angsuran');
		$tgl_angsur = $this->input->post('tgl_angsur');
		$id_pinjaman = $this->input->post('id_pinjaman');
		$angsuran_ke = $this->input->post('angsuran_ke');
		$besar_angsuran = $this->input->post('besar_angsuran');
		$idAnggota = $this->input->post('idAnggota');
		$idAdmin = $this->input->post('idAdmin');

		$data = array(
			'tgl_angsur' => $tgl_angsur,
			'id_pinjaman' => $id_pinjaman,
			'angsuran_ke' => $angsuran_ke,
			'besar_angsuran' => $besar_angsuran,
			'idAnggota' => $idAnggota,
			'idAdmin' => $idAdmin
		);

		$where = array(
			'id_angsuran' => $id_angsuran
		);

		$this->M_Angsuran->update_data($where, $data, 'angsuran');
		$this->session->set_flashdata('ubah', 'Data Yang Anda Ubah Berhasil.');
		redirect('C_Angsuran/cek_angsur/' . $id_pinjaman);
	}

}

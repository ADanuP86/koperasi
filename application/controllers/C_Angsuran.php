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
        $data['koperasi'] = $this->M_Angsuran->joincekpinjaman();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Angsuran/V_Angsuran', $data);
		$this->load->view('templates/footer');
	}

	public function cek_angsur($id_pinjaman) {
		$data['koperasi'] = $this->M_Angsuran->joincekangsur($id_pinjaman);
		$data['angsur'] = $this->M_Angsuran->joinangsuran($id_pinjaman);
		$data['total_angsur'] = $this->M_Angsuran->count_angsur($id_pinjaman);
		$data['pinjaman'] = $this->M_Angsuran->selectpinjaman();
		$data['anggota'] = $this->M_Angsuran->selectanggota();
		$data['admin'] = $this->M_Angsuran->selectadmin();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Angsuran/V_Angsur', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_angsuran($id_pinjaman) {
		$jumlah_angsur = $this->M_Angsuran->joincekangsur($id_pinjaman);
		$total_angsur = $this->M_Angsuran->count_angsur($id_pinjaman);
		if($total_angsur >= $jumlah_angsur) {
			$this->session->set_flashdata('gagal', 'Data Yang Anda Masukkan gagal.');
			redirect('C_Angsuran/cek_angsur/' . $id_pinjaman);
		} else {
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

		$this->M_Angsuran->input_data($data, 'angsuran');
		$this->session->set_flashdata('tambah', 'Data Yang Anda Masukkan Berhasil.');
		redirect('C_Angsuran/cek_angsur/' . $id_pinjaman);
		}
	}

	public function delete($id_angsuran) {
		$where = array('id_angsuran' => $id_angsuran);
		$this->M_Angsuran->delete_data($where, 'angsuran');
		$this->session->set_flashdata('hapus', 'Data Yang Anda Hapus Berhasil.');
		//redirect ('C_Angsuran/cek_angsur/' . $id_pinjaman);
	}

	public function edit($id_angsuran) {
		$data['angsur'] = $this->M_Angsuran->joineditangsuran();
		$data['pinjaman'] = $this->M_Angsuran->selectpinjaman();
		$data['anggota'] = $this->M_Angsuran->selectanggota();
		$data['admin'] = $this->M_Angsuran->selectadmin();
		$where = array('id_angsuran' => $id_angsuran);
		$data['koperasi'] = $this->M_Angsuran->edit_data($where, 'angsuran')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Angsuran/Edit_Angsuran', $data);
		$this->load->view('templates/footer');
	}

	public function update() {
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

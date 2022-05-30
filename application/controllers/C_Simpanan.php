<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Simpanan extends CI_Controller {
	function __construct() {
    	parent::__construct();
		$this->load->helper('Rupiah');
		$this->load->helper('Dateindo');
    	$this->load->model('M_Simpanan');
    }

	public function simpanan() {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$data['koperasi'] = $this->M_Simpanan->join4table();
		$data['jenis'] = $this->M_Simpanan->selectjenis();
		$data['anggota'] = $this->M_Simpanan->selectanggota();
		$data['adm'] = $this->M_Simpanan->selectadmin();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Simpanan/V_Simpanan', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_buktisimpanan($id_simpanan) {
		$this->load->library('mypdf');
		$data['simpanan'] = $this->M_Simpanan->joinbuktisimpanan($id_simpanan);
		$this->mypdf->generate('Simpanan/Bukti_Simpanan', $data, 'Bukti_Simpanan_Anggota_Koperasi', 'A4', 'potrait');
	}

	public function tambah_simpanan() {
		$id_simpanan = $this->input->post('id_simpanan');
		$tgl_simpan = $this->input->post('tgl_simpan');
		$id_jesim = $this->input->post('id_jesim');
		$id_anggota = $this->input->post('id_anggota');
		$id_admin = $this->input->post('id_admin');

		$data = array(
			'tgl_simpan' => $tgl_simpan,
			'id_jesim' => $id_jesim,
			'id_anggota' => $id_anggota,
			'id_admin' => $id_admin
		);

		$this->M_Simpanan->input_data($data, 'simpanan');
		$this->session->set_flashdata('tambah', 'Data Yang Anda Masukan Berhasil.');
		redirect('C_Simpanan/simpanan');
	}

	public function delete($id_simpanan) {
		$where = array('id_simpanan' => $id_simpanan);
		$this->M_Simpanan->delete_data($where, 'simpanan');
		$this->session->set_flashdata('hapus', 'Data Yang Anda Hapus Berhasil.');
		redirect ('C_Simpanan/simpanan');
	}

	public function edit($id_simpanan) {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$data['jenis'] = $this->M_Simpanan->selectjenis();
		$data['anggota'] = $this->M_Simpanan->selectanggota();
		$data['adm'] = $this->M_Simpanan->selectadmin();
		$where = array('id_simpanan' => $id_simpanan);
		$data['koperasi'] = $this->M_Simpanan->edit_data($where, 'simpanan')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Simpanan/Edit_Simpanan', $data);
		$this->load->view('templates/footer');
	}

	public function update() {
		$id_simpanan = $this->input->post('id_simpanan');
		$tgl_simpan = $this->input->post('tgl_simpan');
		$id_jesim = $this->input->post('id_jesim');
		$id_anggota = $this->input->post('id_anggota');
		$id_admin = $this->input->post('id_admin');

		$data = array(
			'tgl_simpan' => $tgl_simpan,
			'id_jesim' => $id_jesim,
			'id_anggota' => $id_anggota,
			'id_admin' => $id_admin
		);

		$where = array(
			'id_simpanan' => $id_simpanan
		);

		$this->M_Simpanan->update_data($where, $data, 'simpanan');
		$this->session->set_flashdata('ubah', 'Data Yang Anda Ubah Berhasil.');
		redirect('C_Simpanan/simpanan');
	}

}

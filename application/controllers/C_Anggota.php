<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Anggota extends CI_Controller {
	function __construct() {
      parent::__construct();   
      $this->load->model('M_Anggota');
	  $this->load->helper('Dateindo');
   }

	public function anggota() {
		$data['koperasi'] = $this->M_Anggota->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('V_Anggota', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_anggota() {
		$id_anggota = $this->input->post('id_anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$nik = $this->input->post('nik');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$pekerjaan = $this->input->post('pekerjaan');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$no_telpon = $this->input->post('no_telpon');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$status = $this->input->post('status');

		$data = array(
			'nama_anggota' => $nama_anggota,
			'nik' => $nik,
			'tgl_lahir' => $tgl_lahir,
			'tempat_lahir' => $tempat_lahir,
			'pekerjaan' => $pekerjaan,
			'jenis_kelamin' => $jenis_kelamin,
			'no_telpon' => $no_telpon,
			'tgl_masuk' => $tgl_masuk,
			'status' => $status
		);

		$this->M_Anggota->input_data($data, 'anggota');
		$this->session->set_flashdata('tambah', 'Data Yang Anda Masukan Berhasil.');
		redirect('C_Anggota/anggota');
	}

	public function delete($id_anggota) {
		$where = array('id_anggota' => $id_anggota);
		$this->M_Anggota->delete_data($where, 'anggota');
		$this->session->set_flashdata('hapus', 'Data Yang Anda Hapus Berhasil.');
		redirect ('C_Anggota/anggota');
	}

	public function edit($id_anggota) {
		$where = array('id_anggota' => $id_anggota);
		$data['koperasi'] = $this->M_Anggota->edit_data($where, 'anggota')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Edit_Anggota', $data);
		$this->load->view('templates/footer');
	}

	public function update() {
		$id_anggota = $this->input->post('id_anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$nik = $this->input->post('nik');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$pekerjaan = $this->input->post('pekerjaan');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$no_telpon = $this->input->post('no_telpon');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$status = $this->input->post('status');

		$data = array(
			'nama_anggota' => $nama_anggota,
			'nik' => $nik,
			'tgl_lahir' => $tgl_lahir,
			'tempat_lahir' => $tempat_lahir,
			'pekerjaan' => $pekerjaan,
			'jenis_kelamin' => $jenis_kelamin,
			'no_telpon' => $no_telpon,
			'tgl_masuk' => $tgl_masuk,
			'status' => $status
		);

		$where = array(
			'id_anggota' => $id_anggota
		);

		$this->M_Anggota->update_data($where, $data, 'anggota');
		$this->session->set_flashdata('ubah', 'Data Yang Anda Ubah Berhasil.');
		redirect('C_Anggota/anggota');
	}

}

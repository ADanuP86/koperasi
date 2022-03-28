<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pinjaman extends CI_Controller {

	function __construct() {
      parent::__construct();   
      $this->load->model('M_Pinjaman');
   }

	public function pinjaman() {
		$data['koperasi'] = $this->M_Pinjaman->join4table()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('V_Pinjaman', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_simpanan() {
		$id_anggota = $this->input->post('id_anggota');
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$pekerjaan = $this->input->post('pekerjaan');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$no_telpon = $this->input->post('no_telpon');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$status = $this->input->post('status');

		$data = array(
			'nama' => $nama,
			'nik' => $nik,
			'tgl_lahir' => $tgl_lahir,
			'tempat_lahir' => $tempat_lahir,
			'pekerjaan' => $pekerjaan,
			'jenis_kelamin' => $jenis_kelamin,
			'no_telpon' => $no_telpon,
			'tgl_masuk' => $tgl_masuk,
			'status' => $status
		);

		$this->M_Simpanan->input_data($data, 'simpanan');
		redirect('C_Simpanan/simpanan');
	}

	public function delete($id_simpanan) {
		$where = array('id_simpanan' => $id_simpanan);
		$this->M_Simpanan->delete_data($where, 'simpanan');
		redirect ('C_Simpanan/simpanan');
	}

	public function edit($id_simpanan) {
		$where = array('id_simpanan' => $id_simpanan);
		$data['koperasi'] = $this->M_Simpanan->edit_data($where, 'simpanan')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Edit_Simpanan', $data);
		$this->load->view('templates/footer');
	}

	public function update() {
		$id_anggota = $this->input->post('id_anggota');
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$pekerjaan = $this->input->post('pekerjaan');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$no_telpon = $this->input->post('no_telpon');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$status = $this->input->post('status');

		$data = array(
			'nama' => $nama,
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
			'id_simpanan' => $id_simpanan
		);

		$this->M_Simpanan->update_data($where, $data, 'simpanan');
		redirect('C_Simpanan/simpanan');
	}

}

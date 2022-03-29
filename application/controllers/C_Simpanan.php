<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Simpanan extends CI_Controller {

	function __construct() {
      parent::__construct();   
      $this->load->model('M_Simpanan');
   }

	public function simpanan() {
		$data['koperasi'] = $this->M_Simpanan->join4table()->result();
		$data['jenis'] = $this->M_Simpanan->get('jenis_simpanan');
		$data['anggota'] = $this->M_Simpanan->get('anggota');
		$data['admin'] = $this->M_Simpanan->get('admin');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('V_Simpanan', $data);
		$this->load->view('templates/footer');
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
		redirect('C_Simpanan/simpanan');
	}

	public function delete($id_simpanan) {
		$where = array('id_simpanan' => $id_simpanan);
		$this->M_Simpanan->delete_data($where, 'simpanan');
		redirect ('C_Simpanan/simpanan');
	}

	public function edit($id_simpanan) {
		$data['jenis'] = $this->M_Simpanan->get('jenis_simpanan');
		$data['anggota'] = $this->M_Simpanan->get('anggota');
		$data['admin'] = $this->M_Simpanan->get('admin');
		$where = array('id_simpanan' => $id_simpanan);
		$data['koperasi'] = $this->M_Simpanan->edit_data($where, 'simpanan')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Edit_Simpanan', $data);
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
		redirect('C_Simpanan/simpanan');
	}

}

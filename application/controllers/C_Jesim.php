<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Jesim extends CI_Controller {

	function __construct() {
      parent::__construct();
	  $this->load->helper('Rupiah');
	  $this->load->helper('Dateindo');
      $this->load->model('M_Jesim');
   }

   public function jesim() {
		$data['koperasi'] = $this->M_Jesim->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('V_Jesim', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_jesim() {
		$id_jesim = $this->input->post('id_jesim');
		$nama_simpanan = $this->input->post('nama_simpanan');
		$tgl_input = $this->input->post('tgl_input');
		$besar_simpanan = $this->input->post('besar_simpanan');

		$data = array(
			'nama_simpanan' => $nama_simpanan,
			'tgl_input' => $tgl_input,
			'besar_simpanan' => $besar_simpanan
		);

		$this->M_Jesim->input_data($data, 'jenis_simpanan');
		$this->session->set_flashdata('tambah', 'Data Yang Anda Masukan Berhasil.');
		redirect('C_Jesim/jesim');
	}

	public function delete($id_jesim) {
		$where = array('id_jesim' => $id_jesim);
		$this->M_Jesim->delete_data($where, 'jenis_simpanan');
		$this->session->set_flashdata('hapus', 'Data Yang Anda Hapus Berhasil.');
		redirect ('C_Jesim/jesim');
	}

	public function edit($id_jesim) {
		$where = array('id_jesim' => $id_jesim);
		$data['koperasi'] = $this->M_Jesim->edit_data($where, 'jenis_simpanan')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Edit_Jesim', $data);
		$this->load->view('templates/footer');
	}

	public function update() {
		$id_jesim = $this->input->post('id_jesim');
		$nama_simpanan = $this->input->post('nama_simpanan');
		$tgl_input = $this->input->post('tgl_input');
		$besar_simpanan = $this->input->post('besar_simpanan');

		$data = array(
			'nama_simpanan' => $nama_simpanan,
			'tgl_input' => $tgl_input,
			'besar_simpanan' => $besar_simpanan
		);

		$where = array(
			'id_jesim' => $id_jesim
		);

		$this->M_Jesim->update_data($where, $data, 'jenis_simpanan');
		$this->session->set_flashdata('ubah', 'Data Yang Anda Ubah Berhasil.');
		redirect('C_Jesim/jesim');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Jepin extends CI_Controller {
	function __construct() {
    	parent::__construct();
		$this->load->helper('Rupiah');
		$this->load->helper('Dateindo');
    	$this->load->model('M_Jepin');
	}

   	public function jepin() {
		$data['koperasi'] = $this->M_Jepin->tampil_data();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Jepin/V_Jepin', $data);
		$this->load->view('templates/footer');
	}

	public function tambah() {
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Jepin/Tambah_Jepin');
		$this->load->view('templates/footer');
	}

	public function tambah_jepin() {
		$this->form_validation->set_rules('nama_pinjaman', 'Nama Pinjaman', 'required|max_length[10]|is_unique[jenis_pinjaman.nama_pinjaman]');
        $this->form_validation->set_rules('besar_pinjaman', 'Besar Pinjaman', 'required|max_length[11]|is_unique[jenis_pinjaman.besar_pinjaman]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('Jepin/Tambah_Jepin');
			$this->load->view('templates/footer');
        } else {
		$id_jepin = $this->input->post('id_jepin');
		$nama_pinjaman = $this->input->post('nama_pinjaman');
		$tgl_input = $this->input->post('tgl_input');
		$besar_pinjaman = $this->input->post('besar_pinjaman');
		$jasa = $this->input->post('jasa');

		$data = array(
			'nama_pinjaman' => $nama_pinjaman,
			'tgl_input' => $tgl_input,
			'besar_pinjaman' => $besar_pinjaman,
			'jasa' => $jasa
		);

		$this->M_Jepin->input_data($data, 'jenis_pinjaman');
		$this->session->set_flashdata('tambah', 'Data Yang Anda Masukan Berhasil.');
		redirect('C_Jepin/jepin');
		}
	}

	public function delete($id_jepin) {
        $where = array('id_jepin' => $id_jepin);
        $this->M_Jepin->delete_data($where, 'jenis_pinjaman');
        $error = $this->db->error();
        if ($error['code'] !=0) {
            $this->session->set_flashdata('hapus', 'Data Memiliki Transaksi, Gagal Terhapus.');
            redirect('C_Jepin/jepin');
        } else {
            $this->session->set_flashdata('hapus', 'Data Yang Anda Hapus Berhasil.');
            redirect('C_Jepin/jepin');
        }
    }

	public function edit($id_jepin) {
		$where = array('id_jepin' => $id_jepin);
		$data['koperasi'] = $this->M_Jepin->edit_data($where, 'jenis_pinjaman')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Jepin/Edit_Jepin', $data);
		$this->load->view('templates/footer');
	}

	public function update() {
		$id_jepin = $this->input->post('id_jepin');
		$nama_pinjaman = $this->input->post('nama_pinjaman');
		$tgl_input = $this->input->post('tgl_input');
		$besar_pinjaman = $this->input->post('besar_pinjaman');
		$jasa = $this->input->post('jasa');

		$data = array(
			'nama_pinjaman' => $nama_pinjaman,
			'tgl_input' => $tgl_input,
			'besar_pinjaman' => $besar_pinjaman,
			'jasa' => $jasa
		);

		$where = array(
			'id_jepin' => $id_jepin
		);

		$this->M_Jepin->update_data($where, $data, 'jenis_pinjaman');
		$this->session->set_flashdata('ubah', 'Data Yang Anda Ubah Berhasil.');
		redirect('C_Jepin/jepin');
	}

}

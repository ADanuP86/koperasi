<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pinjaman extends CI_Controller {
	function __construct() {
    	parent::__construct();
		$this->load->helper('Rupiah');
		$this->load->helper('Dateindo');
    	$this->load->model('M_Pinjaman');
    }

	public function pinjaman() {
		$data['koperasi'] = $this->M_Pinjaman->join4table();
		//$data['jenis'] = $this->M_Pinjaman->selectjenis();
		$data['anggota'] = $this->M_Pinjaman->selectanggota();
		$data['admin'] = $this->M_Pinjaman->selectadmin();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Pinjaman/V_Pinjaman', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_buktipinjaman($idanggota) {
		$this->load->library('mypdf');
		$data['pinjaman'] = $this->M_Pinjaman->joinbuktipinjaman($idanggota);
		$this->mypdf->generate('Pinjaman/Bukti_Pinjaman', $data, 'Bukti_Pinjaman_Anggota_Koperasi', 'A4', 'landscape');
	}

	public function tambah_pinjaman() {
		$id_pinjaman = $this->input->post('id_pinjaman');
		$tgl_pinjam = $this->input->post('tgl_pinjam');
		$besar_pinjaman = $this->input->post('besar_pinjaman');
		$jasa = $this->input->post('jasa');
		$jumlah_angsur = $this->input->post('jumlah_angsur');
		$tgl_tempo = $this->input->post('tgl_tempo');
		$status_pinjaman = $this->input->post('status_pinjaman');
		$idanggota = $this->input->post('idanggota');
		$idadmin = $this->input->post('idadmin');

		$data = array(
			'tgl_pinjam' => $tgl_pinjam,
			'besar_pinjaman' => $besar_pinjaman,
			'jasa' => $jasa,
			'jumlah_angsur' => $jumlah_angsur,
			'tgl_tempo' => $tgl_tempo,
			'status_pinjaman' => $status_pinjaman,
			'idanggota' => $idanggota,
			'idadmin' => $idadmin
		);

		$this->M_Pinjaman->input_data($data, 'pinjaman');
		$this->session->set_flashdata('tambah', 'Data Yang Anda Masukan Berhasil.');
		redirect('C_Pinjaman/pinjaman');
	}

	public function delete($id_pinjaman) {
		$where = array('id_pinjaman' => $id_pinjaman);
		$this->M_Pinjaman->delete_data($where, 'pinjaman');
		$this->session->set_flashdata('hapus', 'Data Yang Anda Hapus Berhasil.');
		redirect ('C_Pinjaman/pinjaman');
	}

	public function edit($id_pinjaman) {
		//$data['jenis'] = $this->M_Pinjaman->selectjenis();
		$data['anggota'] = $this->M_Pinjaman->selectanggota();
		$data['admin'] = $this->M_Pinjaman->selectadmin();
		$where = array('id_pinjaman' => $id_pinjaman);
		$data['koperasi'] = $this->M_Pinjaman->edit_data($where, 'pinjaman')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Pinjaman/Edit_Pinjaman', $data);
		$this->load->view('templates/footer');
	}

	public function update() {
		$id_pinjaman = $this->input->post('id_pinjaman');
		$tgl_pinjam = $this->input->post('tgl_pinjam');
		$besar_pinjaman = $this->input->post('besar_pinjaman');
		$jasa = $this->input->post('jasa');
		$jumlah_angsur = $this->input->post('jumlah_angsur');
		$tgl_tempo = $this->input->post('tgl_tempo');
		$status_pinjaman = $this->input->post('status_pinjaman');
		$idanggota = $this->input->post('idanggota');
		$idadmin = $this->input->post('idadmin');

		$data = array(
			'tgl_pinjam' => $tgl_pinjam,
			'besar_pinjaman' => $besar_pinjaman,
			'jasa' => $jasa,
			'jumlah_angsur' => $jumlah_angsur,
			'tgl_tempo' => $tgl_tempo,
			'status_pinjaman' => $status_pinjaman,
			'idanggota' => $idanggota,
			'idadmin' => $idadmin
		);

		$where = array(
			'id_pinjaman' => $id_pinjaman
		);

		$this->M_Pinjaman->update_data($where, $data, 'pinjaman');
		$this->session->set_flashdata('ubah', 'Data Yang Anda Ubah Berhasil.');
		redirect('C_Pinjaman/pinjaman');
	}

}

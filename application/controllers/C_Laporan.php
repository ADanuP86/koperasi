<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Laporan extends CI_Controller {

	function __construct() {
      parent::__construct();   
      $this->load->model('M_Anggota');
	  $this->load->model('M_Simpanan');
   }

	public function data_anggota() {
		$data['koperasi'] = $this->M_Anggota->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Data_Anggota', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_anggota() {
    $this->load->library('mypdf');
    $data['anggota'] = $this->M_Anggota->tampil_data()->result();
    $this->mypdf->generate('Laporan_Anggota', $data, 'Data_Laporan_Anggota_Koperasi', 'A4', 'landscape');
  }

	public function data_simpanan() {
		$data['koperasi'] = $this->M_Simpanan->join4table()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Data_Simpanan', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_simpanan() {
		$this->load->library('mypdf');
		$data['simpanan'] = $this->M_Simpanan->join4table()->result();
		$this->mypdf->generate('Laporan_Simpanan', $data, 'Data_Laporan_Simpanan_Koperasi', 'A4', 'landscape');
	  }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Laporan extends CI_Controller {

	function __construct() {
      parent::__construct();   
      $this->load->model('M_Anggota');
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

}

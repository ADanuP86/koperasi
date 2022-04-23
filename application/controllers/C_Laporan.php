<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Laporan extends CI_Controller {
	function __construct() {
    	parent::__construct();
		$this->load->helper('Dateindo');
		$this->load->helper('Rupiah');
		$this->load->model('M_Beranda');
    	$this->load->model('M_Anggota');
		$this->load->model('M_Simpanan');
		$this->load->model('M_Pinjaman');
		$this->load->model('M_Angsuran');
    }

	public function data_anggota() {
		$data['koperasi'] = $this->M_Anggota->tampil_data();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Anggota/Data_Anggota', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_anggota() {
		$this->load->library('mypdf');
		$data['anggota'] = $this->M_Anggota->tampil_data();
		$this->mypdf->generate('Laporan_Anggota/Laporan_Anggota', $data, 'Data_Laporan_Anggota_Koperasi', 'A4', 'landscape');
	}

	public function anggota_aktif() {
		$status = array('status' => 'Aktif');              
        $data['koperasi'] = $this->M_Anggota->anggota_status($status)->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Anggota/Anggota_Aktif', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_aktif() {
		$this->load->library('mypdf');
		$status = array('status' => 'Aktif');              
        $data['anggota'] = $this->M_Anggota->anggota_status($status)->result();
		$this->mypdf->generate('Laporan_Anggota/Laporan_Anggota', $data, 'Data_Anggota_Aktif_Koperasi', 'A4', 'landscape');
	}

	public function anggota_nonaktif() {
		$status = array('status' => 'Non-aktif');              
        $data['koperasi'] = $this->M_Anggota->anggota_status($status)->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Anggota/Anggota_Nonaktif', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_nonaktif() {
		$this->load->library('mypdf');
		$status = array('status' => 'Non-aktif');              
        $data['anggota'] = $this->M_Anggota->anggota_status($status)->result();
		$this->mypdf->generate('Laporan_Anggota/Laporan_Anggota', $data, 'Data_Anggota_Nonaktif_Koperasi', 'A4', 'landscape');
	}

	public function data_simpanan() {
		$data['total_simpanan'] = $this->M_Beranda->hitungJumlahSimpanan();
		$data['koperasi'] = $this->M_Simpanan->join4table();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Simpanan/Data_Simpanan', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_simpanan() {
		$this->load->library('mypdf');
		$data['total_simpanan'] = $this->M_Beranda->hitungJumlahSimpanan();
		$data['simpanan'] = $this->M_Simpanan->join4table();
		$this->mypdf->generate('Laporan_Simpanan/Laporan_Simpanan', $data, 'Data_Laporan_Simpanan_Koperasi', 'A4', 'landscape');
	}

	public function simpanan_anggotaaktif() {
		$status = array('status' => 'Aktif');              
        $data['koperasi'] = $this->M_Anggota->anggota_status($status)->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Simpanan/Simpanan_Anggotaaktif', $data);
		$this->load->view('templates/footer');
	}

	public function cek_simpananaktif($id_anggota) {
		$data['koperasi'] = $this->M_Simpanan->joinceksimpanan($id_anggota);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Simpanan/Cek_Simpananaktif', $data);
		$this->load->view('templates/footer');
	}

	public function simpanan_anggotanonaktif() {
		$status = array('status' => 'Non-aktif');              
        $data['koperasi'] = $this->M_Anggota->anggota_status($status)->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Simpanan/Simpanan_Anggotanonaktif', $data);
		$this->load->view('templates/footer');
	}

	public function cek_simpanannonaktif($id_anggota) {
		$data['koperasi'] = $this->M_Simpanan->joinceksimpanan($id_anggota);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Simpanan/Cek_Simpanannonaktif', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_ceksimpanan($id_anggota) {
		$this->load->library('mypdf');
		$data['ceksimpanan'] = $this->M_Simpanan->joinceksimpanan($id_anggota);
		$this->mypdf->generate('Laporan_Simpanan/Laporan_CekSimpanan', $data, 'Data_Laporan_Simpanan_Anggota_Koperasi', 'A4', 'landscape');
	}

	public function data_pinjaman() {
		$data['total_pinjaman'] = $this->M_Beranda->hitungJumlahPinjaman();
		$data['koperasi'] = $this->M_Pinjaman->join4table();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Pinjaman/Data_Pinjaman', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_pinjaman() {
		$this->load->library('mypdf');
		$data['total_pinjaman'] = $this->M_Beranda->hitungJumlahPinjaman();
		$data['pinjaman'] = $this->M_Pinjaman->join4table();
		$this->mypdf->generate('Laporan_Pinjaman/Laporan_Pinjaman', $data, 'Data_Laporan_Pinjaman_Koperasi', 'A4', 'landscape');
	}

	public function pinjaman_lunas() {   
        $data['koperasi'] = $this->M_Pinjaman->pinjaman_statuslunas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Pinjaman/Pinjaman_Lunas', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_pinjamanlunas() {
		$this->load->library('mypdf');
		$data['pinjaman'] = $this->M_Pinjaman->pinjaman_statuslunas();
		$this->mypdf->generate('Laporan_Pinjaman/Laporan_Pinjamanstatus', $data, 'Data_Laporan_Pinjaman_Lunas_Koperasi', 'A4', 'landscape');
	}

	public function pinjaman_belumlunas() {    
        $data['koperasi'] = $this->M_Pinjaman->pinjaman_statusbelumlunas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Pinjaman/Pinjaman_Belumlunas', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_pinjamanbelumlunas() {
		$this->load->library('mypdf');
		$data['pinjaman'] = $this->M_Pinjaman->pinjaman_statusbelumlunas();
		$this->mypdf->generate('Laporan_Pinjaman/Laporan_Pinjamanstatus', $data, 'Data_Laporan_Pinjaman_Belum_Lunas_Koperasi', 'A4', 'landscape');
	}

	public function data_angsuran() {
		$data['total_angsuran'] = $this->M_Beranda->hitungJumlahAngsuran();
		$data['koperasi'] = $this->M_Angsuran->join4table();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Laporan_Angsuran/Data_Angsuran', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_angsuran() {
		$this->load->library('mypdf');
		$data['total_angsuran'] = $this->M_Beranda->hitungJumlahAngsuran();
		$data['angsuran'] = $this->M_Angsuran->join4table();
		$this->mypdf->generate('Laporan_Angsuran/Laporan_Angsuran', $data, 'Data_Laporan_Angsuran_Koperasi', 'A4', 'landscape');
	}

}

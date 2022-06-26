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
		$pekerjaan = $this->input->get('pekerjaan');
		$status = $this->input->get('status');
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_akhir sesuai input (kalau tidak ada set kosong)

		if(empty($tgl_awal) or empty($tgl_akhir) or empty($pekerjaan) or empty($status)) { // Cek jika semua kosong, maka :
			$data['anggota'] = $this->M_Anggota->tampil_data();  // Panggil fungsi view_all yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		else { // Jika terisi
			$data['anggota'] = $this->M_Anggota->tampil($tgl_awal, $tgl_akhir, $pekerjaan, $status);  // Panggil fungsi tampil yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
            //$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            //$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            //$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
		if(isset($tgl_awal) or isset($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir ada, maka :
			$data['anggota'] = $this->M_Anggota->tampil_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi tampil_by_date yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		if(isset($pekerjaan)) { // Cek jika pekerjaan ada, maka :
			$data['anggota'] = $this->M_Anggota->cari_pekerjaan($pekerjaan);  // Panggil fungsi cari_pekerjaan yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		if(isset($status)) { // Cek jika status ada, maka :
			$data['anggota'] = $this->M_Anggota->cari_status($status);  // Panggil fungsi vari_status yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		
		$data['get_pekerjaan'] = $this->M_Anggota->tampil_pekerjaan();
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Laporan_Anggota/Data_Anggota', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_anggota() {
		$this->load->library('mypdf');
		$pekerjaan = $this->input->get('pekerjaan');
		$status = $this->input->get('status');
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_akhir sesuai input (kalau tidak ada set kosong)

		if(empty($tgl_awal) or empty($tgl_akhir) or empty($pekerjaan) or empty($status)) { // Cek jika semua kosong, maka :
			$data['anggota'] = $this->M_Anggota->tampil_data();  // Panggil fungsi tampil_data yang ada di TransaksiModel
            //$label = 'Semua Data Transaksi';
        }
		else { // Jika terisi
			$data['anggota'] = $this->M_Anggota->tampil($tgl_awal, $tgl_akhir, $pekerjaan, $status);  // Panggil fungsi tampil yang ada di TransaksiModel
            // $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            // $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            // $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
			// $data['label'] = $label;
        }
		if(isset($tgl_awal) or isset($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir ada, maka :
			$data['anggota'] = $this->M_Anggota->tampil_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi tampil_by_date yang ada di TransaksiModel
			// $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            // $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            // $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
			// $data['label'] = $label;
        }
		if(isset($pekerjaan)) { // Cek jika pekerjaan ada, maka :
			$data['anggota'] = $this->M_Anggota->cari_pekerjaan($pekerjaan);  // Panggil fungsi cari_pekerjaan yang ada di TransaksiModel
            // $label = 'Pekerjaan '.$pekerjaan;
			// $data['label'] = $label;
        }
		if(isset($status)) { // Cek jika status ada, maka :
			$data['anggota'] = $this->M_Anggota->cari_status($status);  // Panggil fungsi view_all yang ada di TransaksiModel
            // $label = 'Status '.$status;
			// $data['label'] = $label;
        }

		$this->mypdf->generate('Laporan_Anggota/Laporan_Anggota', $data, 'Data_Laporan_Anggota_Koperasi', 'A4', 'potrait');
	}

	public function cetak_semuaanggota() {
		$this->load->library('mypdf');       
        $data['anggota'] = $this->M_Anggota->tampil_data();
		$this->mypdf->generate('Laporan_Anggota/Laporan_Anggota', $data, 'Data_Semua_Anggota_Koperasi', 'A4', 'potrait');
	}

	public function anggota_aktif() {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$status = array('status' => 'Aktif');              
        $data['koperasi'] = $this->M_Anggota->anggota_status($status)->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
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
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$status = array('status' => 'Non-aktif');              
        $data['koperasi'] = $this->M_Anggota->anggota_status($status)->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
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
		$pekerjaan = $this->input->get('pekerjaan');
		$status = $this->input->get('status');
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_akhir sesuai input (kalau tidak ada set kosong)

		if(empty($tgl_awal) or empty($tgl_akhir) or empty($pekerjaan) or empty($status)) { // Cek jika semua kosong, maka :
			$data['sim'] = $this->M_Simpanan->join4table();  // Panggil fungsi joint4table yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		else { // Jika terisi
			$data['sim'] = $this->M_Simpanan->tampil($tgl_awal, $tgl_akhir, $pekerjaan, $status);  // Panggil fungsi tampil yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
            //$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            //$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            //$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
		if(isset($tgl_awal) or isset($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir ada, maka :
			$data['sim'] = $this->M_Simpanan->tampil_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi tampil_by_date yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		if(isset($pekerjaan)) { // Cek jika pekerjaan ada, maka :
			$data['sim'] = $this->M_Simpanan->cari_pekerjaan($pekerjaan);  // Panggil fungsi cari_pekerjaan yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		if(isset($status)) { // Cek jika status ada, maka :
			$data['sim'] = $this->M_Simpanan->cari_status($status);  // Panggil fungsi cari_status yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		
        $data['sim'] = $this->M_Anggota->anggota_status();
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$data['get_pekerjaan'] = $this->M_Anggota->tampil_pekerjaan();
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Laporan_Simpanan/Data_Simpanan', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_simpanan() {
		$this->load->library('mypdf');
		$pekerjaan = $this->input->get('pekerjaan');
		$status = $this->input->get('status');
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_akhir sesuai input (kalau tidak ada set kosong)

		if(empty($tgl_awal) or empty($tgl_akhir) or empty($pekerjaan) or empty($status)) { // Cek jika semua kosong, maka :
			$data['sim'] = $this->M_Simpanan->join4table();  // Panggil fungsi joint4table yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		else { // Jika terisi
			$data['sim'] = $this->M_Simpanan->tampil($tgl_awal, $tgl_akhir, $pekerjaan, $status);  // Panggil fungsi tampil yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
            //$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            //$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            //$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
		if(isset($tgl_awal) or isset($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir ada, maka :
			$data['sim'] = $this->M_Simpanan->tampil_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi tampil_by_date yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		if(isset($pekerjaan)) { // Cek jika pekerjaan ada, maka :
			$data['sim'] = $this->M_Simpanan->cari_pekerjaan($pekerjaan);  // Panggil fungsi cari_pekerjaan yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		if(isset($status)) { // Cek jika status ada, maka :
			$data['sim'] = $this->M_Simpanan->cari_status($status);  // Panggil fungsi cari_status yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }

		$this->mypdf->generate('Laporan_Simpanan/Laporan_Simpanan', $data, 'Data_Laporan_Simpanan_Koperasi', 'A4', 'potrait');
	}

	public function simpanan_anggotaaktif() {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$status = array('status' => 'Aktif');              
        $data['koperasi'] = $this->M_Anggota->anggota_status($status)->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Laporan_Simpanan/Simpanan_Anggotaaktif', $data);
		$this->load->view('templates/footer');
	}

	public function cek_simpananaktif($id_anggota) {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$data['koperasi'] = $this->M_Simpanan->joinceksimpanan($id_anggota);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Laporan_Simpanan/Cek_Simpananaktif', $data);
		$this->load->view('templates/footer');
	}

	public function simpanan_anggotanonaktif() {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$status = array('status' => 'Non-aktif');              
        $data['koperasi'] = $this->M_Anggota->anggota_status($status)->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Laporan_Simpanan/Simpanan_Anggotanonaktif', $data);
		$this->load->view('templates/footer');
	}

	public function cek_simpanannonaktif($id_anggota) {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$data['koperasi'] = $this->M_Simpanan->joinceksimpanan($id_anggota);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Laporan_Simpanan/Cek_Simpanannonaktif', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_ceksimpanan($id_anggota) {
		$this->load->library('mypdf');
		$data['ceksimpanan'] = $this->M_Simpanan->joinceksimpanan($id_anggota);
		$this->mypdf->generate('Laporan_Simpanan/Laporan_CekSimpanan', $data, 'Data_Laporan_Simpanan_Anggota_Koperasi', 'A4', 'potrait');
	}

	public function data_pinjaman() {
		$status_pinjaman = $this->input->get('status_pinjaman');
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_akhir sesuai input (kalau tidak ada set kosong)

		if(empty($tgl_awal) or empty($tgl_akhir) or empty($status_pinjaman)) { // Cek jika semua kosong, maka :
			$data['koperasi'] = $this->M_Pinjaman->join4table();  // Panggil fungsi joint4table yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		else { // Jika terisi
			$data['koperasi'] = $this->M_Pinjaman->tampil($tgl_awal, $tgl_akhir, $status_pinjaman);  // Panggil fungsi tampil yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
            //$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            //$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            //$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
		if(isset($tgl_awal) or isset($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir ada, maka :
			$data['koperasi'] = $this->M_Pinjaman->tampil_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi tampil_by_date yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		if(isset($status_pinjaman)) { // Cek jika status_pinjaman ada, maka :
			$data['koperasi'] = $this->M_Pinjaman->cari_statuspinjam($status_pinjaman);  // Panggil fungsi cari_statuspinjaman yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }

		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Laporan_Pinjaman/Data_Pinjaman', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_pinjaman() {
		$this->load->library('mypdf');
		$status_pinjaman = $this->input->get('status_pinjaman');
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_akhir sesuai input (kalau tidak ada set kosong)

		if(empty($tgl_awal) or empty($tgl_akhir) or empty($status_pinjaman)) { // Cek jika semua kosong, maka :
			$data['pinjaman'] = $this->M_Pinjaman->join4table();  // Panggil fungsi joint4table yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		else { // Jika terisi
			$data['pinjaman'] = $this->M_Pinjaman->tampil($tgl_awal, $tgl_akhir, $status_pinjaman);  // Panggil fungsi tampil yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
            //$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            //$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            //$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
		if(isset($tgl_awal) or isset($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir ada, maka :
			$data['pinjaman'] = $this->M_Pinjaman->tampil_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi tampil_by_date yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		if(isset($status_pinjaman)) { // Cek jika status_pinjaman ada, maka :
			$data['pinjaman'] = $this->M_Pinjaman->cari_statuspinjam($status_pinjaman);  // Panggil fungsi cari_statuspinjam yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }

		$this->mypdf->generate('Laporan_Pinjaman/Laporan_Pinjaman', $data, 'Data_Laporan_Pinjaman_Koperasi', 'A4', 'potrait');
	}

	public function cek_angsur($id_pinjaman) {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$data['koperasi'] = $this->M_Pinjaman->joincekpinjaman($id_pinjaman);
		$data['total_angsur'] = $this->M_Angsuran->count_angsur($id_pinjaman);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Laporan_Pinjaman/Cek_Angsur', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_pinjamangsur($id_pinjaman) {
		$this->load->library('mypdf');
		$data['koperasi'] = $this->M_Pinjaman->joincekpinjaman($id_pinjaman);
		$this->mypdf->generate('Laporan_Pinjaman/Laporan_PinjamAngsur', $data, 'Data_Laporan_Pinjaman_Angsuran_Anggota_Koperasi', 'A4', 'potrait');
	}

	public function pinjaman_lunas() {  
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array(); 
        $data['koperasi'] = $this->M_Pinjaman->pinjaman_statuslunas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Laporan_Pinjaman/Pinjaman_Lunas', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_pinjamanlunas() {
		$this->load->library('mypdf');
		$data['pinjaman'] = $this->M_Pinjaman->pinjaman_statuslunas();
		$this->mypdf->generate('Laporan_Pinjaman/Laporan_Pinjamanstatus', $data, 'Data_Laporan_Pinjaman_Lunas_Koperasi', 'A4', 'landscape');
	}

	public function pinjaman_belumlunas() {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
        $data['koperasi'] = $this->M_Pinjaman->pinjaman_statusbelumlunas();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Laporan_Pinjaman/Pinjaman_Belumlunas', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_pinjamanbelumlunas() {
		$this->load->library('mypdf');
		$data['pinjaman'] = $this->M_Pinjaman->pinjaman_statusbelumlunas();
		$this->mypdf->generate('Laporan_Pinjaman/Laporan_Pinjamanstatus', $data, 'Data_Laporan_Pinjaman_Belum_Lunas_Koperasi', 'A4', 'landscape');
	}

	public function data_angsuran() {
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_akhir sesuai input (kalau tidak ada set kosong)

		if(empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			$data['koperasi'] = $this->M_Angsuran->joindataangsuran();  // Panggil fungsi jointdataangsuran yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		else { // Jika terisi
			$data['koperasi'] = $this->M_Angsuran->tampil_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi tampil_by_date yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
            //$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            //$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            //$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }

		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Laporan_Angsuran/Data_Angsuran', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_angsuran() {
		$this->load->library('mypdf');
		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_akhir sesuai input (kalau tidak ada set kosong)

		if(empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			$data['angsuran'] = $this->M_Angsuran->joindataangsuran();  // Panggil fungsi jointdataangsuran yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak';
            //$label = 'Semua Data Transaksi';
        }
		else { // Jika terisi
			$data['angsuran'] = $this->M_Angsuran->tampil_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi tampil_by_date yang ada di TransaksiModel
            //$url_cetak = 'transaksi/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
            //$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            //$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            //$label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }

		$this->mypdf->generate('Laporan_Angsuran/Laporan_Angsuran', $data, 'Data_Laporan_Angsuran_Koperasi', 'A4', 'potrait');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Anggota extends CI_Controller {
	function __construct() {
    	parent::__construct();   
    	$this->load->model('M_Anggota');
		$this->load->helper('Dateindo');
   }

	public function anggota() {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$data['koperasi'] = $this->M_Anggota->tampil_data();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Anggota/V_Anggota', $data);
		$this->load->view('templates/footer');
	}

	public function tambah() {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Anggota/Tambah_Anggota');
		$this->load->view('templates/footer');
	}

	public function tambah_anggota() {
		$this->form_validation->set_rules('nik', 'NIK', 'required|max_length[16]|is_unique[anggota.nik]');
        $this->form_validation->set_rules('no_telpon', 'Nomor Telpon', 'required|max_length[15]|is_unique[anggota.no_telpon]');
        
		if($this->form_validation->run() == false) {
            $this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('Anggota/Tambah_Anggota');
			$this->load->view('templates/footer');
        } 
		else {
			$id_anggota = $this->input->post('id_anggota');
			$nama_anggota = $this->input->post('nama_anggota');
			$nik = $this->input->post('nik');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$alamat = $this->input->post('alamat');
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
				'alamat' => $alamat,
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
	}

	public function delete($id_anggota) {
        $where = array('id_anggota' => $id_anggota);
        $this->M_Anggota->delete_data($where, 'anggota');
        $error = $this->db->error();

        if($error['code'] !=0) {
            $this->session->set_flashdata('hapus', 'Data Memiliki Transaksi, Gagal Terhapus.');
            redirect('C_Anggota/anggota');
        } 
		else {
            $this->session->set_flashdata('hapus', 'Data Yang Anda Hapus Berhasil.');
            redirect('C_Anggota/anggota');
        }
    }

	public function edit($id_anggota) {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$where = array('id_anggota' => $id_anggota);
		$data['koperasi'] = $this->M_Anggota->edit_data($where, 'anggota')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Anggota/Edit_Anggota', $data);
		$this->load->view('templates/footer');
	}

	public function update() {
		$id_anggota = $this->input->post('id_anggota');
		$nama_anggota = $this->input->post('nama_anggota');
		$nik = $this->input->post('nik');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$no_telpon = $this->input->post('no_telpon');
		$tgl_masuk = $this->input->post('tgl_masuk');

		$data = array(
			'nama_anggota' => $nama_anggota,
			'nik' => $nik,
			'tgl_lahir' => $tgl_lahir,
			'tempat_lahir' => $tempat_lahir,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan,
			'jenis_kelamin' => $jenis_kelamin,
			'no_telpon' => $no_telpon,
			'tgl_masuk' => $tgl_masuk,
		);

		$where = array(
			'id_anggota' => $id_anggota
		);

			$this->M_Anggota->update_data($where, $data, 'anggota');
			$this->session->set_flashdata('ubah', 'Data Yang Anda Ubah Berhasil.');
			redirect('C_Anggota/anggota');
	}

	public function update_aktif($id_anggota) {
		$where = array('id_anggota' => $id_anggota);
		$data = array(
			'status' => 'Aktif'
		);

		$this->db->set($data);
		$this->db->where($where);
		$this->db->update('anggota');
		$this->session->set_flashdata('ubah', 'Data Yang Anda Ubah Berhasil.');
		redirect('C_Anggota/anggota');
	}

	public function update_nonaktif($id_anggota) {
		$where = array('id_anggota' => $id_anggota);
		$data = array(
			'status' => 'Non-aktif'
		);

		$this->db->set($data);
		$this->db->where($where);
		$this->db->update('anggota');
		$this->session->set_flashdata('ubah', 'Data Yang Anda Ubah Berhasil.');
		redirect('C_Anggota/anggota');
	}

}

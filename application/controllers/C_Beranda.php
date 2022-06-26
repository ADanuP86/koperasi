<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Beranda extends CI_Controller {
    function __construct() {
        parent::__construct();

        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }

        $this->load->model('M_Login');
        $this->load->model('M_Beranda');
        $this->load->helper('Rupiah');
    }

    public function index() {
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
        $data['count'] = $this->M_Beranda->get_all_count();
        $data['total_simpanan'] = $this->M_Beranda->hitungJumlahSimpanan();
        $data['total_pinjaman'] = $this->M_Beranda->hitungJumlahPinjaman();
        $data['total_angsuran'] = $this->M_Beranda->hitungJumlahAngsuran();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Beranda/V_Beranda', $data);
        $this->load->view('templates/footer');
    }

    public function anggota() {
        $data['anggota'] = $this->db->get_where('anggota', ['id_anggota' => $this->session->userdata('ses_id')])->row_array();
        // $data['count'] = $this->M_Beranda->get_all_count();
        // $data['total_simpanan'] = $this->M_Beranda->hitungJumlahSimpanan();
        // $data['total_pinjaman'] = $this->M_Beranda->hitungJumlahPinjaman();
        // $data['total_angsuran'] = $this->M_Beranda->hitungJumlahAngsuran();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Tampilan_Anggota/T_Anggota', $data);
        $this->load->view('templates/footer');
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class C_Beranda extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_Login');
        $this->load->model('M_Beranda');
        $this->load->helper('Rupiah');
    }

    public function index() {
        if($this->session->logged_in == FALSE) {
            $this->load->view('V_Login');
        }
        else {
        $data['count'] = $this->M_Beranda->get_all_count();
        $data['total_simpanan'] = $this->M_Beranda->hitungJumlahSimpanan();
        $data['total_pinjaman'] = $this->M_Beranda->hitungJumlahPinjaman();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('V_Beranda', $data);
        $this->load->view('templates/footer');
        }     
    }
 }
 
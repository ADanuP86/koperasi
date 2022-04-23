<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class C_Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_Login');
        $this->load->model('M_Beranda');
        $this->load->helper('Rupiah');
    }

    public function index() {
        if($this->session->logged_in == FALSE) {
            $this->load->view('Login/V_Login');
        } else {
        $data['count'] = $this->M_Beranda->get_all_count();
        $data['total_simpanan'] = $this->M_Beranda->hitungJumlahSimpanan();
        $data['total_pinjaman'] = $this->M_Beranda->hitungJumlahPinjaman();
        $data['total_angsuran'] = $this->M_Beranda->hitungJumlahAngsuran();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('Beranda/V_Beranda', $data);
        $this->load->view('templates/footer');
        }     
    }
 
    public function login() {
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
 
        $status         = $this->M_Login->get_detail($username,md5($password));
        if($status) {
            $session = array(
                'username'          => $username,
                'logged_in'     => TRUE
            );
            $this->session->set_userdata('ses_username', $session['username']);
            $this->session->set_userdata($session);
            $this->session->unset_userdata('gagal');
            redirect('C_Beranda/index');
        } else {
            $session = array('gagal' => 1);
            echo $this->session->set_flashdata('info', 'Username atau Password Salah');
            redirect('C_Login/index');
        }
    }
 
    public function logout() {
        $this->session->sess_destroy();
        redirect('C_Login/index');
    }
    
}

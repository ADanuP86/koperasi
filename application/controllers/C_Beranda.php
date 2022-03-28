<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class C_Beranda extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->model('M_Login');
        $this->load->model('M_Simpanan');
        $this->load->model('M_Beranda');
    }

    public function index() {
        if($this->session->logged_in == FALSE){
            $this->load->view('V_Login');
        }
        else {
        $data['count'] = $this->M_Beranda->get_all_count();
        //$data['sumTotalSimpanan'] = $this->M_Simpanan->getSumTotalSimpanan();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('V_Beranda', $data);
        $this->load->view('templates/footer');
        }     
    }
 }
 
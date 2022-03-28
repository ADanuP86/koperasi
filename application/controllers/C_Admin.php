<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {

	function __construct() {
      parent::__construct();   
      $this->load->model('M_Admin');
   }

   public function admin() {
		$data['koperasi'] = $this->M_Admin->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('V_Admin', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id_admin) {
		$where = array('id_admin' => $id_admin);
		$data['koperasi'] = $this->M_Admin->edit_data($where, 'admin')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Edit_Admin', $data);
		$this->load->view('templates/footer');
	}

	public function update() {
		$id_admin = $this->input->post('id_admin');
		$username = $this->input->post('username');
		//$password = md5($this->input->post('password'));
		$nama_admin = $this->input->post('nama_admin');
		$role = $this->input->post('role');

		$data = array(
			'username' => $username,
			//'password' => $password,
			'nama_admin' => $nama_admin,
			'role' => $role
		);

		$where = array(
			'id_admin' => $id_admin
		);

		$this->M_Admin->update_data($where, $data, 'admin');
		redirect('C_Admin/admin');
	}

	public function edit_password($id_admin) {
		$where = array('id_admin' => $id_admin);
		$data['koperasi'] = $this->M_Admin->edit_data($where, 'admin')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Edit_Password', $data);
		$this->load->view('templates/footer');
	}

	public function update_password() {
        $id_admin = $this->input->post('id_admin');
        $password = md5($this->input->post('password'));
      
        $data = array(
           
            'password' => $password
        );

        $where = array(
            'id_admin' => $id_admin
        );

        $this->M_Admin->update_data($where, $data, 'admin');
        redirect('C_Admin/admin');
    }

}

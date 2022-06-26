<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {
	function __construct() {
    	parent::__construct();   
    	$this->load->model('M_Admin');
   }

    public function admin() {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$data['koperasi'] = $this->M_Admin->tampil_data();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Admin/V_Admin', $data);
		$this->load->view('templates/footer');
	}

	public function edit($id_admin) {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$where = array('id_admin' => $id_admin);
		$data['koperasi'] = $this->M_Admin->edit_data($where, 'admin')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Admin/Edit_Admin', $data);
		$this->load->view('templates/footer');
	}

	public function update() {
		$id_admin = $this->input->post('id_admin');
		$username = $this->input->post('username');
		$nama_admin = $this->input->post('nama_admin');
		$role = $this->input->post('role');

		$data = array(
			'username' => $username,
			'nama_admin' => $nama_admin,
			'role' => $role
		);

		$where = array(
			'id_admin' => $id_admin
		);

		$this->M_Admin->update_data($where, $data, 'admin');
		$this->session->set_flashdata('ubah', 'Data Yang Anda Ubah Berhasil.');
		redirect('C_Admin/admin');
	}

	public function edit_password($id_admin) {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$where = array('id_admin' => $id_admin);
		$data['koperasi'] = $this->M_Admin->edit_data($where, 'admin')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Admin/Edit_Password', $data);
		$this->load->view('templates/footer');
	}

	public function update_password($id_admin) {
		$data['admin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('ses_id')])->row_array();
		$where = array('id_admin' => $id_admin);
		$data['koperasi'] = $this->M_Admin->edit_data($where, 'admin')->result();

		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run() == false) {
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Admin/Edit_Password', $data);
		$this->load->view('templates/footer');
		}
		else {
        $id_admin = $this->input->post('id_admin');
        $password = md5($this->input->post('password'));
		$password_lama = md5($this->input->post('password_lama'));

		if($password_lama != $data['admin']['password']) {
			$this->session->set_flashdata('gagal_password', 'Password Lama Yang Anda Ubah Tidak Sama.');
        	redirect($_SERVER['HTTP_REFERER']);
		}
		else {
			if($password_lama == $password) {
				$this->session->set_flashdata('gagal_password', 'Password Yang Anda Ubah Sama.');
        		redirect($_SERVER['HTTP_REFERER']);
			}
			else {
				$data = array(
					'password' => $password
				);
		
				$where = array(
					'id_admin' => $id_admin
				);

				$this->M_Admin->update_data($where, $data, 'admin');
				$this->session->set_flashdata('ubah_password', 'Password Yang Anda Ubah Berhasil.');
				redirect('C_Admin/admin');
				}
			}
      
    	}
	}

}

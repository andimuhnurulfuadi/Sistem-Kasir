<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}
	public function index()
	{
		if ($this->input->post()) {
			$post['username'] = $this->input->post('username');
			$post['password'] = $this->input->post('password');
			$hasil = $this->Login_model->get_login($post);

			if ($hasil) {
				$_SESSION['username'] = $hasil['username'];
				$_SESSION['kduser'] = $hasil['kd_admin'];
				$_SESSION['level'] = $hasil['level'];

				redirect(base_url('admin'));
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">username atau password salah ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
				redirect(base_url('login_admin'));
			}
		} else {
			$this->load->view('admin/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login_admin'));
	}
}

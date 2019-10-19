<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');

		if (isset($_SESSION['username']) === FALSE) {
			redirect(base_url('login_admin'));
		}
	}
	public function index()
	{
		$username = $_SESSION['username'];
		$adminaktif['adminaktif'] = $this->Admin_model->get_satu_admin('username', $username);

		if ($this->input->post()) {

			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() === TRUE) {

				$kd = $this->input->post('kd');
				$post['nama'] = $this->input->post('nama');
				$post['username'] = $this->input->post('username');
				$post['password'] = $this->input->post('password');

				$hasil = $this->Admin_model->edit_admin($kd, $post);

				if ($hasil) {
					$_SESSION['username'] = $post['username'];
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil disimpan !</div>');
					redirect(base_url('admin/index'));
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data gagal disimpan !</div>');
					redirect(base_url('admin/index'));
				}
			}
		}


		$this->load->view('admin/template/header');
		$this->load->view('admin/admin/index', $adminaktif);
		$this->load->view('admin/template/footer');
	}

	public function tampil($offset = 0)
	{
		// setting pagination
		$config['base_url'] = site_url('admin/tampil');
		$config['total_rows'] = $this->Admin_model->total_data();
		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		$data['admin'] = $this->Admin_model->get_admin($config['per_page'], $offset);
		$this->load->view('admin/template/header');
		$this->load->view('admin/admin/tampil', $data);
		$this->load->view('admin/template/footer');
	}

	public function tambah()
	{

		if ($this->input->post()) {
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('level', 'Level', 'required');

			if ($this->form_validation->run() === TRUE) {
				$post['nama'] = $this->input->post('nama');
				$post['username'] = $this->input->post('username');
				$post['password'] = $this->input->post('password');
				$post['level'] = $this->input->post('level');

				$hasil = $this->Admin_model->input_admin($post);
				if ($hasil) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
					redirect(base_url('admin/tampil'));
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data gagal disimpan!</div>');
					redirect(base_url('admin/tambah'));
				}
			}
		}
		$this->load->view('admin/template/header');
		$this->load->view('admin/admin/tambah');
		$this->load->view('admin/template/footer');
	}

	public function detail($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('admin/tampil'));
		}

		$data['admin'] = $this->Admin_model->get_satu_admin('kd_admin', $kd);

		$this->load->view('admin/template/header');
		$this->load->view('admin/admin/detail', $data);
		$this->load->view('admin/template/footer');
	}

	public function edit($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('admin/tampil'));
		}

		if ($this->input->post()) {
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('level', 'Level', 'required');

			if ($this->form_validation->run() === TRUE) {
				$kd = $this->input->post('kd');
				$post['nama'] = $this->input->post('nama');
				$post['username'] = $this->input->post('username');
				$post['password'] = $this->input->post('password');
				$post['level'] = $this->input->post('level');

				$hasil = $this->Admin_model->edit_admin($kd, $post);

				if ($hasil) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
					redirect(base_url('admin/tampil'));
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data gagal diubah!</div>');
					redirect(base_url('admin/edit'));
				}
			}
		}

		$data['admin'] = $this->Admin_model->get_satu_admin('kd_admin', $kd);

		$this->load->view('admin/template/header');
		$this->load->view('admin/admin/edit', $data);
		$this->load->view('admin/template/footer');
	}

	public function hapus($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('admin/tampil'));
		}

		$hasil = $this->Admin_model->hapus_admin($kd);
		if ($hasil) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
			redirect(base_url('admin/tampil'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data gagal dihapus!</div>');
			redirect(base_url('admin/tampil'));
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');

		if (isset($_SESSION['username']) === FALSE) {
			redirect(base_url('login_admin'));
		}
	}

	public function index()
	{
		redirect(base_url('menu/tampil'));
	}

	public function tampil($offset = 0)
	{
		// setting pagination
		$config['base_url'] = site_url('admin/tampil');
		$config['total_rows'] = $this->Menu_model->total_data();
		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		$data['menu'] = $this->Menu_model->get_menu($config['per_page'], $offset);
		$this->load->view('admin/template/header');
		$this->load->view('admin/menu/tampil', $data);
		$this->load->view('admin/template/footer');
	}

	public function tambah()
	{

		if ($this->input->post()) {
			$this->form_validation->set_rules('nama', 'Nama Menu', 'required');
			$this->form_validation->set_rules('kategori', 'Kategori', 'required');
			$this->form_validation->set_rules('harga', 'Harga', 'required');
			$this->form_validation->set_rules('status', 'Status Menu', 'required');

			if ($this->form_validation->run() === TRUE) {

				$post['nama'] = $this->input->post('nama');
				$post['kd_kategori'] = $this->input->post('kategori');
				$post['harga'] = $this->input->post('harga');
				$post['status_menu'] = $this->input->post('status');

				// configurasi upload gambar
				$config['upload_path']         = './upload/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 1000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					echo $this->upload->display_errors();
				} else {
					$post['gambar'] = $this->upload->data('file_name');
				}
				$hasil = $this->Menu_model->input_menu($post);
				if ($hasil) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
					redirect(base_url('menu/tampil'));
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data gagal disimpan!</div>');
					redirect(base_url('menu/tambah'));
				}
			}
		}

		$data['kategori'] = $this->Menu_model->get_kategori();

		$this->load->view('admin/template/header');
		$this->load->view('admin/menu/tambah', $data);
		$this->load->view('admin/template/footer');
	}

	public function edit($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('menu/tampil'));
		}

		if ($this->input->post()) {
			$this->form_validation->set_rules('nama', 'Nama Menu', 'required');
			$this->form_validation->set_rules('kategori', 'Kategori', 'required');
			$this->form_validation->set_rules('harga', 'Harga', 'required');
			$this->form_validation->set_rules('status', 'Status Menu', 'required');

			if ($this->form_validation->run() === TRUE) {
				$kd = $this->input->post('kd');
				$post['nama'] = $this->input->post('nama');
				$post['kd_kategori'] = $this->input->post('kategori');
				$post['harga'] = $this->input->post('harga');
				$post['status_menu'] = $this->input->post('status');

				// configurasi upload gambar
				$config['upload_path']         = './upload/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 1000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);
				$this->upload->do_upload('gambar');
				if (!empty($this->upload->data()['file_name'])) {
					$post['gambar'] = $this->upload->data('file_name');
				}

				$hasil = $this->Menu_model->edit_menu($kd, $post);

				if ($hasil) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
					redirect(base_url('menu/tampil'));
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data gagal diubah!</div>');
					redirect(base_url('menu/edit'));
				}
			}
		}

		$data['menu'] = $this->Menu_model->get_satu_menu('kd_menu', $kd);
		$data['kategori'] = $this->Menu_model->get_kategori();

		$this->load->view('admin/template/header');
		$this->load->view('admin/menu/edit', $data);
		$this->load->view('admin/template/footer');
	}

	public function hapus($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('menu/tampil'));
		}

		$data['menu'] = $this->Menu_model->get_satu_menu('kd_menu', $kd);
		$gambar = $data['menu']['gambar'];
		unlink('upload/' . $gambar);

		$hasil = $this->Menu_model->hapus_menu($kd);
		if ($hasil) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
			redirect(base_url('menu/tampil'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data gagal dihapus!</div>');
			redirect(base_url('menu/tampil'));
		}
	}
}

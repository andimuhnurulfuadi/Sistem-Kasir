<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {


	public function __construct(){
		parent:: __construct();
		$this->load->model('Kategori_model');

		if (isset($_SESSION['username'])===FALSE){
			redirect(base_url('login_admin'));
		}		
	}

	public function index ()
	{
		redirect(base_url('kategori/tampil'));
	}

	public function tampil($offset = 0)
	{
		// setting pagination
		$config['base_url'] = site_url('kategori/tampil');
		$config['total_rows'] = $this->Kategori_model->total_data();
		$config['per_page'] = 5;

		$this->pagination->initialize($config);
	
		$data['kategori'] = $this->Kategori_model->get_kategori($config['per_page'],$offset);
		$this->load->view('admin/template/header');
		$this->load->view('admin/kategori/tampil',$data);
		$this->load->view('admin/template/footer');

	}

	public function tambah()
	{
		
		if ($this->input->post()) {
			$this->form_validation->set_rules('kategori', 'Nama Kategori', 'required');

			if ($this->form_validation->run()===TRUE) {
				$post['kategori'] = $this->input->post('kategori');

				$hasil = $this->Kategori_model->input_kategori($post);
				if ($hasil) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
					redirect(base_url('kategori/tampil'));
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal disimpan!</div>');
					redirect(base_url('kategori/tambah'));
				}
			}
		}
		$this->load->view('admin/template/header');
		$this->load->view('admin/kategori/tambah');
		$this->load->view('admin/template/footer');
		
	}

	public function edit($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('kategori/tampil'));
		}

		if ($this->input->post()) {
			$this->form_validation->set_rules('kategori', 'Nama Kategori', 'required');

			if ($this->form_validation->run()===TRUE) {
				$kd = $this->input->post('kd');
				$post['kategori'] = $this->input->post('kategori');

				$hasil = $this->Kategori_model->edit_kategori($kd,$post);

				if ($hasil) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
					redirect(base_url('kategori/tampil'));
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal diubah!</div>');
					redirect(base_url('kategori/edit'));
				}
			}
		}

		$data['kategori'] = $this->Kategori_model->get_satu_kategori('kd_kategori',$kd);

		$this->load->view('admin/template/header');
		$this->load->view('admin/kategori/edit',$data);
		$this->load->view('admin/template/footer');
	}

	public function hapus($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('kategori/tampil'));
		}

		$hasil = $this->Kategori_model->hapus_kategori($kd);
		if ($hasil) {
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
			redirect(base_url('kategori/tampil'));
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal dihapus!</div>');
			redirect(base_url('kategori/tampil'));
		}
	}

}

 ?>
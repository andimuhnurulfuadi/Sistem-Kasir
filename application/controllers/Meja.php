<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Meja extends CI_Controller {


	public function __construct(){
		parent:: __construct();
		$this->load->model('Meja_model');

		if (isset($_SESSION['username'])===FALSE){
			redirect(base_url('login_admin'));
		}		
	}

	public function index ()
	{
		redirect(base_url('meja/tampil'));
	}

	public function tampil($offset = 0)
	{
		// setting pagination
		$config['base_url'] = site_url('meja/tampil');
		$config['total_rows'] = $this->Meja_model->total_data();
		$config['per_page'] = 5;

		$this->pagination->initialize($config);
	
		$data['meja'] = $this->Meja_model->get_meja($config['per_page'],$offset);
		$this->load->view('admin/template/header');
		$this->load->view('admin/meja/tampil',$data);
		$this->load->view('admin/template/footer');

	}

	public function tambah()
	{
		
		if ($this->input->post()) {
			$this->form_validation->set_rules('no_meja', 'Nomor Meja', 'required');

			if ($this->form_validation->run()===TRUE) {
				$post['no_meja'] = $this->input->post('no_meja');

				$hasil = $this->Meja_model->input_meja($post);
				if ($hasil) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil ditambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
					redirect(base_url('meja/tampil'));
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal disimpan!</div>');
					redirect(base_url('meja/tambah'));
				}
			}
		}
		$this->load->view('admin/template/header');
		$this->load->view('admin/meja/tambah');
		$this->load->view('admin/template/footer');
		
	}

	public function edit($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('meja/tampil'));
		}

		if ($this->input->post()) {
			$this->form_validation->set_rules('no_meja', 'Nomor Meja', 'required');

			if ($this->form_validation->run()===TRUE) {
				$kd = $this->input->post('kd');
				$post['no_meja'] = $this->input->post('no_meja');

				$hasil = $this->Meja_model->edit_meja($kd,$post);

				if ($hasil) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
					redirect(base_url('meja/tampil'));
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal diubah!</div>');
					redirect(base_url('meja/edit'));
				}
			}
		}

		$data['meja'] = $this->Meja_model->get_satu_meja('kd_meja',$kd);

		$this->load->view('admin/template/header');
		$this->load->view('admin/meja/edit',$data);
		$this->load->view('admin/template/footer');
	}

	public function hapus($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('meja/tampil'));
		}

		$hasil = $this->Meja_model->hapus_meja($kd);
		if ($hasil) {
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
			redirect(base_url('meja/tampil'));
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal dihapus!</div>');
			redirect(base_url('meja/tampil'));
		}
	}

}

 ?>
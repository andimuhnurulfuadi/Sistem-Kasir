<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');

		if (isset($_SESSION['username']) === FALSE) {
			redirect(base_url('login_admin'));
		}
	}
	public function index()
	{
		redirect(base_url('transaksi/tampil'));
	}

	public function tampil($offset = 0)
	{
		// setting pagination
		$config['base_url'] = site_url('transaksi/tampil');
		$config['total_rows'] = $this->Transaksi_model->total_data();
		$config['per_page'] = 5;

		$this->pagination->initialize($config);

		$data['transaksi'] = $this->Transaksi_model->get_transaksi($config['per_page'], $offset);
		if ($_SESSION['level'] == 'pelayan') {
			$data['transaksi'] = $this->Transaksi_model->get_transaksi_pelayan($config['per_page'], $offset);
		}
		$this->load->view('admin/template/header');
		$this->load->view('admin/transaksi/tampil', $data);
		$this->load->view('admin/template/footer');
	}

	public function tambah()
	{

		if ($this->input->post()) {
			$menu = array(
				'id'      => $this->input->post('kd'),
				'qty'     => $this->input->post('jumlah'),
				'price'   => $this->input->post('harga'),
				'name'    => $this->input->post('menu'),
			);

			$this->cart->insert($menu);
		}
		$data['meja'] = $this->Transaksi_model->get_meja();
		$data['makanan'] = $this->Transaksi_model->get_makanan();
		$data['minuman'] = $this->Transaksi_model->get_minuman();
		$this->load->view('admin/template/header');
		$this->load->view('admin/transaksi/tambah', $data);
		$this->load->view('admin/template/footer');
	}

	public function detail($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('transaksi/tampil'));
		}

		if ($this->input->post('hitung')) {
			unset($_SESSION['kembalian'], $_SESSION['bayar']);
			$total = $this->input->post('total');
			$bayar = $this->input->post('bayar');
			$kembali = $bayar - $total;
			$_SESSION['bayar'] = $bayar;
			$_SESSION['kembalian'] = $kembali;
		}



		$data['transaksi'] = $this->Transaksi_model->get_satu_transaksi('kd_transaksi', $kd);
		$data['detail_transaksi'] = $this->Transaksi_model->get_detail_transaksi($kd);

		if ($this->input->post('selesai')) {
			unset($_SESSION['kembalian'], $_SESSION['bayar']);
			$post['status'] = 'selesai';
			$kd = $this->input->post('kd');
			$hasil = $this->Transaksi_model->update_status($kd, $post);

			if ($hasil) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Status Pembayaran berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
				redirect(base_url('transaksi/tampil'));
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Status Pembayaran gagal diubah atau status sudah selesai!</div>');
				redirect(base_url('transaksi/tampil'));
			}
		}

		$this->load->view('admin/template/header');
		$this->load->view('admin/transaksi/detail', $data);
		$this->load->view('admin/template/footer');
	}

	public function hapus_cart($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('transaksi/tambah'));
		}

		$this->cart->remove($kd);
		redirect(base_url('transaksi/tambah'));
	}

	public function hapus($kd = NULL)
	{
		if (empty($kd)) {
			redirect(base_url('transaksi/tambah'));
		}
		$hasil = $this->Transaksi_model->hapus_transaksi($kd);
		if ($hasil) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil dihapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
			redirect(base_url('transaksi/tampil'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data gagal dihapus!</div>');
			redirect(base_url('transaksi/tampil'));
		}
	}

	public function simpan()
	{
		$total = 0;
		$status = 'aktif';
		foreach ($this->cart->contents() as $item) :
			$total = $total + $item['subtotal'];
		endforeach;

		$tgl = date('Y-m-d');

		$post['kd_admin'] = $_SESSION['kduser'];
		$post['kd_meja'] = $this->input->post('meja');
		$post['tgl_transaksi'] = $tgl;
		$post['total'] = $total;
		$post['status'] = $status;

		$simpan_transaksi = $this->Transaksi_model->input_transaksi($post);
		print_r($simpan_transaksi);
		if ($simpan_transaksi) {
			foreach ($this->cart->contents() as $item) :
				$post_detail['kd_transaksi'] = $simpan_transaksi;
				$post_detail['kd_menu'] = $item['id'];
				$post_detail['harga'] = $item['price'];
				$post_detail['jumlah'] = $item['qty'];
				$post_detail['sub_total'] = $item['subtotal'];
				$detail = $this->Transaksi_model->input_detail_transaksi($post_detail);
			endforeach;

			$this->cart->destroy();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil melakukan pemesanan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
			redirect(base_url('transaksi/tampil'));
		}
	}
}

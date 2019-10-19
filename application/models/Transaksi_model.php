<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Transaksi_model extends Ci_Model
{
	public function get_transaksi($batas, $offset)
	{
		$filter = $this->input->get('cari');
		$this->db->like('no_meja', $filter);
		$this->db->from('transaksi');
		$this->db->join('admin', 'admin.kd_admin=transaksi.kd_admin');
		$this->db->join('meja', 'meja.kd_meja=transaksi.kd_meja');
		$this->db->limit($batas, $offset);
		return $this->db->get()->result_array();
	}
	public function get_transaksi_pelayan($batas, $offset)
	{
		$filter = $this->input->get('cari');
		$this->db->like('no_meja', $filter);
		$this->db->from('transaksi');
		$this->db->where('level', 'pelayan');
		$this->db->join('admin', 'admin.kd_admin=transaksi.kd_admin');
		$this->db->join('meja', 'meja.kd_meja=transaksi.kd_meja');
		$this->db->limit($batas, $offset);
		return $this->db->get()->result_array();
	}

	public function get_satu_transaksi($kolom, $value)
	{
		$this->db->where($kolom, $value);
		$this->db->from('transaksi');
		$this->db->join('admin', 'admin.kd_admin=transaksi.kd_admin');
		$this->db->join('meja', 'meja.kd_meja=transaksi.kd_meja');
		return $this->db->get()->row_array();
	}

	public function get_detail_transaksi($kd)
	{
		$this->db->where('kd_transaksi', $kd);
		$this->db->from('detail_transaksi');
		$this->db->join('menu', 'menu.kd_menu=detail_transaksi.kd_menu');
		return $this->db->get()->result_array();
	}

	public function input_transaksi($data)
	{
		$this->db->insert('transaksi', $data);
		return $this->db->insert_id();
	}

	public function input_detail_transaksi($data)
	{
		$this->db->insert('detail_transaksi', $data);
		return $this->db->insert_id();
	}

	public function hapus_transaksi($kd)
	{
		$this->db->where('kd_transaksi', $kd);
		$this->db->delete('transaksi');

		return $this->db->affected_rows();
	}

	public function update_status($kd, $status)
	{
		$this->db->where('kd_transaksi', $kd);
		$this->db->update('transaksi', $status);

		return $this->db->affected_rows();
	}

	// untuk pagination
	public function total_data()
	{
		$filter = $this->input->get('cari');
		$this->db->like('no_meja', $filter);
		$this->db->from('transaksi');
		$this->db->join('meja', 'meja.kd_meja=transaksi.kd_meja');
		return $this->db->count_all_results();
	}

	// mengambil menu
	public function get_makanan()
	{
		$this->db->join('kategori', 'kategori.kd_kategori=menu.kd_kategori');
		return $this->db->get_where('menu', array('status_menu' => 'ready', 'kategori' => 'makanan'))->result_array();
	}
	public function get_minuman()
	{
		$this->db->join('kategori', 'kategori.kd_kategori=menu.kd_kategori');
		return $this->db->get_where('menu', array('status_menu' => 'ready', 'kategori' => 'minuman'))->result_array();
	}
	// mengambil meja
	public function get_meja()
	{
		return $this->db->get('meja')->result_array();
	}
}

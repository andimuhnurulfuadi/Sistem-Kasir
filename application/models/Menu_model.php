<?php 
defined('BASEPATH') OR exit('No direct script acces allowed');

class Menu_model extends Ci_Model 
{
	public function get_menu($batas, $offset){
		$filter = $this->input->get('cari');
		$this->db->like('nama',$filter);
		$this->db->from('menu');
		$this->db->join('kategori','kategori.kd_kategori=menu.kd_kategori');
		$this->db->limit($batas,$offset);
		return $this->db->get()->result_array();
	}

	// mengambil data kategori 
	public function get_kategori($value='')
	{
		return $this->db->get('kategori')->result_array();
	}

	public function get_satu_menu($kolom,$value){
		return $this->db->get_where('menu', array($kolom => $value))->row_array();
	}

	public function input_menu($data){
		$this->db->insert('menu', $data);
		return $this->db->insert_id();
	}

	public function edit_menu($kd,$data){
		$this->db->where('kd_menu', $kd);
		$this->db->update('menu', $data);
		return $this->db->affected_rows();
	}

	public function hapus_menu($kd){
		$this->db->where('kd_menu', $kd);
		$this->db->delete('menu');

		return $this->db->affected_rows();
	}

	// untuk pagination
	public function total_data()
	{
		$filter = $this->input->get('cari');
		$this->db->like('nama',$filter);
		return $this->db->count_all_results('menu');
	}
}

 ?>
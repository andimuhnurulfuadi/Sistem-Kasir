<?php 
defined('BASEPATH') OR exit('No direct script acces allowed');

class Kategori_model extends Ci_Model 
{
	public function get_kategori($batas, $offset){
		$filter = $this->input->get('cari');
		$this->db->like('kategori',$filter);
		$this->db->limit($batas,$offset);
		return $this->db->get('kategori')->result_array();
	}

	public function get_satu_kategori($kolom,$value){
		return $this->db->get_where('kategori', array($kolom => $value))->row_array();
	}

	public function input_kategori($data){
		$this->db->insert('kategori', $data);
		return $this->db->insert_id();
	}

	public function edit_kategori($kd,$data){
		$this->db->where('kd_kategori', $kd);
		$this->db->update('kategori', $data);

		return $this->db->affected_rows();
	}

	public function hapus_kategori($kd){
		$this->db->where('kd_kategori', $kd);
		$this->db->delete('kategori');

		return $this->db->affected_rows();
	}

	// untuk pagination
	public function total_data()
	{
		$filter = $this->input->get('cari');
		$this->db->like('kategori',$filter);
		return $this->db->count_all_results('kategori');
	}
}

 ?>
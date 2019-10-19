<?php 
defined('BASEPATH') OR exit('No direct script acces allowed');

class Meja_model extends Ci_Model 
{
	public function get_meja($batas, $offset){
		$filter = $this->input->get('cari');
		$this->db->like('no_meja',$filter);
		$this->db->limit($batas,$offset);
		return $this->db->get('meja')->result_array();
	}

	public function get_satu_meja($kolom,$value){
		return $this->db->get_where('meja', array($kolom => $value))->row_array();
	}

	public function input_meja($data){
		$this->db->insert('meja', $data);
		return $this->db->insert_id();
	}

	public function edit_meja($kd,$data){
		$this->db->where('kd_meja', $kd);
		$this->db->update('meja', $data);

		return $this->db->affected_rows();
	}

	public function hapus_meja($kd){
		$this->db->where('kd_meja', $kd);
		$this->db->delete('meja');

		return $this->db->affected_rows();
	}

	// untuk pagination
	public function total_data()
	{
		$filter = $this->input->get('cari');
		$this->db->like('no_meja',$filter);
		return $this->db->count_all_results('meja');
	}
}

 ?>
<?php 
defined('BASEPATH') OR exit('No direct script acces allowed');

class Admin_model extends Ci_Model 
{
	public function get_admin($batas, $offset){
		$filter = $this->input->get('cari');
		$this->db->like('nama',$filter);
		$this->db->limit($batas,$offset);
		return $this->db->get('admin')->result_array();
	}

	public function get_satu_admin($kolom,$value){
		return $this->db->get_where('admin', array($kolom => $value))->row_array();
	}

	public function input_admin($data){
		$this->db->insert('admin', $data);
		return $this->db->insert_id();
	}

	public function edit_admin($kd,$data){
		$this->db->where('kd_admin', $kd);
		$this->db->update('admin', $data);

		return $this->db->affected_rows();
	}

	public function hapus_admin($kd){
		$this->db->where('kd_admin', $kd);
		$this->db->delete('admin');

		return $this->db->affected_rows();


	}

	// untuk pagination
	public function total_data()
	{
		$filter = $this->input->get('cari');
		$this->db->like('nama',$filter);
		return $this->db->count_all_results('admin');
	}
}

 ?>
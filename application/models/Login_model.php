<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends Ci_Model {

	public function get_login($data){
		return $this->db->get_where('admin',$data)->row_array();
	}
}

 ?>
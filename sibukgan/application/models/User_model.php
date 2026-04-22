<?php 

class User_model extends CI_Model{
	public function ambil_data($id)
	{
		$this->db->where('email', $id);
		return $this->db->get('master_users')->row();
	}
}
<?php

class B_Login_model extends CI_Model{

	public function cek_login($email, $password)
	{
		$this->db->where("email", $email);
		$this->db->where("password", $password);

		return $this->db->get('user');
	}
	}
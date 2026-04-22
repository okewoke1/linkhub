<?php 

class Golongan_model extends CI_Model{

	private $_table = "master_golongan";

    public $id;
    public $kode_golongan;
    public $golongan;
 

	public function tampil_data()
	{
		return $this->db->get('master_golongan');
	}

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

}
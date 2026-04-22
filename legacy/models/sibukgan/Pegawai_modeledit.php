<?php 

class Pegawai_modeledit extends CI_Model{
	
    private $_table = "user";

    public $id;
    public $nip;
    public $nama;
    public $pangkat;
    public $golongan;
    public $jabatan;
    public $status;
    public $level;


    public function rules()
    {
		$this->form_validation->set_rules('nip','nip','required|is_natural');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('pangkat','pangkat','required');
		$this->form_validation->set_rules('golongan','golongan','required');
		$this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('status','status','required');
        $this->form_validation->set_rules('level','level','required');

    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function tampil_data()
	{
		return $this->db->query('SELECT * FROM  `user` ORDER BY id DESC');
	}

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];    
        $this->nip = $post["nip"];
        $this->nama = $post["nama"];
        $this->pangkat = $post["pangkat"];
        $this->golongan = $post["golongan"];
        $this->jabatan = $post["jabatan"];
        $this->status = $post["status"];

        $this->level = $post["level"];



        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }


}
	


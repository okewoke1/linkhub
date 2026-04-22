<?php 

class Pegawai_model extends CI_Model{
	
    private $_table = "user";

    public $id;
    public $nip;
    public $nama;
    public $pangkat;
    public $golongan;
    public $jabatan;
    public $status;

    public $password;
    public $level;
    public $email;

    public function rules()
    {
		$this->form_validation->set_rules('nip','nip','required|is_natural');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('pangkat','pangkat','required');
		$this->form_validation->set_rules('golongan','golongan','required');
		$this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('status','status','required');

        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('level','level','required');
        $this->form_validation->set_rules('email','email','required');
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

    public function save()
    {
        $post = $this->input->post();
        $this->nip = $post["nip"];
        $this->nama = $post["nama"];
        $this->pangkat = $post["pangkat"];
        $this->golongan = $post["golongan"];
        $this->jabatan = $post["jabatan"];
        $this->status = $post["status"];

        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        
        $this->level = $post["level"];
        $this->email = $post["email"];
 
        return $this->db->insert($this->_table, $this);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }


}
	


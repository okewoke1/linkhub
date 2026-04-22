<?php 

class Pegawai_modelbiasa extends CI_Model{
	
    private $_table = "master_users";

    public $id;
    public $nip;
    public $nama;

    public $username;
    public $password;
    public $email;

    public function rules()
    {
		$this->form_validation->set_rules('nip','nip','required');
        $this->form_validation->set_rules('nama','nama','required');

        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
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
		return $this->db->query('SELECT * FROM  `master_users` WHERE status = 1 ORDER BY id DESC');
	}


    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];    
        $this->nip = $post["nip"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->email = $post["email"];

        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

}
	


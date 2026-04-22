<?php
Class B_Dashboard_modeladmin extends CI_Model
{

	private $_table = "user";

    public $id;

    public $username;
    public $password;
    public $email;

  function Jum_spt()
    {
        $this->db->group_by('tgl_spt');
        $this->db->select('tgl_spt');
        $this->db->select("count(*) as total");
        return $this->db->from('tb_spt')
          ->get()
          ->result();
    }

    function Nam_peg()
    {
        $this->db->group_by('pegawai');
        $this->db->select('pegawai');
        return $this->db->from('tb_spt')
          ->get()
          ->result();
    }
    

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

        public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];    

        $this->username = $post["username"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->email = $post["email"];

        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }
}

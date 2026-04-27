<?php
Class Dashboard_modeladmin extends CI_Model
{

	private $_table = "master_users";

    public $id;

    public $username;
    public $password;
    public $email;

  function Jum_bbm()
    {
        $this->db->group_by('nama');
        $this->db->select('nama');
        $this->db->select("sum(total) as total");
        return $this->db->from('tb_bbm')
          ->get()
          ->result();
    }
  
  function Jum_kendis()
    {
        $this->db->group_by('nama');
        $this->db->select('nama');
        $this->db->select("sum(biaya) as total1");
        return $this->db->from('tb_kendis')
          ->get()
          ->result();
    }

    public function tampil_data()
	{
		return $this->db->query('SELECT * FROM  tb_spt');
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
  
  public function tampil_biaya($nip)
    {
        $query = "select nama, sum(total) as b from (
    select nama,total from tb_bbm WHERE nip=$nip 
) x group by nama";
        return $this->db->query($query)->result();
    }
  
  public function tampil_biaya2($nip)
    {
        $query = "select nama, 1000000-sum(biaya) as b from (
    select nama,biaya from tb_bbm WHERE nip=$nip union all
    select nama,biaya from tb_kendis WHERE nip=$nip 
) x group by nama";
        return $this->db->query($query)->result();
    }
  
  public function tampil_pagu($nip)
    {
        $query = "SELECT * FROM master_users WHERE nip=$nip  ORDER BY id DESC";
        return $this->db->query($query)->result();
    }
 
  
      public function tampil_biaya6()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Ardi Surya SST, M.Si.'";
        return $this->db->query($query)->result();
    }
  
      public function tampil_biaya8()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Imam Setia Harnomo, SST, M.Stat'";
        return $this->db->query($query)->result();
    }
  


}

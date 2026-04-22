<?php
Class K_Dashboard_modeladmin extends CI_Model
{

	private $_table = "tb_user";

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
        $query = "SELECT * FROM tb_user WHERE nip=$nip  ORDER BY id DESC";
        return $this->db->query($query)->result();
    }
  
    public function tampil_biaya3()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Achmad Tasylichul Adib, S.Tr.Stat'";
        return $this->db->query($query)->result();
    }
  
      public function tampil_biaya4()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Arif Rahman, S.Tr. Stat.'";
        return $this->db->query($query)->result();
    }
  
      public function tampil_biaya5()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Bimbi Ardhana Rizky, S.Stat'";
        return $this->db->query($query)->result();
    }
  
      public function tampil_biaya6()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Endri Setiawan, SE'";
        return $this->db->query($query)->result();
    }
    
        public function tampil_biaya7()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Firza Refo Adi Pratama, S.Tr.Stat.'";
        return $this->db->query($query)->result();
    }
  
      public function tampil_biaya8()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Leila Ayu Zanaria, SE'";
        return $this->db->query($query)->result();
    }
  
      public function tampil_biaya9()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Roma Dear Silitonga, SST'";
        return $this->db->query($query)->result();
    }
        public function tampil_biaya10()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Rafi Oktriatama, A.Md'";
        return $this->db->query($query)->result();
    }
  
      public function tampil_biaya11()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Umar'";
        return $this->db->query($query)->result();
    }
  
      public function tampil_biaya12()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Wahidi Astuti, SST'";
        return $this->db->query($query)->result();
    }
        public function tampil_biaya13()
    {
         $query = "SELECT SUM(total) as b FROM tb_bbm WHERE nama='Sultan Nabila Ravani, S.Tr.Stat'";
        return $this->db->query($query)->result();
    }

}

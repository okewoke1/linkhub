<?php 

class Laporan_model extends CI_Model
{   
    private $_table = "tb_spt";

    public $id_spt;
    public $file;
  
    public $tgl_laporan;
    public $status_laporan;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_spt" => $id])->row();
    }

    public function tampil_data()
    {
        return $this->db->query('SELECT * FROM  `tb_spt` WHERE statuspost=0 ORDER BY id_spt DESC');
    }

    public function getAllFiles(){
        $query = $this->db->get('tb_spt');
        return $query->result(); 
    }

     public function download($id){
        $query = $this->db->get_where('tb_spt',array('id_spt'=>$id));
        return $query->row_array();
    }








}


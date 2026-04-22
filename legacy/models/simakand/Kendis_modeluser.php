<?php 

class Kendis_modeluser extends CI_Model
{   
    private $_table = "tb_kendis";

    public $id_kendis;
    public $file;
    public $nama;
    public $status_post;
    public $nip;
    // public $suku_cadang;
    // public $pengerjaan;
    

    public function rules()
    {
       
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('nip','nip','required');
        $this->form_validation->set_rules('status_post','status_post','required');
        // $this->form_validation->set_rules('pengerjaan','pengerjaan','required');
        // $this->form_validation->set_rules('suku_cadang','suku_cadang','required');
        
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kendis" => $id])->row();
    }

    public function tampil_data($nip)
    {
    
        $query = "SELECT * FROM tb_kendis  ORDER BY id_kendis DESC";
        return $this->db->query($query)->result();
    }
    
    public function get_category(){
        $query =  $this->db->query('SELECT * FROM tb_user');
        return  $query->result();
    }

    public function input_data($data,$table){
        $this->db->insert($table,$data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kendis" => $id));
    }

}


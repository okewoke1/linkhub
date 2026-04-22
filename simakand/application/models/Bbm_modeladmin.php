<?php 

class Bbm_modeladmin extends CI_Model
{   
    private $_table = "tb_bbm";

    public $id_upload;
    public $status_upload;

    public function rules()
        {
            $this->form_validation->set_rules('status_upload','status_upload','required');
        }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_upload" => $id])->row();
    }

    public function tampil_data()
    {
        $query = "SELECT * FROM tb_bbm  ORDER BY id_upload DESC";
        return $this->db->query($query)->result();
    }
    
    public function get_category(){
        $query =  $this->db->query('SELECT * FROM master_users');
        return  $query->result();
    }

    public function input_data($data,$table){
        $this->db->insert($table,$data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_upload" => $id));
    }

    public function download($id){
        $query = $this->db->get_where('tb_bbm',array('id_upload'=>$id));
        return $query->row_array();
    }

public function update()
    {
        $post = $this->input->post();
        $this->id_upload = $post["id"];
        $this->status_upload = $post["status_upload"];

        return $this->db->update($this->_table, $this, array('id_upload' => $post['id']));
    }
}


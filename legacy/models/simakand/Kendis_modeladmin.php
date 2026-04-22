<?php 

class Kendis_modeladmin extends CI_Model
{   
    private $_table = "tb_kendis";

    public $id_kendis;
    public $status_post;

    public function rules()
    {
        $this->form_validation->set_rules('status_post','status_post','required');
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

    public function update()
    {
        $post = $this->input->post();
        $this->id_kendis = $post["id"];
        $this->status_post = $post["status_post"];

        return $this->db->update($this->_table, $this, array('id_kendis' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kendis" => $id));
    }

    public function download($id){
        $query = $this->db->get_where('tb_kendis',array('id_kendis'=>$id));
        return $query->row_array();
    }

}


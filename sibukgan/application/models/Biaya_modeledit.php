<?php 

class Biaya_modeledit extends CI_Model
{	
    private $_table = "tb_spt";

    public $id_spt;
    public $biaya_transport;
    public $uang_harian;
    public $biaya_penginapan;
    public $pengeluaran_riil;
    public $total;




    public function rules()
        {
            $this->form_validation->set_rules('total','total','required');
            $this->form_validation->set_rules('pengeluaran_riil','pengeluaran_riil','required');
            $this->form_validation->set_rules('uang_harian','uang_harian','required');
            $this->form_validation->set_rules('biaya_penginapan','biaya_penginapan','required');
            $this->form_validation->set_rules('biaya_transport','biaya_transport','required');
        }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_spt" => $id])->row();
    }
    
    public function get_category(){
        $query =  $this->db->query('SELECT * FROM master_users');
        return  $query->result();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_spt = $post["id"];
        $this->total = $post["total"]; 
        $this->biaya_transport = $post["biaya_transport"]; 
        $this->uang_harian = $post["uang_harian"];
        $this->biaya_penginapan = $post["biaya_penginapan"]; 
        $this->pengeluaran_riil = $post["pengeluaran_riil"];

        return $this->db->update($this->_table, $this, array('id_spt' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_spt" => $id));
    }


}


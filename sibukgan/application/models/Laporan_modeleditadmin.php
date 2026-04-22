<?php 

class Laporan_modeleditadmin extends CI_Model
{   
    private $_table = "tb_spt";

    public $id_spt;
    public $file;

    public $tgl_laporan;




    public function rules()
    {
        $this->form_validation->set_rules('tgl_laporan','tgl_laporan','required');
        // $this->form_validation->set_rules('status_laporan','status_laporan','required');
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
        $this->tgl_laporan = $post["tgl_laporan"];
        // $this->status_laporan = $post["status_laporan"];

        if (!empty($_FILES["file"]["name"])) {
            $this->file = $this->_upload();
        }else{
           $this->file = $post["old_file"];
        }
        $this->db->update($this->_table, $this, array('id_spt' => $post['id']));
    }

    private function _upload()
    {
        $config['upload_path']          = './assets/laporan/';
        $config['allowed_types']        = 'pdf|docx';
        $config['overwrite']            = true;
        $config['max_size']             = 2000; 

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        else {
                redirect('administrator/laporan2');
            }
    }

        public function auto_complete($nama_pegawai){
        $this->db->where('nama',$nama_pegawai);
        $query = $this->db->get('master_users');
        return $query->result();
    }



}


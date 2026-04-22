<?php 

class Laporan_modeluser extends CI_Model
{   
    private $_table = "tb_spt";

    public $id_spt;
    public $file;
    public $tgl_laporan;
    public $status_laporan;

    public function rules()
    {
        $this->form_validation->set_rules('tgl_laporan','tgl_laporan','required');
        $this->form_validation->set_rules('status_laporan','status_laporan','required'); 
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_spt" => $id])->row();
    }

    public function tampil_data($nip)
    {
        $query = "SELECT * FROM tb_spt WHERE statuspost=0 AND nip=$nip  ORDER BY id_spt DESC";
        return $this->db->query($query)->result();
    }
    

    public function get_category(){
        $query =  $this->db->query('SELECT * FROM master_users');
        return  $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_pegawai = $post["nama_pegawai"];
        $this->no_spt = $post["no_spt"];
        $this->file = $this->_upload();
        $this->tgl_berangkat = $post["tgl_berangkat"];
        $this->nip = $post["nip"];
        return $this->db->insert($this->_table, $this);

    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_spt = $post["id"]; 
        // $this->nama_pegawai = $post["nama_pegawai"];
        // $this->no_spt = $post["no_spt"];
        $this->tgl_laporan = $post["tgl_laporan"];
        $this->status_laporan = $post["status_laporan"];
        // $this->nip = $post["nip"];

        if (!empty($_FILES["file"]["name"])) {
            $this->file = $this->_upload();
        }else{
           redirect('user/laporan');        }
        $this->db->update($this->_table, $this, array('id_spt' => $post['id']));
    }

    private function _upload()
    {
        $config['upload_path']          = './assets/laporan/';
        $config['allowed_types']        = 'xlsx|xls';
        $config['overwrite']            = true;
        $config['max_size']             = 2000; 

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        else {
                redirect('user/laporan');
            }
    }

        public function auto_complete($nama_pegawai){
        $this->db->where('nama',$nama_pegawai);
        $query = $this->db->get('master_users');
        return $query->result();
    }



}


<?php 

class Bbm_modeluser extends CI_Model
{   
    private $_table = "tb_bbm";

    public $id_upload;
    public $tgl_upload;
    // public $file;

    public function rules()
        {
            $this->form_validation->set_rules('tgl_upload','tgl_upload','required');
        }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_upload" => $id])->row();
    }

    public function tampil_data($nip)
    {
        $query = "SELECT * FROM tb_bbm WHERE nip=$nip  ORDER BY id_upload DESC";
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
        $this->id_upload = $post["id_upload"]; 
        $this->tgl_upload = $post["tgl_upload"];

        // if (!empty($_FILES["file"]["name"])) {
        //     $this->file = $this->_upload();
        // }else{
        //    redirect('user/bbm');        }
        $this->db->update($this->_table, $this, array('id_upload' => $post['id_upload']));
    }

    private function _upload()
    {
        $config['upload_path']          = './assets/laporan/';
        $config['allowed_types']        = 'xls|xlsx';
        $config['overwrite']            = true;
        $config['max_size']             = 2000; 

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        else {
                redirect('user/bbm');
            }
    }

    public function save()
    {
        $post = $this->input->post();
        $this->tgl_spt = $post["tgl_spt"];
        $tgl_spt = date('Y-m-d', strtotime($tgl_spt));
        $this->pegawai = $post["pegawai"];
        $this->nomor = $post["nomor"];
        $this->keperluan = $post["keperluan"]; 
        $this->status_spd = $post["status_spd"];
        $this->nip = $post["nip"];  
        $this->nomor_spd = $post["nomor_spd"]; 
        $this->jabatan = $post["jabatan"]; 
        $this->menimbang = $post["menimbang"]; 
        $this->golongan_pegawai = $post["golongan_pegawai"]; 
        $this->pangkat_pegawai = $post["pangkat_pegawai"];
        $this->tempat_tugas = $post["tempat_tugas"]; 
        $this->kode_huruf = $post["kode_huruf"]; 
        $this->jenis_transport = $post["jenis_transport"];
        $this->tgl_berangkat = $post["tgl_berangkat"]; 
        $this->tgl_kembali = $post["tgl_kembali"];
      	$this->no = $post["no"];
        
        return $this->db->insert($this->_table, $this);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_upload" => $id));
    }

}


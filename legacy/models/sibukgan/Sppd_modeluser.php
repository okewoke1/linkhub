<?php 

class Sppd_modeluser extends CI_Model
{	
    private $_table = "tb_spt";

    public $id_spt;
    public $tgl_spt;
    public $pegawai;
    public $keperluan;
    public $nomor;
    public $pemberi_tugas;
    
    public $nip;
    public $nip_atasan;
    public $jabatan;
    public $jabatan_atasan;
    public $statuspost;



    public function rules()
        {
		$this->form_validation->set_rules('tgl_spt','tgl_spt','required');
		$this->form_validation->set_rules('pegawai','pegawai','required');
		$this->form_validation->set_rules('keperluan','keperluan','required');
        $this->form_validation->set_rules('nomor','nomor','required');
        $this->form_validation->set_rules('pemberi_tugas','pemberi_tugas','required');

        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('jabatan_atasan','jabatan_atasan','required');
        $this->form_validation->set_rules('nip','nip','required');
        $this->form_validation->set_rules('nip_atasan','nip_atasan','required');
        $this->form_validation->set_rules('statuspost','statuspost','required');
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
        // return $this->db->query('SELECT * FROM  `tb_spt` WHERE statuspost=1 AND nip=`$nip`  ORDER BY id_spt DESC');
    }
    

    public function get_category(){
        $query =  $this->db->query('SELECT * FROM user');
        return  $query->result();
    }

    public function auto_complete($nama){
        $this->db->where('nama',$nama);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function auto_complete2($pemberi_tugas){
        $this->db->where('nama',$pemberi_tugas);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_spt = $post["id"];
        $this->nomor = $post["nomor"];
        $this->tgl_spt = $post["tgl_spt"];
        $this->pegawai = $post["pegawai"];
        $this->keperluan = $post["keperluan"]; 
        $this->pemberi_tugas = $post["pemberi_tugas"]; 

        $this->nip = $post["nip"];   
        $this->nip_atasan = $post["nip_atasan"]; 
        $this->jabatan = $post["jabatan"]; 
        $this->jabatan_atasan = $post["jabatan_atasan"]; 
        $this->statuspost = $post["statuspost"]; 

        return $this->db->update($this->_table, $this, array('id_spt' => $post['id']));
    }

}


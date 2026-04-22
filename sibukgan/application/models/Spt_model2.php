<?php 

class Spt_model2 extends CI_Model
{	
    private $_table = "tb_spt";

    public $id_spt;
    public $tgl_spt;
    public $keperluan;
    public $nomor;
    public $no;
    public $tempat_tugas;
    public $kode_huruf;
    public $jenis_transport;
    public $menimbang;
    public $pegawai;
    public $nip;
    public $jabatan;
    public $golongan_pegawai;
    public $pangkat_pegawai;
    public $tgl_berangkat;
    public $tgl_kembali;
    public $anggota_1;
    public $status_spd;
    public $pangkat_1;
    public $golongan_1;
    public $jabatan_1;
    public $nip_1;



    public function rules()
        {
		$this->form_validation->set_rules('tgl_spt','tgl_spt','required');
		$this->form_validation->set_rules('pegawai','pegawai','required');
		$this->form_validation->set_rules('keperluan','keperluan','required');
        $this->form_validation->set_rules('nomor','nomor','required');
        // $this->form_validation->set_rules('pemberi_tugas','pemberi_tugas','required');

        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('menimbang','menimbang','required');
        $this->form_validation->set_rules('nip','nip','required');
        // $this->form_validation->set_rules('nip_atasan','nip_atasan','required');
        $this->form_validation->set_rules('golongan_pegawai','golongan_pegawai','required');
        $this->form_validation->set_rules('pangkat_pegawai','pangkat_pegawai','required');
        $this->form_validation->set_rules('anggota_1','anggota_1','required');
        $this->form_validation->set_rules('tempat_tugas','tempat_tugas','required');
        $this->form_validation->set_rules('kode_huruf','kode_huruf','required');
        
        $this->form_validation->set_rules('status_spd','status_spd','required');
        $this->form_validation->set_rules('tgl_berangkat','tgl_berangkat','required');
        $this->form_validation->set_rules('tgl_kembali','tgl_kembali','required');
        $this->form_validation->set_rules('no','no','required');
        $this->form_validation->set_rules('pangkat_1','pangkat_1','required');
        $this->form_validation->set_rules('golongan_1','golongan_1','required');
        $this->form_validation->set_rules('jabatan_1','jabatan_1','required');
        $this->form_validation->set_rules('nip_1','nip_1','required');
        }

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
        return $this->db->query('SELECT * FROM  tb_spt WHERE anggota_1 IS NOT NULL AND status_plh IS NULL ORDER BY id_spt DESC');
    }
    

    public function get_category(){
        $query =  $this->db->query('SELECT * FROM master_users');
        return  $query->result();
    }

    public function auto_complete($nama){
        $this->db->where('nama',$nama);
        $query = $this->db->get('master_users');
        return $query->result();
    }

    public function auto_complete2($anggota_1){
        $this->db->where('nama',$anggota_1);
        $query = $this->db->get('master_users');
        return $query->result();
    }
  

    public function save()
    {
        $post = $this->input->post();
        $this->tgl_spt = $post["tgl_spt"];
        $tgl_spt = date('Y-m-d', strtotime($tgl_spt));
        $this->pegawai = $post["pegawai"];
        $this->nomor = $post["nomor"];
        $this->keperluan = $post["keperluan"]; 
        $this->anggota_1 = $post["anggota_1"];

        $this->nip = $post["nip"];  
        $this->jabatan = $post["jabatan"]; 
        $this->menimbang = $post["menimbang"]; 
        $this->golongan_pegawai = $post["golongan_pegawai"]; 
        $this->pangkat_pegawai = $post["pangkat_pegawai"];

        $this->tempat_tugas = $post["tempat_tugas"]; 
        $this->kode_huruf = $post["kode_huruf"]; 
        $this->status_spd = $post["status_spd"];
        $this->no = $post["no"];
        $this->tgl_berangkat = $post["tgl_berangkat"]; 
        $this->tgl_kembali = $post["tgl_kembali"];
        $this->jenis_transport = $post["jenis_transport"];
        $this->nomor_spd = $post["nomor_spd"]; 
        $this->pangkat_1 = $post["pangkat_1"];
        $this->golongan_1 = $post["golongan_1"]; 
        $this->jabatan_1 = $post["jabatan_1"];
        $this->nip_1 = $post["nip_1"];
        
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_spt = $post["id"];
        $this->nomor = $post["nomor"];
        $this->tgl_spt = $post["tgl_spt"];
        $this->pegawai = $post["pegawai"];
        $this->keperluan = $post["keperluan"]; 
        // $this->pemberi_tugas = $post["pemberi_tugas"]; 
        $this->status_spd = $post["status_spd"];
        $this->nip = $post["nip"];   
        // $this->nip_atasan = $post["nip_atasan"]; 
        $this->jabatan = $post["jabatan"]; 
        $this->menimbang = $post["menimbang"]; 
        $this->golongan_pegawai = $post["golongan_pegawai"]; 
        $this->pangkat_pegawai = $post["pangkat_pegawai"];
        // $this->statuspost = $post["statuspost"]; 

        return $this->db->update($this->_table, $this, array('id_spt' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_spt" => $id));
    }

      public function auto_code()
    {
        $this->db->select_max('no');
        $this->db->where ('id_spt >= 746');
        $query = $this->db->get('tb_spt');
        return $query->result_array();
    }

    public function auto_code2()
    {
        $this->db->select_max('nomor_spd');
       $this->db->where ('status_spd = 1');
      	$this->db->where ('id_spt >= 738');
        $query = $this->db->get('tb_spt');
        return $query->result_array();
    }


}


<?php 

class Biaya_model extends CI_Model
{	
    private $_table = "tb_spt";

    public $id_spt;
    public $tgl_spt;
    
    public $keperluan;
    public $nomor;
  	public $no;

    public $tempat_tugas;
    public $kode_huruf;

    public $kode_angka;

    public $menimbang;

    public $pegawai;
    public $nip;
    public $jabatan;
    public $golongan_pegawai;
    public $pangkat_pegawai;
    public $tgl_berangkat;
    public $tgl_kembali;
    public $status_spd;



    public function rules()
        {
		$this->form_validation->set_rules('tgl_spt','tgl_spt','required');
		$this->form_validation->set_rules('pegawai','pegawai','required');
		$this->form_validation->set_rules('keperluan','keperluan','required');
        $this->form_validation->set_rules('nomor','nomor','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('menimbang','menimbang','required');
        $this->form_validation->set_rules('nip','nip','required');
        $this->form_validation->set_rules('golongan_pegawai','golongan_pegawai','required');
        $this->form_validation->set_rules('pangkat_pegawai','pangkat_pegawai','required');
        $this->form_validation->set_rules('status_spd','status_spd','required');
        $this->form_validation->set_rules('tempat_tugas','tempat_tugas','required');
        $this->form_validation->set_rules('kode_huruf','kode_huruf','required');
        $this->form_validation->set_rules('kode_angka','kode_angka','required');
       
        $this->form_validation->set_rules('tgl_berangkat','tgl_berangkat','required');
        $this->form_validation->set_rules('tgl_kembali','tgl_kembali','required');
      	$this->form_validation->set_rules('no','no','required');
        }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_spt" => $id])->row();
    }

    // public function tampil_data()
    // {
    //     return $this->db->query('SELECT * FROM  `tb_spt` WHERE anggota_1 IS NULL ORDER BY id_spt DESC');
    // }

    public function tampil_data($nip)
    {
        $query = "SELECT * FROM tb_spt WHERE statuspost=0 AND nip=$nip  ORDER BY id_spt DESC";
        return $this->db->query($query)->result();
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
  



}


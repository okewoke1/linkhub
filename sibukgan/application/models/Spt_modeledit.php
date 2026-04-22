<?php 

class Spt_modeledit extends CI_Model
{	
    private $_table = "tb_spt";

    public $id_spt;
    public $tgl_spt;
    public $keperluan;
    public $nomor;
  	public $no;
    public $tempat_tugas;
    public $kode_huruf;
    public $menimbang;
    public $pegawai;
    public $nip;
    public $jabatan;
    public $golongan_pegawai;
    public $pangkat_pegawai;
    public $tgl_berangkat;
    public $tgl_kembali;





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
        $this->form_validation->set_rules('tempat_tugas','tempat_tugas','required');
        $this->form_validation->set_rules('kode_huruf','kode_huruf','required'); 
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
    
    public function get_category(){
        $query =  $this->db->query('SELECT * FROM master_users');
        return  $query->result();
    }
public function auto_complete($nama){
        $this->db->where('nama',$nama);
        $query = $this->db->get('master_users');
        return $query->result();
    }




    public function update()
    {
        $post = $this->input->post();
     	$this->id_spt = $post["id"];
        $this->tgl_spt = $post["tgl_spt"];
       
        $this->pegawai = $post["pegawai"];
        $this->nomor = $post["nomor"];
        $this->keperluan = $post["keperluan"]; 
        $this->nip = $post["nip"];  
        $this->jabatan = $post["jabatan"]; 
        $this->menimbang = $post["menimbang"]; 
        $this->golongan_pegawai = $post["golongan_pegawai"]; 
        $this->pangkat_pegawai = $post["pangkat_pegawai"];
        $this->tempat_tugas = $post["tempat_tugas"]; 
        $this->kode_huruf = $post["kode_huruf"]; 
        $this->tgl_berangkat = $post["tgl_berangkat"]; 
        $this->tgl_kembali = $post["tgl_kembali"];
      	$this->no = $post["no"];

        return $this->db->update($this->_table, $this, array('id_spt' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_spt" => $id));
    }


}


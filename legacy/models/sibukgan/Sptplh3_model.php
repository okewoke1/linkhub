<?php 

class Sptplh3_model extends CI_Model
{	
    private $_table = "tb_mitra";

    public $id_mitra;
    public $kecamatan;
    public $menimbang;
    public $nama;
    public $tgl_mulai;
    public $tgl_selesai;
    public $no;
    public $tgl_sptmitra;
    public $keperluan;


    public function rules()
        {
		$this->form_validation->set_rules('kecamatan','kecamatan','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('menimbang','menimbang','required');
        $this->form_validation->set_rules('tgl_mulai','tgl_mulai','required');
        $this->form_validation->set_rules('tgl_selesai','tgl_selesai','required');
        $this->form_validation->set_rules('menimbang','menimbang','required');
        $this->form_validation->set_rules('no','no','required');
        $this->form_validation->set_rules('tgl_sptmitra','tgl_sptmitra','required');
        $this->form_validation->set_rules('keperluan','keperluan','required');
        }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_mitra" => $id])->row();
    }

    public function tampil_data()
    {
        return $this->db->query('SELECT * FROM  `tb_mitra`  ORDER BY id_mitra DESC');
    }

    public function get_category(){
        $query =  $this->db->query('SELECT * FROM mitra');
        return  $query->result();
    }
  
        public function auto_code()
    {
        $this->db->select_max('no');
        $this->db->where ('id_mitra >= 30');
        $query = $this->db->get('tb_mitra');
        return $query->result_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->menimbang = $post["menimbang"];
        $this->kecamatan = $post["kecamatan"];  
        $this->tgl_mulai = $post["tgl_mulai"]; 
        $this->tgl_selesai = $post["tgl_selesai"];
      	$this->no = $post["no"];
        $this->tgl_sptmitra = $post["tgl_sptmitra"];
        $tgl_sptmitra = date('Y-m-d', strtotime($tgl_sptmitra));
      	$this->keperluan = $post["keperluan"];
        
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

        return $this->db->update($this->_table, $this, array('id_mitra' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_mitra" => $id));
    }
  



}


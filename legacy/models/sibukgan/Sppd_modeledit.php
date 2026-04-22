<?php 

class Sppd_modeledit extends CI_Model
{	
    private $_table = "tb_spt";

    public $id_spt;
    public $tgl_spd;
    public $tujuan;
    public $pejabat_pemberi_perintah;
    public $asal;
    public $jenis_transport;
    public $tgl_berangkat;
    public $tgl_kembali;
    public $mata_anggaran;
    public $output;
    public $komponen;
    public $kegiatan;
    public $program;
    public $nip_ppk;
    // public $status_spd;


    public function rules()
        {
		
		$this->form_validation->set_rules('tgl_spd','tgl_spd','required');

		$this->form_validation->set_rules('tujuan','tujuan','required');
		$this->form_validation->set_rules('pejabat_pemberi_perintah','pejabat_pemberi_perintah','required');
		$this->form_validation->set_rules('asal','asal','required');
		$this->form_validation->set_rules('jenis_transport','jenis_transport','required');
		$this->form_validation->set_rules('tgl_berangkat','tgl_berangkat','required');
		$this->form_validation->set_rules('tgl_kembali','tgl_kembali','required');

		$this->form_validation->set_rules('mata_anggaran','mata_anggaran','required');
        $this->form_validation->set_rules('komponen','komponen','required');
        $this->form_validation->set_rules('output','output','required');
        $this->form_validation->set_rules('program','program','required');
        $this->form_validation->set_rules('kegiatan','kegiatan','required');

        $this->form_validation->set_rules('nip_ppk','nip_ppk','required');
        // $this->form_validation->set_rules('status_spd','status_spd','required');
       

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
    	$query =  $this->db->query('SELECT * FROM user');
 		return  $query->result();
    }

    public function get_kecamatan(){
        $query =  $this->db->query('SELECT * FROM master_kecamatan');
        return  $query->result();
    }

    // public function tampil_data()
    // {
    //     return $this->db->query('SELECT * FROM  `tb_spt` WHERE statuspost=1 AND status_laporan=1 ORDER BY id_spt DESC');
    // }

    public function auto_complete($pejabat_pemberi_perintah){
        $this->db->where('nama',$pejabat_pemberi_perintah);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function auto_complete2($pegawai){
        $this->db->where('nama',$pegawai);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_spt = $post["id"];

        $this->tgl_spd = $post["tgl_spd"];
        $this->tujuan = ucfirst($post["tujuan"]);
        $this->pejabat_pemberi_perintah = $post["pejabat_pemberi_perintah"];
        $this->asal = $post["asal"];
        $this->jenis_transport = $post["jenis_transport"];
        $this->tgl_berangkat = $post["tgl_berangkat"];
        $this->tgl_kembali = $post["tgl_kembali"];
        $this->mata_anggaran = $post["mata_anggaran"];  
        $this->kegiatan = $post["kegiatan"];
        $this->komponen = $post["komponen"];
        $this->program = $post["program"];
        $this->output = $post["output"];  
        $this->nip_ppk = $post["nip_ppk"];
        // $this->status_spd = $post["status_spd"];
       

        return $this->db->update($this->_table, $this, array('id_spt' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_spt" => $id));
    }

}


<?php 

class Spd_modelbendahara extends CI_Model
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
    //     return $this->db->query('SELECT * FROM  `tb_spt` WHERE status_spd=1 ORDER BY id_spt DESC');
    // }


}


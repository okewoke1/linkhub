<?php 

class Sppd_model extends CI_Model
{	
    private $_table = "tb_spt";

    public $id_spt;
    public $tgl_spt;
    public $nomor;
    public $no;
    public $tempat_tugas;
    public $pegawai;
    public $tgl_berangkat;
    public $tgl_kembali;
    public $status_spd;
    public $nomor_spd;
    public $anggota_1;

    

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
        $query = "SELECT * FROM tb_spt WHERE status_spd=1  ORDER BY id_spt DESC";
        return $this->db->query($query)->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_spt" => $id));
    }


}


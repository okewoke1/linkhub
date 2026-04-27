<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penilaian extends CI_Model {

    public function getUsersWithPenilaian($bulan, $tahun, $id_penilai) {
        $this->db->select('
            t_user.id, 
            t_user.username, 
            t_user.nip_bps, 
            t_user.nip, 
            t_user.email, 
            pen.berorientasi_pelayanan, 
            pen.akuntabel, 
            pen.kompeten, 
            pen.harmonis, 
            pen.loyal, 
            pen.adaptif, 
            pen.kolaboratif
        ');
        $this->db->from('t_user');
        $this->db->join('penilaian_berakhlak pen', 
            'pen.id_user = t_user.id 
            AND pen.periode_bulan = '.$this->db->escape($bulan).' 
            AND pen.periode_tahun = '.$this->db->escape($tahun).' 
            AND pen.id_penilai = '.$this->db->escape($id_penilai), 
            'left'
        );
        $this->db->where('t_user.is_active', 1);
        
        $this->db->where('LOWER(t_user.username) !=', 'Imam Setia Harnomo SST, M.Stat');
        return $this->db->get()->result();
    }

    public function cekPenilaianExist($id_user, $id_penilai, $bulan, $tahun) {
        $this->db->where([
            'id_user' => $id_user,
            'id_penilai' => $id_penilai,
            'periode_bulan' => $bulan,
            'periode_tahun' => $tahun
        ]);
        $query = $this->db->get('penilaian_berakhlak');
        return $query->row() ? true : false;
    }
    
        public function getRekapRataRata($bulan, $tahun)
    {
        $this->db->select('
            pb.id_user,
            u.username,
            AVG(pb.berorientasi_pelayanan) as berorientasi_pelayanan,
            AVG(pb.akuntabel) as akuntabel,
            AVG(pb.kompeten) as kompeten,
            AVG(pb.harmonis) as harmonis,
            AVG(pb.loyal) as loyal,
            AVG(pb.adaptif) as adaptif,
            AVG(pb.kolaboratif) as kolaboratif
        ');
        $this->db->from('penilaian_berakhlak pb');
        $this->db->join('t_user u', 'u.id = pb.id_user'); // ubah dari users ke t_user
        $this->db->where('pb.periode_bulan', $bulan);
        $this->db->where('pb.periode_tahun', $tahun);
        $this->db->group_by('pb.id_user');
        return $this->db->get()->result();
    }
    
    public function getStatusPenilaianPerPenilai($bulan, $tahun) {
        $this->db->select('
            u.id AS id_penilai,
            u.username,
            COUNT(pb.id_user) AS jumlah_dinilai
        ');
        $this->db->from('t_user u');
        $this->db->join('penilaian_berakhlak pb', 
            'pb.id_penilai = u.id AND pb.periode_bulan = ' . $this->db->escape($bulan) . ' AND pb.periode_tahun = ' . $this->db->escape($tahun),
            'left'
        );
        $this->db->where('u.is_active', 1);
        $this->db->group_by(['u.id', 'u.username']);
        $this->db->order_by('u.username', 'asc');
    
        return $this->db->get()->result();
    }



    public function insertPenilaian($data) {
        return $this->db->insert('penilaian_berakhlak', $data);
    }
    
    public function kunciPeriode($bulan, $tahun)
    {
        $this->db->where('periode_bulan', $bulan);
        $this->db->where('periode_tahun', $tahun);
        $this->db->update('penilaian_berakhlak', ['terkunci' => 1]);
    }

    public function bukaPeriodePenilaian($bulan, $tahun)
    {
        $this->db->where('periode_bulan', $bulan);
        $this->db->where('periode_tahun', $tahun);
        $this->db->update('penilaian_berakhlak', ['terkunci' => 0]);
    }

    public function kunciPeriodePenilaian($bulan, $tahun)
    {
        $this->db->where('periode_bulan', $bulan);
        $this->db->where('periode_tahun', $tahun);
        $this->db->where('terkunci', 1);
        return $this->db->count_all_results('penilaian_berakhlak') > 0;
    }




}
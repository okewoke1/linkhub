<?php
Class Dashboard_modeladmin extends CI_Model
{

	private $_table = "master_users";

    public $id;

    public $username;
    public $password;
    public $email;

  function Jum_spt()
    {
        $this->db->group_by('tgl_spt');
        $this->db->select('tgl_spt');
        $this->db->select("count(*) as total");
        return $this->db->from('tb_spt')
          ->get()
          ->result();
    }

    function Nam_peg()
    {
        $this->db->group_by('pegawai');
        $this->db->select('pegawai');
        return $this->db->from('tb_spt')
          ->get()
          ->result();
    }
    

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

        public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];    

        $this->username = $post["username"];
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->email = $post["email"];

        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }


public function getMonitoringTugas($bulan, $tahun) {
    $this->db->select('user.id, user.nama AS nama_pegawai, tb_spt.tgl_berangkat, tb_spt.tgl_kembali, tb_spt.nomor');
$this->db->from('user');
$this->db->join('tb_spt', "(user.nama = tb_spt.pegawai OR user.nama = tb_spt.anggota_1) AND MONTH(tb_spt.tgl_berangkat) = $bulan AND YEAR(tb_spt.tgl_berangkat) = $tahun", 'left');


    $this->db->order_by("(CASE WHEN user.nama = 'Imam Setia Harnomo SST, M.Stat' THEN 0 ELSE 1 END), user.nama ASC");
    $query = $this->db->get();

    $result = [];
foreach ($query->result_array() as $row) {
    $nama = $row['nama_pegawai'];
    $tgl_awal = $row['tgl_berangkat'];
    $tgl_akhir = $row['tgl_kembali'];
    $kode = $row['nomor'];

    if (!isset($result[$nama])) {
        $result[$nama] = [
            'nama_pegawai' => $nama,
            'tanggal' => []
        ];
    }

    if ($tgl_awal && $tgl_akhir) {
        $start = new DateTime($tgl_awal);
        $end = new DateTime($tgl_akhir);
        while ($start <= $end) {
            $day = (int)$start->format('j'); // Ambil tanggal (1–31)
            $result[$nama]['tanggal'][$day] = $kode;
            $start->modify('+1 day');
        }
    }
}


    return array_values($result); // Reset index jadi 0,1,2...
}





}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autocomplete_model extends CI_Model
{

    public function search_data($searchTerm)
    {
        // Query data dari database berdasarkan kata kunci pencarian
        $this->db->like('nama_mitra', $searchTerm);
        $query = $this->db->get('t_mitra');

        // Mengembalikan hasil dalam bentuk array
        return $query->result_array();
    }
}

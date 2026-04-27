<?php
use PhpOffice\PhpSpreadsheet\IOFactory;

class Mitra extends CI_Controller
{
    public function import_excel()
    {
        if (!isset($_FILES['file_excel']['name'])) {
            redirect('administrator/mitra');
        }

        $file = $_FILES['file_excel']['tmp_name'];
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        for ($i = 1; $i < count($sheet); $i++) {
            $nama_mitra = trim($sheet[$i][0]);

            if ($nama_mitra == '') continue;

            // CEK DUPLIKAT
            $cek = $this->db
                ->where('mitra', $nama_mitra)
                ->get('mitra')
                ->num_rows();

            if ($cek == 0) {
                $this->db->insert('mitra', [
                    'mitra' => $nama_mitra
                ]);
            }
        }

        $this->session->set_flashdata(
            'success',
            'Data mitra berhasil diimport'
        );

        redirect('administrator/sptmitralam/add');
    }
}

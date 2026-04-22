<?php

// use PhpOffice\PhpSpreadsheet\IOFactory;

// require_once APPPATH . 'vendor/autoload.php'; // Memuat autoload.php dari vendor

class Mitra extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['is_logged_in'])) {
            $this->session->set_flashdata('pesan', 'Anda belum login!');
            redirect('login');
        }
    }

    public function index()
    {
        // Kirim data ke view
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');
        $data['username'] = $username;

        $data['mitra'] = $this->M_mitra->tampil_data()->result();


        if ($level == '1') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar_adm', $data);
            $this->load->view('mitra', $data);
            $this->load->view('template/footer');
        } else if ($level == '2') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('mitra', $data);
            $this->load->view('template/footer');
        } else {
            show_error('Access Denied', 403, 'Forbidden');
        }
    }

    public function tambah_aksi()
    {
        $id_sobat = $this->input->post('id_sobat');
        $nama_mitra = $this->input->post('nama_mitra');
        $nik = $this->input->post('nik');
        $telp = $this->input->post('telp');
        $alamat = $this->input->post('alamat');

        $data = array(
            'id_sobat' => $id_sobat,
            'nama_mitra' => $nama_mitra,
            'nik' => $nik,
            'telp' => $telp,
            'alamat' => $alamat,
        );

        $this->M_mitra->input_data($data, "t_mitra");
        redirect('mitra/index');
    }

    public function hapus($id_sobat)
    {
        $data = array('id_sobat' => $id_sobat);
        $this->M_mitra->hapus_data($data, "t_mitra");
        redirect('mitra/index');
    }
    public function edit($id_sobat)
    {
        // Kirim data ke view
        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');
        $data['username'] = $username;

        $where = array('id_sobat' => $id_sobat);
        $data['mitra'] = $this->M_mitra->edit_data($where, 't_mitra')->result();

        $level = $this->session->userdata('level');
        if ($level == '1') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar_adm', $data);
            $this->load->view('edit', $data);
            $this->load->view('template/footer');
        } else if ($level == '2') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('edit', $data);
            $this->load->view('template/footer');
        } else {
            show_error('Access Denied', 403, 'Forbidden');
        }
    }
    public function update()
    {
        $id_lama = $this->input->post('id_lama');
        $id_sobat = $this->input->post('id_sobat');
        $nama_mitra = $this->input->post('nama_mitra');
        $nik = $this->input->post('nik');
        $telp = $this->input->post('telp');
        $alamat = $this->input->post('alamat');

        $data = array(
            'id_sobat' => $id_sobat,
            'nama_mitra' => $nama_mitra,
            'nik' => $nik,
            'telp' => $telp,
            'alamat' => $alamat,
        );
        $where = array(
            'id_sobat' => $id_lama
        );
        $this->M_mitra->update_data($where, $data, 't_mitra');
        redirect('mitra/index');
    }


    public function import_mitra()
    {
        $config['upload_path'] = './uploads/'; // Folder tempat menyimpan file Excel
        $config['allowed_types'] = 'xlsx|xls'; // Jenis file yang diizinkan untuk diunggah
        $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobyte)

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_mitra')) {
            $error = $this->upload->display_errors();
            echo json_encode(['status' => 'error', 'message' => $error]);
        } else {
            $data = $this->upload->data();
            $file_path = './uploads/' . $data['file_name'];

            try {
                $spreadsheet = IOFactory::load($file_path);
                $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                // Cek header kolom
                $expected_headers = ['A' => 'ID SOBAT', 'B' => 'NAMA MITRA', 'C' => 'NIK', 'D' => 'TELP', 'E' => 'ALAMAT'];
                $header_row = $sheetData[1];

                foreach ($expected_headers as $column => $header) {
                    if ($header_row[$column] !== $header) {
                        throw new Exception('Format tabel tidak sesuai. Kolom yang diharapkan: ' . implode(', ', $expected_headers));
                    }
                }

                $errors = [];
                $success_count = 0;

                foreach ($sheetData as $key => $row) {
                    if ($key === 1) continue; // Skip header row

                    $id_sobat = $row['A'];
                    $nama_mitra = $row['B'];
                    $nik = $row['C'];
                    $telp = $row['D'];
                    $alamat = $row['E'];

                    $existing_mitra = $this->M_mitra->get_by_id_sobat($id_sobat);
                    if ($existing_mitra) {
                        $errors[] = "ID $id_sobat sudah terdaftar, coba cek kembali.";
                        continue;
                    }

                    $data = [
                        'id_sobat' => $id_sobat,
                        'nama_mitra' => $nama_mitra,
                        'nik' => $nik,
                        'telp' => $telp,
                        'alamat' => $alamat
                    ];
                    $this->M_mitra->input_data($data, "t_mitra");
                    $success_count++;
                }

                unlink($file_path);

                if (empty($errors)) {
                    echo json_encode(['status' => 'success', 'message' => "Data berhasil diimpor. Jumlah data yang berhasil diimpor: $success_count."]);
                } else {
                    $error_messages = implode('<br>', $errors);
                    echo json_encode(['status' => 'error', 'message' => "Gagal mengimpor data:<br>$error_messages"]);
                }
            } catch (Exception $e) {
                echo json_encode(['status' => 'error', 'message' => 'Gagal memproses file Excel: ' . $e->getMessage()]);
            }
        }
    }
    public function download_template()
    {
        // Lokasi file template Excel
        $template_path = './template/template_mitra.xlsx';

        // Periksa apakah file template Excel tersedia
        if (!file_exists($template_path)) {
            show_error('File template Excel tidak ditemukan.', 404, 'File Not Found');
        }

        // Atur header untuk tipe konten file Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="template_mitra.xlsx"');
        header('Cache-Control: max-age=0');

        // Baca dan kirimkan file template Excel kepada pengguna
        readfile($template_path);
        exit();
    }
}

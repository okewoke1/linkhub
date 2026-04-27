<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php';






class Sptmitralam extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!isset($this->session->userdata['email'])) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda belum login!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('login');
        }
    }

    public function index()
    {
        $user = $this->User_model->ambil_data($this->session->userdata['email']);

        $data = array(
            'email' => $user->email,
            'id'    => set_value('id')
        );

        $data['sptmitra'] = $this->Spt_modelmitra->tampil_data()->result();

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar', $data);
        $this->load->view('administrator/sptmitralam', $data);
        $this->load->view('template_administrator/footer');
    }

    public function add()
    {
        $user = $this->User_model->ambil_data($this->session->userdata['email']);

        $data = array(
            'email' => $user->email,
            'id'    => set_value('id')
        );

        $data['mitra'] = $this->Spt_modelmitralam->get_category();
        $data['kd']    = $this->Spt_modelmitralam->auto_code();

        $this->form_validation->set_rules($this->Spt_modelmitralam->rules());

        if ($this->form_validation->run()) {
            $this->Spt_modelmitralam->save();
            redirect('administrator/sptmitralam');
        }

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar', $data);
        $this->load->view('administrator/sptmitralam_form', $data);
        $this->load->view('template_administrator/footer');
    }

    public function delete($id = null)
    {
        if (!$id) show_404();

        if ($this->Spt_modelmitra->delete($id)) {
            redirect('administrator/sptmitralam');
        }
    }

    public function cetak_sptmitralam($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_mitra ts WHERE ts.id_mitra='$id'")->result();
        $this->load->view('administrator/cetak_sptmitralam', $data);
    }

    public function get_mitra()
    {
        $search = $this->input->get('q');
        $mitra  = $this->Spt_modelmitralam->get_mitra($search);

        echo json_encode([
            'results' => $mitra
        ]);
    }

    /* =======================
       IMPORT EXCEL MITRA
       ======================= */
public function import_excel()
{
    $file = $_FILES['file_excel']['tmp_name'];
    if (!$file) {
        redirect('administrator/sptmitralam/add');
        return;
    }

    $spreadsheet = IOFactory::load($file);
    $rows = $spreadsheet->getActiveSheet()->toArray();

    foreach ($rows as $i => $row) {
        if ($i == 0) continue;
        if (empty($row[0])) continue;

        $cek = $this->db
            ->get_where('mitra', ['mitra' => trim($row[0])])
            ->row();

        if (!$cek) {
            $this->db->insert('mitra', [
                'mitra' => trim($row[0])
            ]);
        }
    }

    $this->session->set_flashdata('success', 'Import mitra berhasil');
    redirect('administrator/sptmitralam/add');
}


}

<?php
class Laporan2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        if (!isset($this->session->userdata['email'])){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda belum login!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('sibukgan/login'); 
        }
    }

    public function index()
    {
        $data = $this->B_User_model->ambil_data($this->session->userdata ['email']);
        $data = array( 
                'email' => $data->email, 
                'id' => set_value('id'),
                'nip' => $data->nip,
    );
        $nip = $data['nip'];
        $data['laporan'] = $this->Laporan_modeladmin->tampil_data($nip);
        $this->load->view('sibukgan/template_administrator/header');
        $this->load->view('sibukgan/template_administrator/sidebar',$data);
        $this->load->view('sibukgan/administrator/laporan2', $data);
        $this->load->view('sibukgan/template_administrator/footer');
    }

    public function download($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->Laporan_model->download($id);
        $file = 'assets/sibukgan/laporan/'.$fileinfo['file'];
        force_download($file, NULL);
    }

    public function edit($id = null)
    {
        $data = $this->B_User_model->ambil_data($this->session->userdata ['email']);
        $data = array( 
                'email' => $data->email, 
                'id' => set_value('id'),

    );
        $data['pegawai'] = $this->Laporan_modeladmin->get_category();
        if (!isset($id)) redirect('sibukgan/administrator/laporan2');
       
        $laporan = $this->Laporan_modeladmin;
        $validation = $this->form_validation;
        $validation->set_rules($laporan->rules());

        if ($validation->run()) {
            $laporan->update();
            $this->session->set_flashdata('success', 'Berhasil Upload Laporan');
        }

        $data["laporan"] = $laporan->getById($id);
        if (!$data["laporan"]) show_404();
        
        $this->load->view('sibukgan/template_administrator/header');
        $this->load->view('sibukgan/template_administrator/sidebar',$data);
        $this->load->view('sibukgan/administrator/laporanadmin_form',$data);
        $this->load->view('sibukgan/template_administrator/footer');
    }

        public function edit2($id = null)
    {
        $data = $this->B_User_model->ambil_data($this->session->userdata ['email']);
        $data = array( 
                'email' => $data->email, 
                'id' => set_value('id'),

    );
        $data['pegawai'] = $this->Laporan_modeleditadmin->get_category();
        if (!isset($id)) redirect('sibukgan/administrator/laporan2');
       
        $laporan = $this->Laporan_modeleditadmin;
        $validation = $this->form_validation;
        $validation->set_rules($laporan->rules());

        if ($validation->run()) {
            $laporan->update();
            $this->session->set_flashdata('success', 'Berhasil diupdate');
        }

        $data["laporan"] = $laporan->getById($id);
        if (!$data["laporan"]) show_404();
        
        $this->load->view('sibukgan/template_administrator/header');
        $this->load->view('sibukgan/template_administrator/sidebar',$data);
        $this->load->view('sibukgan/administrator/laporan_editadmin',$data);
        $this->load->view('sibukgan/template_administrator/footer');
    }

}


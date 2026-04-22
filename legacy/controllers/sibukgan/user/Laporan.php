<?php
class Laporan extends CI_Controller
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
    );
        $data['laporan'] = $this->Laporan_model->tampil_data()->result();
        
       
        $this->load->view('sibukgan/template_user/header');
        $this->load->view('sibukgan/template_user/sidebar',$data);
        $this->load->view('sibukgan/user/laporan', $data);
        $this->load->view('sibukgan/template_user/footer');
    }

    public function download($id){
        $this->load->helper('download');
        $fileinfo = $this->Laporan_model->download($id);
        $file = 'assets/sibukgan/laporan/'.$fileinfo['file'];
        force_download($file, NULL);
    }

}


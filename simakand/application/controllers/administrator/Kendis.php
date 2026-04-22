<?php
class Kendis extends CI_Controller
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
            redirect('login'); 
        }
    }

    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata ['email']);
        $data = array( 
                'email' => $data->email, 
                'id' => set_value('id'),
                'nip' => $data->nip,
                
    );
        $data['user'] = $this->db->get_where('master_users',['nip' => $this->session->userdata('nip')])->row_array();
        $nip = $data['nip'];
        $data['kendis'] = $this->Kendis_modeladmin->tampil_data($nip);
        

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar',$data);
        $this->load->view('administrator/kendis', $data);
        $this->load->view('template_administrator/footer');
    }

    public function upload()
    {
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $status_post = $this->input->post('status_post');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $tgl_klaim = $this->input->post('tgl_klaim');
        $bengkel = $this->input->post('bengkel');
        // $suku_cadang = $this->input->post('suku_cadang');
        // $pengerjaan = $this->input->post('pengerjaan');
        $biaya = $this->input->post('biaya');

        $file = $_FILES['userfile'];
        if ($file=''){}else{
            $config['upload_path']          = './assets/laporan';
            $config['allowed_types']        = 'docx|doc|pdf'; 
            $config['max_size']             = 2000;

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('userfile')) {
                echo "Proses gagal"; die();
            }else{
                $file=$this->upload->data('file_name');
            }
            
        }

                $data = array(
                    'nama' => $nama,
                    'nip' => $nip, 
                    'file' => $file,
                    'status_post' => $status_post,
                    'tgl_klaim' => $tgl_klaim,
                    'tgl_masuk' => $tgl_masuk,
                    'tgl_keluar' => $tgl_keluar,
                    'bengkel' => $bengkel,
                    // 'pengerjaan' => $pengerjaan,
                    // 'suku_cadang' => $suku_cadang,
                    'biaya' => $biaya,
                );

                $this->Kendis_modeladmin->input_data($data, 'tb_kendis');
                redirect('administrator/kendis');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Kendis_modeladmin->delete($id)) {
            redirect(site_url('administrator/kendis'));
        }
    }

    public function download($id){
        $this->load->helper('download');
        $fileinfo = $this->Kendis_modeladmin->download($id);
        $file = 'assets/laporan/'.$fileinfo['file'];
        force_download($file, NULL);
    }

    public function edit($id = null)
    {
        $data = $this->User_model->ambil_data($this->session->userdata ['email']);
        $data = array( 
                'email' => $data->email, 
                'id' => set_value('id'),

    );
        if (!isset($id)) redirect('administrator/kendis');
       
        $kendis = $this->Kendis_modeladmin;
        $validation = $this->form_validation;
        $validation->set_rules($kendis->rules());

        if ($validation->run()) {
            $kendis->update();
            redirect('administrator/kendis');
        }

        $data["kendis"] = $kendis->getById($id);
        if (!$data["kendis"]) show_404();

        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar',$data);
        $this->load->view('administrator/kendis_form',$data);
        $this->load->view('template_administrator/footer');
    }


}


<?php
class Bbm extends CI_Controller
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
    
        $nip = $data['nip'];
        $data['bbm'] = $this->Bbm_modeluser->tampil_data($nip);
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar',$data);
        $this->load->view('user/bbm', $data);
        $this->load->view('template_user/footer');
    }

    public function upload()
    {
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $tgl_upload = $this->input->post('tgl_upload');
        $status_upload = $this->input->post('status_upload');
        $biaya = $this->input->post('biaya');
      	$biaya_kendis = $this->input->post('biaya_kendis');
      	$total = $this->input->post('total');
        $file = $_FILES['userfile'];
        if ($file=''){}else{
            $config['upload_path']          = './assets/laporan';
            $config['allowed_types']        = 'xlsx|xls|pdf|docx'; 
            $config['max_size']             = 5000;

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
                    'tgl_upload' => $tgl_upload,
                    'file' => $file,
                    'status_upload' => $status_upload,
                    'biaya' => $biaya,
                  	'biaya_kendis' => $biaya_kendis,
                  	'total' => $total,
                );

                $this->Bbm_modeluser->input_data($data, 'tb_bbm');
                redirect('user/bbm');

        
    }

    public function autofill()
    {
        if ($this->input->post('nama_pegawai')){
            echo json_encode($this->Bbm_modeluser->auto_complete($this->input->post('nama_pegawai')));
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Bbm_modeluser->delete($id)) {
            redirect(site_url('user/bbm'));
        }
    }

    


}


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
            redirect('simakand/login'); 
        }
    }

    public function index()
    {
        $data = $this->K_User_model->ambil_data($this->session->userdata ['email']);
        $data = array( 
                'email' => $data->email, 
                'id' => set_value('id'),
                'nip' => $data->nip,
    );
    	$data['nama'] = $this->Bbm_modeloperator->get_category();
        $nip = $data['nip'];
        $data['bbm'] = $this->Bbm_modeloperator->tampil_data($nip);
        $this->load->view('simakand/template_operator/header');
        $this->load->view('simakand/template_operator/sidebar',$data);
        $this->load->view('simakand/operator/bbm', $data);
        $this->load->view('simakand/template_operator/footer');
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
            $config['upload_path']          = './assets/simakand/laporan';
            $config['allowed_types']        = 'xlsx|xls|pdf'; 
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
                    'tgl_upload' => $tgl_upload,
                    'file' => $file,
                    'status_upload' => $status_upload,
                    'biaya' => $biaya,
                  	'biaya_kendis' => $biaya_kendis,
                  	'total' => $total,
                );

                $this->Bbm_modeloperator->input_data($data, 'tb_bbm');
                redirect('simakand/operator/bbm');

        
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Bbm_modeluser->delete($id)) {
            redirect(site_url('simakand/operator/bbm'));
        }
    }

    public function download($id){
        $this->load->helper('download');
        $fileinfo = $this->Bbm_modeloperator->download($id);
        $file = 'assets/simakand/laporan/'.$fileinfo['file'];
        force_download($file, NULL);
    }
  
  public function view($id){
        $this->load->helper('download');
        $fileinfo = $this->Bbm_modeloperator->download($id);
        $file = 'assets/simakand/laporan/'.$fileinfo['file'];
    }

    public function edit($id = null)
    {
        $data = $this->K_User_model->ambil_data($this->session->userdata ['email']);
        $data = array( 
                'email' => $data->email, 
                'id' => set_value('id'),

    );
        if (!isset($id)) redirect('simakand/operator/bbm');
       
        $bbm = $this->Bbm_modeloperator;
        $validation = $this->form_validation;
        $validation->set_rules($bbm->rules());

        if ($validation->run()) {
            $bbm->update();
            redirect('simakand/operator/bbm');
        }

        $data["bbm"] = $bbm->getById($id);
        if (!$data["bbm"]) show_404();

        $this->load->view('simakand/template_operator/header');
        $this->load->view('simakand/template_operator/sidebar',$data);
        $this->load->view('simakand/operator/bbm_form',$data);
        $this->load->view('simakand/template_operator/footer');
        
        
    }
  
      public function autofill(){
        if ($this->input->post('nama')){
            echo json_encode($this->Bbm_modeloperator->auto_complete($this->input->post('nama')));
        }
    }

   



}


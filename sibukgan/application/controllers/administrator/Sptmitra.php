<?php
class Sptmitra extends CI_Controller
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
	);
        $data['sptmitra'] = $this->Spt_modelmitra->tampil_data()->result();
        
       
        $this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar',$data);
		$this->load->view('administrator/sptmitra', $data);
		$this->load->view('template_administrator/footer');
    }

    public function add()
    {

    	$data = $this->User_model->ambil_data($this->session->userdata ['email']);
		$data = array( 
				'email' => $data->email, 
                'id' => set_value('id'),
	);
        
        $data['mitra'] = $this->Spt_modelmitra->get_category();
      	$data['kd'] = $this->Spt_modelmitra->auto_code();
      
        $sptmitra = $this->Spt_modelmitra;
        $validation = $this->form_validation;
        $validation->set_rules($sptmitra->rules());

        if ($validation->run()) {
            $sptmitra->save();
            redirect('administrator/sptmitra');
        }
        
		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar',$data);
		$this->load->view('administrator/sptmitra_form',$data);
		$this->load->view('template_administrator/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Spt_modelmitra->delete($id)) {
            redirect(site_url('administrator/sptmitra'));
        }
    }

    public function cetak_sptmitra($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_mitra ts WHERE ts.id_mitra='$id'")->result();
        $this->load->view('administrator/cetak_sptmitra', $data);
    }

}


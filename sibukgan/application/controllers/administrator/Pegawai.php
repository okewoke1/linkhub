<?php 
class Pegawai extends CI_Controller
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
	);

		$data['pegawai'] = $this->Pegawai_model->tampil_data()->result();

		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar',$data);
		$this->load->view('administrator/pegawai',$data);
		$this->load->view('template_administrator/footer');
	}

	public function add()
    {
    	$data = $this->User_model->ambil_data($this->session->userdata ['email']);
		$data = array( 
				'email' => $data->email, 
	);				
        $pegawai = $this->Pegawai_model;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->save();
            redirect('administrator/pegawai');        }
        
		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar',$data);
		$this->load->view('administrator/pegawai_form',$data);
		$this->load->view('template_administrator/footer');
    }

	public function edit($id = null)
    {
    	$data = $this->User_model->ambil_data($this->session->userdata ['email']);
		$data = array( 
				'email' => $data->email, 
	);
        if (!isset($id)) redirect('administrator/pegawai');
       
        $pegawai = $this->Pegawai_modeledit;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->update();
            $this->session->set_flashdata('success', 'Update Berhasil!');
        }

        $data["pegawai"] = $pegawai->getById($id);
        if (!$data["pegawai"]) show_404();
        
        $this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar',$data);
		$this->load->view('administrator/pegawai_update',$data);
		$this->load->view('template_administrator/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Pegawai_model->delete($id)) {
            redirect(site_url('administrator/pegawai'));
        }
    }
 
}





<?php

class Dashboard extends CI_Controller{

	function __construct() {
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
        $data['bbm'] = $this->Dashboard_modeladmin->tampil_biaya($nip);
      	$data['orang4'] = $this->Dashboard_modeladmin->tampil_biaya6();
      	$data['orang6'] = $this->Dashboard_modeladmin->tampil_biaya8();

      
      	$data['pagu'] = $this->Dashboard_modeladmin->tampil_pagu($nip);
		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar', $data);
		$this->load->view('administrator/dashboard', $data);
		$this->load->view('template_administrator/footer');
	}

}

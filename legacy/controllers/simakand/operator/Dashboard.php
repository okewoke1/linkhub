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
		
		$nip = $data['nip'];
        $data['bbm'] = $this->K_Dashboard_modeladmin->tampil_biaya($nip);
      	$data['orang'] = $this->K_Dashboard_modeladmin->tampil_biaya3();
      	$data['orang2'] = $this->K_Dashboard_modeladmin->tampil_biaya4();
      	$data['orang3'] = $this->K_Dashboard_modeladmin->tampil_biaya5();
      	$data['orang4'] = $this->K_Dashboard_modeladmin->tampil_biaya6();
      	$data['orang5'] = $this->K_Dashboard_modeladmin->tampil_biaya7();
      	$data['orang6'] = $this->K_Dashboard_modeladmin->tampil_biaya8();
      	$data['orang7'] = $this->K_Dashboard_modeladmin->tampil_biaya9();
      	$data['orang8'] = $this->K_Dashboard_modeladmin->tampil_biaya10();
      	$data['orang9'] = $this->K_Dashboard_modeladmin->tampil_biaya11();
      	$data['orang10'] = $this->K_Dashboard_modeladmin->tampil_biaya12();
      	$data['orang11'] = $this->K_Dashboard_modeladmin->tampil_biaya13();
      	$data['pagu'] = $this->K_Dashboard_modeladmin->tampil_pagu($nip);
		$this->load->view('simakand/template_operator/header');
		$this->load->view('simakand/template_operator/sidebar', $data);
		$this->load->view('simakand/operator/dashboard', $data);
		$this->load->view('simakand/template_operator/footer');
	}
}

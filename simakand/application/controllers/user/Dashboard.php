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
		$data['hasil']=$this->Dashboard_modeladmin->Jum_bbm();
      	$data['hasil1']=$this->Dashboard_modeladmin->Jum_kendis();
      	$nip = $data['nip'];
        $data['bbm'] = $this->Dashboard_modeladmin->tampil_biaya($nip);
      	$data['kendis'] = $this->Dashboard_modeladmin->tampil_biaya2($nip);
      	$data['pagu'] = $this->Dashboard_modeladmin->tampil_pagu($nip);
		$this->load->view('template_user/header');
		$this->load->view('template_user/sidebar', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('template_user/footer');
	}

}

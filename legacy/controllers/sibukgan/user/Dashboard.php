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
			redirect('sibukgan/login'); 
		}
	}
	public function index()
	{
		$data = $this->B_User_model->ambil_data($this->session->userdata ['email']);
		$data = array( 
				'email' => $data->email, 
	);
		$data['hasil']=$this->B_Dashboard_modeladmin->Jum_spt();
		$data['nama']=$this->B_Dashboard_modeladmin->Nam_peg();
		
		
		$this->load->view('sibukgan/template_user/header');
		$this->load->view('sibukgan/template_user/sidebar', $data);
		$this->load->view('sibukgan/user/dashboard', $data);
		$this->load->view('sibukgan/template_user/footer');
	}
}

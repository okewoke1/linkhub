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
	);
		$data['hasil']=$this->Dashboard_modeladmin->Jum_spt();
		$data['nama']=$this->Dashboard_modeladmin->Nam_peg();
		
		
		$this->load->view('template_user/header');
		$this->load->view('template_user/sidebar', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('template_user/footer');
	}
}

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
    $user = $this->User_model->ambil_data($this->session->userdata('email'));

    $bulan = $this->input->get('bulan') ?? date('m');
    $tahun = $this->input->get('tahun') ?? date('Y');


    $data = array(
        'email' => $user->email,
        'hasil' => $this->Dashboard_modeladmin->Jum_spt(),
        'nama' => $this->Dashboard_modeladmin->Nam_peg(),
        'monitoring' => $this->Dashboard_modeladmin->getMonitoringTugas($bulan, $tahun),
        'bulan' => $bulan,
        'tahun' => $tahun
    );

    $this->load->view('template_administrator/header');
    $this->load->view('template_administrator/sidebar', $data);
    $this->load->view('administrator/dashboard', $data); // DI SINILAH MONITORING DITAMPILKAN
    $this->load->view('template_administrator/footer');
}

}

<?php
class Sptplh extends CI_Controller
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
        $data['spt'] = $this->Sptplh_model->tampil_data();
        
       
        $this->load->view('template_user/header');
		$this->load->view('template_user/sidebar',$data);
		$this->load->view('user/sptplh', $data);
		$this->load->view('template_user/footer');
    }

    public function add()
    {

    	$data = $this->User_model->ambil_data($this->session->userdata ['email']);
		$data = array( 
				'email' => $data->email, 
                'id' => set_value('id'),
	);
        
        $data['pegawai'] = $this->Sptplh_model->get_category();
   
        $data['kd'] = $this->Spt_model->auto_code();
        $data['kd2'] = $this->Spt_model->auto_code2();
        $spt = $this->Sptplh_model;
        $validation = $this->form_validation;
        $validation->set_rules($spt->rules());

        if ($validation->run()) {
            $spt->save();
            redirect('user/sptplh');
        }
        
		$this->load->view('template_user/header');
		$this->load->view('template_user/sidebar',$data);
		$this->load->view('user/sptplh_form',$data);
		$this->load->view('template_user/footer');
    }

    public function add2()
    {

    	$data = $this->User_model->ambil_data($this->session->userdata ['email']);
		$data = array( 
				'email' => $data->email, 
                'id' => set_value('id'),
	);
        
        $data['pegawai'] = $this->Spt_model2->get_category();								
        $spt = $this->Spt_model2;
        $validation = $this->form_validation;
        $validation->set_rules($spt->rules());

        if ($validation->run()) {
            $spt->save();
            redirect('user/spt');
        }
        
		$this->load->view('template_user/header');
		$this->load->view('template_user/sidebar',$data);
		$this->load->view('user/spt_form2',$data);
		$this->load->view('template_user/footer');
    }

    public function edit($id = null)
    {
        $data = $this->User_model->ambil_data($this->session->userdata ['email']);
        $data = array( 
                'email' => $data->email, 
                'id' => set_value('id'),

    );
        $data['pegawai'] = $this->Spt_modeledit->get_category();
        if (!isset($id)) redirect('user/spt');
       
        $spt = $this->Spt_modeledit;
        $validation = $this->form_validation;
        $validation->set_rules($spt->rules());

        if ($validation->run()) {
            $spt->update();
            $this->session->set_flashdata('success', 'Update SPT Berhasil!');
        }

        $data["spt"] = $spt->getById($id);
        if (!$data["spt"]) show_404();
        
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar',$data);
        $this->load->view('user/spt_update',$data);
        $this->load->view('template_user/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Sptplh_model->delete($id)) {
            redirect(site_url('user/sptplh'));
        }
    }

    public function cetak_sptplh($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_spt ts WHERE ts.id_spt='$id'")->result();
        $this->load->view('user/cetak_sptplh', $data);
    }
    

    public function autofill(){
        if ($this->input->post('nama')){
            echo json_encode($this->Spt_model2->auto_complete($this->input->post('nama')));
        }
    }

    public function autofill2(){
        if ($this->input->post('anggota_1')){
            echo json_encode($this->Spt_model2->auto_complete($this->input->post('anggota_1')));
        }
    }

 

}


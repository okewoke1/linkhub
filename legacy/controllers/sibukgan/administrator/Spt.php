<?php
class Spt extends CI_Controller
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
            redirect('sibukgan/login'); 
        }
    }

    public function index()
    {
    	$data = $this->B_User_model->ambil_data($this->session->userdata ['email']);
		$data = array( 
				'email' => $data->email, 
				'id' => set_value('id'),
	);
        $data['spt'] = $this->Spt_model->tampil_data()->result();
        
       
        $this->load->view('sibukgan/template_administrator/header');
		$this->load->view('sibukgan/template_administrator/sidebar',$data);
		$this->load->view('sibukgan/administrator/spt', $data);
		$this->load->view('sibukgan/template_administrator/footer');
    }

    public function add()
    {

    	$data = $this->B_User_model->ambil_data($this->session->userdata ['email']);
		$data = array( 
				'email' => $data->email, 
                'id' => set_value('id'),
	);
        
        $data['pegawai'] = $this->Spt_model->get_category();
        // $data['kode_seksi'] = $this->Spt_model->get_category();
    //   	$data['kd'] = $this->Spt_model->auto_code();
      	$kd_array = $this->Spt_model->auto_code();
         $kd2_array = $this->Spt_model->auto_code2();
        $data['kd'] = $kd_array ? $kd_array[0]['no'] + 1 : 1;
        $data['kd2'] = $kd2_array ? $kd2_array[0]['nomor_spd'] + 1 : 1;
        $spt = $this->Spt_model;
        $validation = $this->form_validation;
        $validation->set_rules($spt->rules());

        if ($validation->run()) {
            $spt->save();
            redirect('sibukgan/administrator/spt');
        }
        
		$this->load->view('sibukgan/template_administrator/header');
		$this->load->view('sibukgan/template_administrator/sidebar',$data);
		$this->load->view('sibukgan/administrator/spt_form',$data);
		$this->load->view('sibukgan/template_administrator/footer');
    }

    public function add2()
    {

    	$data = $this->B_User_model->ambil_data($this->session->userdata ['email']);
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
            redirect('sibukgan/administrator/spt');
        }
        
		$this->load->view('sibukgan/template_administrator/header');
		$this->load->view('sibukgan/template_administrator/sidebar',$data);
		$this->load->view('sibukgan/administrator/spt_form2',$data);
		$this->load->view('sibukgan/template_administrator/footer');
    }

    public function edit($id = null)
    {
        $data = $this->B_User_model->ambil_data($this->session->userdata ['email']);
        $data = array( 
                'email' => $data->email, 
                'id' => set_value('id'),

    );
        $data['pegawai'] = $this->Spt_modeledit->get_category();
        if (!isset($id)) redirect('sibukgan/administrator/spt');
       
        $spt = $this->Spt_modeledit;
        $validation = $this->form_validation;
        $validation->set_rules($spt->rules());

        if ($validation->run()) {
            $spt->update();
            $this->session->set_flashdata('success', 'Update ST Berhasil!');
        }

        $data["spt"] = $spt->getById($id);
        if (!$data["spt"]) show_404();
        
        $this->load->view('sibukgan/template_administrator/header');
        $this->load->view('sibukgan/template_administrator/sidebar',$data);
        $this->load->view('sibukgan/administrator/spt_update',$data);
        $this->load->view('sibukgan/template_administrator/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Spt_model->delete($id)) {
            redirect(site_url('sibukgan/administrator/spt'));
        }
    }

    public function cetak_spt($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_spt ts WHERE ts.id_spt='$id'")->result();
        $this->load->view('sibukgan/administrator/cetak_spt', $data);
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


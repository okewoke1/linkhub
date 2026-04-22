<?php
class Biaya extends CI_Controller
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
                'nip' => $data->nip,
	);
    $nip = $data['nip'];
        $data['spt'] = $this->Biaya_model->tampil_data($nip);
        
       
        $this->load->view('template_user/header');
		$this->load->view('template_user/sidebar',$data);
		$this->load->view('user/biaya', $data);
		$this->load->view('template_user/footer');
    }

    public function edit($id = null)
    {
        $data = $this->User_model->ambil_data($this->session->userdata ['email']);
        $data = array( 
                'email' => $data->email, 
                'id' => set_value('id'),

    );
        $data['pegawai'] = $this->Biaya_modeledit->get_category();
        if (!isset($id)) redirect('user/biaya');
       
        $spt = $this->Biaya_modeledit;
        $validation = $this->form_validation;
        $validation->set_rules($spt->rules());

        if ($validation->run()) {
            $spt->update();
            $this->session->set_flashdata('success', 'Rincian Biaya Berhasil di Buat!');
        }

        $data["spt"] = $spt->getById($id);
        if (!$data["spt"]) show_404();
        
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar',$data);
        $this->load->view('user/biaya_form',$data);
        $this->load->view('template_user/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Spt_model->delete($id)) {
            redirect(site_url('user/biaya'));
        }
    }

    public function cetak_biaya($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_spt ts WHERE ts.id_spt='$id'")->result();
        $this->load->view('user/cetak_biaya', $data);
    }

}


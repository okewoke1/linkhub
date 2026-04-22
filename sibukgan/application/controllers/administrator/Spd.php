<?php
class Spd extends CI_Controller
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

        $data['spt'] = $this->Sppd_model->tampil_data();
        
       
        $this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar',$data);
		$this->load->view('administrator/spd', $data);
		$this->load->view('template_administrator/footer');
    }

    public function cetak_spd($id)
    {
        $data['detail'] = $this->db->query("SELECT * FROM tb_spt ts WHERE ts.id_spt='$id'")->result();
        $this->load->view('administrator/cetak_spd', $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Spt_model2->delete($id)) {
            redirect(site_url('administrator/spd'));
        }
    }


}


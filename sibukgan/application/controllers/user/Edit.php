<?php

class Edit extends CI_Controller
{
    function __construct(){
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
        $data['user'] = $this->db->get_where('master_users',['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('password_lama','Password Lama','required|trim');
        $this->form_validation->set_rules('password_baru','Password Baru','required|trim');
       
        if($this->form_validation->run() == false){
        $this->load->view('template_user/header');
        $this->load->view('template_user/sidebar',$data);
        $this->load->view('user/edit', $data);
        $this->load->view('template_user/footer');
    }else{
        $password_lama = $this->input->post('password_lama');
        $password_baru1 = $this->input->post('password_baru');
        if(!password_verify($password_lama, $data['user']['password'])){
            $this->session->set_flashdata('message','<div class="alert alert-danger role="alert">Password Lama Salah!</div>');
            redirect('user/edit');
        }   else{
            if($password_lama == $password_baru1){
               $this->session->set_flashdata('message','<div class="alert alert-danger role="alert">Password Lama Tidak Boleh Sama Dengan Password Baru!</div>'); 
               redirect('user/edit');
            }else{
                $password_hash = password_hash($password_baru1, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('master_users');

                $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Berhasil Update Profile!</div>'); 
               redirect('user/edit');
            }
        }
    }
    }

}


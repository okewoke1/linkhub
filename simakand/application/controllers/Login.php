<?php

class Login extends CI_Controller{


	public function index()
	{
		$this->form_validation->set_rules('email','email', 'trim|required');
        $this->form_validation->set_rules('password','password', 'trim|required');
        
        if ($this->form_validation->run() == false){
            
            $this->load->view('login');

        }else{
            //validasi berhasil
            $this->_login();
        }
	}

private function _login()
{
	$email = $this->input->post('email');
    $password = $this->input->post('password');

 	$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
            //user ada
    	if ($user)
        {
        	if($user['status'] == 1){
        		//cek pass
        		if (password_verify($password, $user['password']))
           		{
           			$data = [
	           		'email' => $user['email'],
	           		'level' => $user['level'],
	           		'nama' => $user['nama'],
					'nip' => $user['nip'],
	           		
	           		'id' => $user['id']
	           			];
	           		$this->session->set_userdata($data);
		           	if($user['level'] == 'admin')
		           	{
		           		redirect('administrator/dashboard');
		           	}
		           		else if($user['level'] == 'user')
		           		{
						redirect('user/dashboard');
						}
						else if($user['level'] == 'operator')
		           		{
						redirect('operator/dashboard');
						}			
				}
				else
							{
		                	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau Password Salah!</div>');
		                	redirect('login');
		                	}
        	}
           
						else
							{
		                	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">User Tidak Aktif!</div>');
		                	redirect('login');
		                	}
	 		
 		 }
 		 			else
							{
		                	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau Password Salah!</div>');
		                	redirect('login');
		                	}
}

    public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	

}
    






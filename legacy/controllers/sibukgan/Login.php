<?php

class Login extends CI_Controller{


	public function index()
	{
		$this->form_validation->set_rules('email','email', 'trim|required');
        $this->form_validation->set_rules('password','password', 'trim|required');
        
        if ($this->form_validation->run() == false){
            
            $this->load->view('sibukgan/login');

        }else{
            //validasi berhasil
            $this->_login();
        }
	}

private function _login()
{
	$email = $this->input->post('email');
    $password = $this->input->post('password');

 	$user = $this->db->get_where('user', ['email' => $email])->row_array();
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
	           		
	           		'id' => $user['id']
	           			];
	           		$this->session->set_userdata($data);
		           	if($user['level'] == 'admin')
		           	{
		           		redirect('sibukgan/administrator/dashboard');
		           	}
		           		else if($user['level'] == 'user')
		           		{
						redirect('sibukgan/user/dashboard');
						}
						
				}
				else
							{
		                	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau Password Salah!</div>');
		                	redirect('sibukgan/login');
		                	}
        	}
           
						else
							{
		                	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">User Tidak Aktif!</div>');
		                	redirect('sibukgan/login');
		                	}
	 		
 		 }
 		 			else
							{
		                	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Username atau Password Salah!</div>');
		                	redirect('sibukgan/login');
		                	}
}

    public function logout()
	{
		$this->session->sess_destroy();
		redirect('sibukgan/login');
	}

	

}
    






<?php

class Def extends CI_Controller
{
    public function index()
    {
        $linkhub_login_url = 'http://ci3111.dev.test/auth/login'; // Replace with your actual Linkhub domain and login route!

        // Perform the redirect and immediately exit to stop script execution.
        redirect($linkhub_login_url, 'refresh'); // 'refresh' is needed for external redirects
    }

    public function check_login()
    {
        // If the user is logged in, allow access.
        if ($this->session->userdata('logged_in') && isset($this->session->userdata['email'])) {
            $user_roles = $this->session->userdata('user_roles');

            if (in_array('simakand admin', $user_roles)) {
                redirect('http://simakand.dev.test/administrator/dashboard', 'refresh'); // Redirect to intended URL
            } elseif (in_array('simakand user', $user_roles)) {
                redirect('http://simakand.dev.test/user/dashboard', 'refresh'); // Redirect to intended URL
            } elseif (in_array('simakand operator', $user_roles)) {
                redirect('http://simakand.dev.test/operator/dashboard', 'refresh'); // Redirect to intended URL
            } else {
                // User does not have access to this app
                $this->session->set_flashdata('error', 'You do not have access to this application.');
                redirect('http://ci3111.dev.test/auth/login', 'refresh');
            }
            return;
        }

        // User is NOT logged in:
        $this->index();
    }
}

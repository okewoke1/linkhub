<?php
class AuthHook
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
    }

    public function check_login()
    {
        // If the user is logged in, allow access.
        if ($this->CI->session->userdata('logged_in') && isset($this->CI->session->userdata['email'])) {
            $roles = $this->CI->session->userdata('user_roles');
            $sispek_roles = array_filter($roles, function ($role) {
                return strpos($role, 'sispek') !== false;
            });

            $level = null;

            if (in_array('sispek admin', $sispek_roles)) {
                $level = '1'; // Admin level
            } elseif (in_array('sispek user', $sispek_roles)) {
                $level = '2'; // User level
            } else {
                // User does not have access to this app
                $this->CI->session->set_flashdata('error', 'You do not have access to this application.');
                redirect('http://ci3111.dev.test/auth/login', 'refresh');
                return;
            }

            $this->CI->session->set_userdata('level', $level);
            log_message('debug', 'User is logged in with level: ' . $this->CI->session->userdata('level'));
            return; // User is logged in, no action needed.
        }

        // $CI =& get_instance();
        if (!$this->CI->session->userdata('logged_in') || !isset($this->CI->session->userdata['email'])) {
            // User is NOT logged in:

            // 1. Store the intended URL in the shared session.
            // This allows the Linkhub to redirect the user back to where they were trying to go.
            $intended_url = current_url(); // This gets the full URL of the page the user tried to access
            $this->CI->session->set_userdata('intended_url', $intended_url);

            // 2. Redirect to the Linkhub's central login page.
            // IMPORTANT: Use the full, absolute URL for cross-domain redirects.
            $linkhub_login_url = 'http://ci3111.localhost/auth/login'; // Replace with your actual Linkhub domain and login route!

            // Perform the redirect and immediately exit to stop script execution.
            redirect($linkhub_login_url, 'refresh'); // 'refresh' is needed for external redirects
            exit(); // Essential to stop the current request from processing further
        }
    }
}

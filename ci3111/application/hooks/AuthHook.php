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
        log_message('debug', 'AuthHook check_login called');
        // $linkhub_login_url = 'http://ci3111.dev.test/auth/login';
        $linkhub_login_url = base_url('auth/login');

        $public_routes = array(
            'auth/login',
            'auth/process_login'
        );

        // Get the current controller and method
        $current_controller = $this->CI->router->fetch_class();
        $current_method = $this->CI->router->fetch_method();
        $current_route = strtolower($current_controller . '/' . $current_method);

        $is_public = false;
        foreach ($public_routes as $route) {
            // Convert wildcard route to regex
            $pattern = '#^' . str_replace('*', '.*', preg_quote($route, '#')) . '$#i';
            if (preg_match($pattern, $current_route)) {
                $is_public = true;
                break;
            }
        }

        // If route is public → always allow access
        if ($is_public) {
            log_message('debug', 'Public route accessed: ' . $current_route);
            return;
        }

        // $admin_routes = array(
        //     'kelola/',
        // );

        // // Get the current controller and method
        // $current_controller = $this->CI->router->fetch_class();
        // $current_method = $this->CI->router->fetch_method();
        // $current_route = strtolower($current_controller . '/' . $current_method);

        // $allowed = true;

        // // Check if the current route is a LEAD admin route
        // $user_roles = (array) $this->CI->session->userdata('user_roles');
        // foreach ($admin_routes as $route) {
        //     if (strpos($current_route, $route) === 0) {
        //         if (in_array('lead admin', $user_roles)) {
        //             $allowed = true;
        //         } else {
        //             redirect($linkhub_login_url, 'refresh');
        //             exit();
        //         }
        //         break;
        //     }
        // }

        // if ($allowed) {
        //     return;
        // }

        // If the user is logged in, allow access.
        if ($this->CI->session->userdata('logged_in') && isset($this->CI->session->userdata['email'])) {
            log_message('debug', 'User is logged in: ' . $this->CI->session->userdata['email']);
            return;
        }

        // If the user is NOT logged in, redirect to the Linkhub's login page.
        if (!$this->CI->session->userdata('logged_in') || !isset($this->CI->session->userdata['email'])) {

            // Store the intended URL in the shared session.
            $intended_url = current_url();
            $this->CI->session->set_userdata('intended_url', $intended_url);

            // Redirect to the Linkhub's central login page.
            log_message('debug', 'User not logged in, redirecting to Linkhub login: ' . $linkhub_login_url);
            redirect($linkhub_login_url, 'refresh');
            exit();
        }
    }
}

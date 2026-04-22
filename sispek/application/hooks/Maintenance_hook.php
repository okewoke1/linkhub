<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance_hook {

    public function check_maintenance_mode() {
        $CI = &get_instance();
        
        // Cek apakah mode maintenance diaktifkan
        $maintenance_mode = TRUE; // Ubah ini sesuai dengan cara Anda mengaktifkan mode maintenance
        
        // Anda bisa menggunakan file, database, atau konfigurasi lain untuk mengatur mode maintenance
        if (file_exists(APPPATH . 'config/maintenance_mode.php')) {
            include(APPPATH . 'config/maintenance_mode.php');
            if (isset($config['maintenance_mode']) && $config['maintenance_mode'] === TRUE) {
                $CI->output->set_status_header(503);
                $CI->load->view('maintenance');
                $CI->output->_display();
                exit;
            }
        }
    }
}

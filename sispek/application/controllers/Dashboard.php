<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_logged_in')) {
            redirect('login');
        }
    }

    public function index()
    {

        $level = $this->session->userdata('level');
        $username = $this->session->userdata('username');
        // Tentukan judul berdasarkan level user
        $page_heading = ($level == 1) ? "Dashboard Admin" : "Dashboard User";

        // Kirim data ke view
        $data['page_heading'] = $page_heading;
        $data['username'] = $username;

        // data dashboard
        $today = date('Y-m-d');
        $start_of_month = date('Y-m-01');
        $start_of_year = date('Y-01-01');
        $year = date('Y'); // Tahun saat ini

        $data['total_perjanjian_bulan_ini'] = $this->M_dashboard->get_total_perjanjian($start_of_month, $today);
        // $data['total_perjanjian_tahun_ini'] = $this->M_dashboard->get_total_perjanjian($start_of_year, $today);
        $data['total_perjanjian_tahun_ini'] = $this->M_dashboard->get_total_perjanjian_tahun($year);

        $data['spk_bulan_ini'] = $this->M_dashboard->get_spk_count($start_of_month, $today);
        $data['spk_tahun_ini'] = $this->M_dashboard->get_all_spk_tahun_ini($year);

        $data['daftarspk'] = $this->M_dashboard->get_all_spk();
        $data['daftarspkbulanlalu'] = $this->M_dashboard->get_all_spk_bulan_sebelumnya();

        $data['daftarspktahunini'] = $this->M_dashboard->get_all_spk_tahun_ini($start_of_year, $today);
        $data['daftarspkbulanberikutnya'] = $this->M_dashboard->get_all_spk_bulan_berikutnya();

        // Ambil semua no_spk dari daftarspk
        $no_spk_list = array_column($data['daftarspk'], 'no_spk');
        $no_spk_list1 = array_column($data['daftarspkbulanlalu'], 'no_spk');
        $no_spk_list2 = array_column($data['daftarspkbulanberikutnya'], 'no_spk');


        // Kirim daftar no_spk ke model
        $data['spk_data'] = $this->M_dashboard->get_mitra_spk($no_spk_list);
        $data['spk_data1'] = $this->M_dashboard->get_mitra_spk($no_spk_list1);
        $data['spk_data2'] = $this->M_dashboard->get_mitra_spk($no_spk_list2);


        if ($level == '1') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar_adm', $data);
            $this->load->view('template/dashboard', $data);
            $this->load->view('template/footer');
        } else if ($level == '2') {
            $this->load->view('template/header');
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/dashboard', $data);
            $this->load->view('template/footer');
        } else {
            $this->load->view('login');
        }
    }
}

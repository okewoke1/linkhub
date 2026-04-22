<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
		$data['total_perjanjian_bulan_ini'] = $this->M_dashboard->get_total_perjanjian($start_of_month, $today);
		$data['total_perjanjian_tahun_ini'] = $this->M_dashboard->get_total_perjanjian($start_of_year, $today);
		$data['spk_bulan_ini'] = $this->M_dashboard->get_spk_count($start_of_month, $today);
		$data['spk_tahun_ini'] = $this->M_dashboard->get_spk_count($start_of_year, $today);


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
			// show_error('Access Denied', 403, 'Forbidden');
			$this->load->view('login');
		}
	}
}

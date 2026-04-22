<?php
class MY_Controller extends CI_Controller
{
    public $announcements = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengumuman_model');

        // Load active announcements from DB
        $this->pengumuman = $this->Pengumuman_model->get_active_pengumuman();

        // Make them available in all views
        $this->load->vars(['pengumuman' => $this->pengumuman]);
    }
}

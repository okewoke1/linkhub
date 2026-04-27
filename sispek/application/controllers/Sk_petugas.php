<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sk_petugas extends CI_Controller {

    public function store()
    {
        $post = $this->input->post();

        foreach ($post['petugas'] as $row) {
            $this->M_sk_petugas->insert([
                'id_sk'     => $post['id_sk'],
                'id_sobat'  => $row['id_sobat'],
                'jabatan'   => $row['jabatan']
            ]);
        }

        redirect('sk/detail/'.$post['id_sk']);
    }
}

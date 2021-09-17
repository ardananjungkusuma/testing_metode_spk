<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Tes Metode';
        $this->load->view('home/layout/header', $data);
        $this->load->view('home/index');
        $this->load->view('home/layout/footer');
    }
}

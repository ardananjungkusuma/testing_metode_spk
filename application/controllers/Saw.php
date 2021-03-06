<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saw extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Saw_model');
    }

    public function index()
    {
        $data['title'] = 'SAW';
        $data['kriteria'] = $this->Saw_model->get_kriteria();
        $data['pegawai'] = $this->Saw_model->get_pegawai();

        $this->load->view('home/layout/header', $data);
        $this->load->view('saw/index');
        $this->load->view('home/layout/footer');
    }

    public function tambah_kriteria()
    {
        $this->form_validation->set_rules('nama_kriteria', 'nama_kriteria', 'required');
        $this->form_validation->set_rules('penjelasan_kriteria', 'penjelasan_kriteria', 'required');
        $this->form_validation->set_rules('bobot_kriteria', 'bobot_kriteria', 'required');
        $this->form_validation->set_rules('kategori_bobot', 'kategori_bobot', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'SAW';
            $this->load->view('home/layout/header', $data);
            $this->load->view('saw/tambah_kriteria');
            $this->load->view('home/layout/footer');
        } else {
            $this->Saw_model->tambah_kriteria();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Kriteria
          </div>');
            redirect('saw');
        }
    }

    public function tambah_pegawai()
    {
        $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'SAW';
            $this->load->view('home/layout/header', $data);
            $this->load->view('saw/tambah_pegawai');
            $this->load->view('home/layout/footer');
        } else {
            $this->Saw_model->tambah_pegawai();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Sukses Menambah Pegawai
          </div>');
            redirect('saw');
        }
    }

    public function hitung()
    {
        $data['title'] = 'SAW';
        $data['kriteria'] = $this->Saw_model->get_kriteria();
        $data['pegawai'] = $this->Saw_model->get_pegawai();

        $this->load->view('home/layout/header', $data);
        $this->load->view('saw/hitung');
        $this->load->view('home/layout/footer');
    }
}

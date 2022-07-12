<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelTamu');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('tamu/index');
    }

    public function insert()
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "nomor_hp" => $this->input->post('nomor_hp'),
            "email" => $this->input->post('email'),
            "keperluan" => $this->input->post('keperluan'),
            "alamat" => $this->input->post('alamat')
        );

        $insert = $this->ModelTamu->save($data);
        if ($insert) {
            return redirect(base_url(''));
        }
    }
}

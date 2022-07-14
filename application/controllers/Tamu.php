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
        $cam = $this->input->post('cam');
        $encodeCam = $this->encodeCam($cam);
        $data = array(
            "nama" => $this->input->post('nama'),
            "nomor_hp" => $this->input->post('nomor_hp'),
            "email" => $this->input->post('email'),
            "keperluan" => $this->input->post('keperluan'),
            "alamat" => $this->input->post('alamat'),
            "cam" => $encodeCam
        );

        $insert = $this->ModelTamu->save($data);
        if ($insert) {
            return redirect(base_url(''));
        }
    }

    public function encodeCam($cam)
    {
        $binary_data = base64_decode($cam);
        $fileName = uniqid() . '.jpg';
        $path = FCPATH . 'img/tamu/' . $fileName;
        $result = file_put_contents($path, $binary_data);

        if ($result) {
            return $fileName;
        }
    }
}

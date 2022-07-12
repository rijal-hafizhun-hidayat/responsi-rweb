<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sistem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelSistem');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['sistem'] = $this->ModelSistem->show();
        return $this->load->view('sistem/index', $data);
    }

    public function destroy($id)
    {
        $model = $this->ModelSistem->destroy($id);
        if ($model) {
            return redirect(base_url('sistem'));
        }
    }

    public function show($id)
    {
        $data['sistem'] = $this->ModelSistem->getById($id);
        return $this->load->view('sistem/show', $data);
    }

    public function updated($id)
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "nomor_hp" => $this->input->post('nomor_hp'),
            "email" => $this->input->post('email'),
            "keperluan" => $this->input->post('keperluan'),
            "alamat" => $this->input->post('alamat')
        );

        $update = $this->ModelSistem->updatedById($data, $id);
        if ($update) {
            return redirect(base_url('sistem'));
        }
    }
}

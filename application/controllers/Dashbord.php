<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashbord extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelDashbord');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['sistem'] = $this->ModelDashbord->show();
        return $this->load->view('dashbord/index', $data);
    }

    public function destroy($id)
    {
        $deletePhoto = $this->destroyPhoto($id);
        if ($deletePhoto) {
            $model = $this->ModelDashbord->destroy($id);
            if ($model) {
                return redirect(base_url('dashbord'));
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function show($id)
    {
        $data['sistem'] = $this->ModelDashbord->getById($id);
        return $this->load->view('dashbord/show', $data);
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

        $update = $this->ModelDashbord->updatedById($data, $id);
        if ($update) {
            return redirect(base_url('dashbord'));
        }
    }

    public function destroyPhoto($id)
    {
        $data = $this->ModelDashbord->getById($id);
        $path = FCPATH . 'img/tamu/' . $data->cam;
        if (file_exists($path)) {
            unlink($path);
            return true;
        } else {
            return false;
        }
    }
}

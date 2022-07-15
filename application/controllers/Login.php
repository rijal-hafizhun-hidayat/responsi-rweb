<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelLogin');
        $this->load->helper('url');
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->view('login/index');
    }

    public function auth()
    {
        $data = array(
            'username' => $this->input->post('user'),
            'password' => $this->input->post('pass'),
        );

        $getAkun = $this->proses($data);
        if ($getAkun) {
            return redirect(base_url('dashbord'));
        } else {
            return redirect(base_url('login'));
        }
    }

    public function proses($data)
    {
        $model = $this->ModelLogin->getById($data['username'], $data['password']);
        if ($model) {
            if ($data['username'] === $model->username && $data['password'] === $model->password) {
                $session = array(
                    'username'  => $model->username,
                    'loggedIn' => TRUE
                );

                $this->session->set_userdata($session);

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

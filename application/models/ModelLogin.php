<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelLogin extends CI_Model
{
    // public function show()
    // {
    //     return $this->db->get('tamu');
    // }

    // public function destroy($id)
    // {
    //     return $this->db->delete('tamu', array("id" => $id));
    // }

    public function getById($user, $pass)
    {
        return $this->db->get_where('akun', array('username' => $user, 'password' => $pass))->row();
    }

    // public function updatedById($data, $id)
    // {
    //     return $this->db->update('tamu', $data, array('id' => $id));
    // }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDashbord extends CI_Model
{
    public function show()
    {
        return $this->db->get('tamu');
    }

    public function destroy($id)
    {
        return $this->db->delete('tamu', array("id" => $id));
    }

    public function getById($id)
    {
        return $this->db->get_where('tamu', ["id" => $id])->row();
    }

    public function updatedById($data, $id)
    {
        return $this->db->update('tamu', $data, array('id' => $id));
    }
}

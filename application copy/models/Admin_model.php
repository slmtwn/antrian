<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getAllTransaksi()
    {
        return $this->db->get('vw_transaksi_pelanggan')->result_array();
    }
    public function getPelanggan($id)
    {
        return $this->db->where('id', $id)->result_array();
        return $this->db->get('pelanggan')->result_array();
    }
}

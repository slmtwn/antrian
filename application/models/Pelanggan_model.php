<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggan_model extends CI_Model
{
    public function getPelanggan()
    {
        $this->db->order_by('id_pelanggan', 'DESC');
        return $this->db->get('vw_pelanggan')->result_array();
    }
    public function id_terakhir()
    {
        $this->db->select('id_pelanggan');
        $this->db->from('tbl_pelanggan');
        $this->db->order_by('id_pelanggan', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    public function hapusPelanggan($id)
    {
        $this->db->where('id_pelanggan', $id);
        $this->db->delete('tbl_pelanggan');
    }

    public function getLayanan()
    {
        return $this->db->get('tbl_layanan')->result_array();
    }
}

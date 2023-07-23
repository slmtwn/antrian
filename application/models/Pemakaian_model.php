<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pemakaian_model extends CI_Model
{
    public function getAllPemakaian()
    {
        return $this->db->get('vw_pemakaian_air')->result_array();
    }

    public function hapusPemakaian($id)
    {
        $this->db->where('id_pakai', $id);
        $this->db->delete('tbl_pakai');
    }

    public function getAllMeteran()
    {
        //$this->db->where('id', $id);
        $this->db->get('transaksi');
    }
}

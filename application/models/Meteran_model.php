<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Meteran_model extends CI_Model
{
    public function getAwal($id)
    {
        $query = "SELECT * from transaksi
        WHERE
        bulan = ( SELECT ( max( bulan ) - 1 ) FROM `transaksi` WHERE id_pelanggan=$id )";
        $this->db->query($query);
        $this->db->where('id_pelanggan', $id);
        $this->db->get('transaksi')->row_array();
    }
    public function getAllMeteran()
    {
        //$this->db->where('id', $id);
        $this->db->get('transaksi');
    }
}

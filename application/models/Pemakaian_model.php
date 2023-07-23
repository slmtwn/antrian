<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pemakaian_model extends CI_Model
{
    public function getAllPemakaian()
    {
        return $this->db->get('vw_pemakaian_air')->result_array();
    }
    public function getPemakaian($idpel = array())
    {
        $hsl = $this->db->query("
        SELECT * FROM vw_full_pemakai_air
        where id_pelanggan='$idpel'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = [
                    'id_pelanggan' => $data->id_pelanggan,
                    'nm_pelanggan' => $data->nm_pelanggan,
                    'alamat_pelanggan' => $data->alamat_pelanggan,
                    'awal' => $data->awal,
                ];
            }
        }
        return $hasil;
    }

    public function getAllMeteran()
    {
        //$this->db->where('id', $id);
        $this->db->get('transaksi');
    }
}

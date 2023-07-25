<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pemakaian_model extends CI_Model
{
    public function getAllPemakaian()
    {
        $this->db->order_by('id_pakai', 'DESC');
        return $this->db->get('vw_pemakaian_air')->result_array();
    }

    public function hapusPemakaian($id)
    {
        $this->db->where('id_pakai', $id);
        $this->db->delete('tbl_pakai');
    }

    public function get_data_barang_bykode($id_pelanggan)
    {
        $hsl = $this->db->query("SELECT id_pelanggan,max(akhir) as awal FROM tbl_pakai WHERE id_pelanggan='$id_pelanggan'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_pelanggan' => $data->id_pelanggan,
                    'awal' => $data->awal,
                );
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi_model extends CI_Model
{
    public function getAllTagihan()
    {

        return $this->db->get_where('vw_tagihan', ['tagihan>' => 0])->result_array();
    }

    public function getTagihanById($id)
    {

        $this->db->query("SELECT p.id_pelanggan, p.nm_pelanggan, t.id_tagihan, t.tagihan, t.status, k.tahun, k.pakai, b.nama_bulan 
        from tbl_pelanggan p inner join tbl_pakai k on p.id_pelanggan=k.id_pelanggan
        inner join tbl_tagihan t on k.id_pakai=t.id_pakai
        inner join tbl_bulan b on k.bulan=b.id_bulan
        where t.id_tagihan=$id")->row_array();
    }
    public function getDataStruk($id)
    {
        return $this->db->get_where('vw_struk', ['id_tagihan' => $id])->row_array();
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pemakaian_model extends CI_Model
{
    public function getAllPemakaian()
    {
        $this->db->order_by('id_pakai', 'DESC');
        $this->db->where('tagihan >', 0);
        return $this->db->get('vw_pemakaian_air')->result_array();
    }

    public function cekstatus($id)
    {
        return $this->db->query("SELECT tbl_pakai.id_pakai, 
        tbl_pakai.id_pelanggan, 
        tbl_pakai.tahun, 
        tbl_pakai.bulan, 
        tbl_tagihan.status
    FROM
        tbl_pakai
        INNER JOIN
        tbl_tagihan
        ON 
            tbl_pakai.id_pakai = tbl_tagihan.id_pakai
            WHERE tbl_pakai.id_pakai='$id'");
    }
    public function hapusPemakaian($id)
    {
        $this->db->where('id_pakai', $id);
        $this->db->delete('tbl_pakai');
    }

    public function getTarif()
    {
        $this->db->query("SELECT l.tarif from tbl_layanan l inner join tbl_pelanggan p on l.id_layanan=p.id_layanan")->row_array();
    }

    public function id_terakhir($id = '')
    {
        $this->db->select('id_pakai');
        $this->db->from('tbl_pakai');
        $this->db->order_by('id_pakai', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
}

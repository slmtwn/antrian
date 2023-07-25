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

    public function getTarif()
    {
        $this->db->query("SELECT l.tarif from tbl_layanan l inner join tbl_pelanggan p on l.id_layanan=p.id_layanan")->row_array();
    }

    public function id_terakhir()
    {
        $this->db->select('id_pakai');
        $this->db->from('tbl_pakai');
        $this->db->order_by('id_pakai', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
}

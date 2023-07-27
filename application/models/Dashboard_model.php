<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_model extends CI_Model
{
    public function getRealBulan()
    {
        $bln = date("n");
        // $this->db->where('bulan', $bln);
        // $this->db->where('status', '0');
        $this->db->query("SELECT
        tbl_tagihan.tagihan, 
        tbl_tagihan.`status`, 
        tbl_pakai.bulan
    FROM
        tbl_tagihan
        INNER JOIN
        tbl_pakai
        ON 
            tbl_tagihan.id_pakai = tbl_pakai.id_pakai
            WHERE 
            bulan=$bln")->row_array();
        //return $this->db->get('tbl_tagihan')->row_array();
    }
    public function getSumTotalTagihan()
    {
        $this->db->select_sum('tagihan');
        $query = $this->db->get('tbl_tagihan');
        if ($query->num_rows() > 0) {
            return $query->row()->tagihan;
        } else {
            return 0;
        }
    }
    public function getSumTagihanLunas()
    {
        $this->db->select_sum('tagihan');
        $query = $this->db->get_where('tbl_tagihan', ['status' => '1']);
        if ($query->num_rows() > 0) {
            return $query->row()->tagihan;
        } else {
            return 0;
        }
    }
    public function getSumTagihanBlmLunas()
    {
        $this->db->select_sum('tagihan');
        $query = $this->db->get_where('tbl_tagihan', ['status' => '0']);
        if ($query->num_rows() > 0) {
            return $query->row()->tagihan;
        } else {
            return 0;
        }
    }
}

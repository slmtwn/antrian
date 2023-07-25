<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi_model extends CI_Model
{
    public function getAllTagihan()
    {

        return $this->db->get('vw_tagihan')->result_array();
    }
}

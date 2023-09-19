<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Antrian_model extends CI_Model
{
    public function getAllLayanan()
    {
        return $this->db->get('tbl_layanan')->result_array();
    }
}

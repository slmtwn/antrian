<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggan_model extends CI_Model
{
    public function getPelanggan()
    {
        return $this->db->get('pelanggan')->result_array();
    }
}

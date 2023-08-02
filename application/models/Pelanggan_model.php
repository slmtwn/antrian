<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggan_model extends CI_Model
{
    public function getPelanggan()
    {
        $this->db->order_by('tgl_daftar', 'DESC');
        return $this->db->get('vw_pelanggan')->result_array();
    }
    public function getPelangganById($id)
    {
        return $this->db->get_where('tbl_pelanggan', ['id_pelanggan' => $id])->row_array();
    }

    public function ubahDataPelanggan()
    {
        $data = [
            "nm_pelanggan" => $this->input->post('nm_pelanggan', true),
            "alamat_pelanggan" => $this->input->post('alamat_pelanggan', true),
            "no_hp" => $this->input->post('nohp', true),
        ];
        $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'));
        $this->db->update('tbl_pelanggan', $data);
    }
    public function id_terakhir()
    {
        $this->db->select('id_pelanggan');
        $this->db->from('tbl_pelanggan');
        $this->db->order_by('id_pelanggan', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    public function hapusPelanggan($id)
    {
        $this->db->where('id_pelanggan', $id);
        $this->db->delete('tbl_pelanggan');
    }
}

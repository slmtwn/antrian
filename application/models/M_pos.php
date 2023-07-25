<?php
class M_pos extends CI_Model
{

    function get_data_barang_bykode($id_pelanggan)
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
}

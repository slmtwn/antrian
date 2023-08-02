<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Transaksi_model');
    }

    public function index()
    {
        $data['title'] = 'Tagihan Air';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['tagihan'] = $this->Transaksi_model->getAllTagihan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
    }

    public function bayar($id_tagihan)
    {
        $data['title'] = 'Bayar Tagihan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bayar'] = $this->db->query("SELECT p.id_pelanggan, p.nm_pelanggan, t.id_tagihan, t.tagihan, t.status, k.tahun, k.pakai, b.nama_bulan 
        from tbl_pelanggan p inner join tbl_pakai k on p.id_pelanggan=k.id_pelanggan
        inner join tbl_tagihan t on k.id_pakai=t.id_pakai
        inner join tbl_bulan b on k.bulan=b.id_bulan
        where t.id_tagihan=$id_tagihan")->row_array();

        $this->form_validation->set_rules('bayar', 'Bayar', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/bayar', $data);
            $this->load->view('templates/footer');
        } else {
            $databayar = [
                'id_tagihan' => $this->input->post('id_tagihan'),
                'tgl_bayar' => time(),
                'uang_bayar' => $this->input->post('bayar'),
                'kembali' => $this->input->post('kembali')
            ];
            $this->db->insert('tbl_pembayaran', $databayar);

            $this->db->set('status', '1');
            $this->db->where('id_tagihan', $databayar['id_tagihan']);
            $this->db->update('tbl_tagihan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran berhasil</div>');
            redirect("transaksi/bayar/$id_tagihan");
        }
    }
    public function cetak_pembayaran($id)
    {
        $this->load->model('Transaksi_model');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['struk'] = $this->Transaksi_model->getDataStruk($id);

        $this->load->view('transaksi/struk', $data);
        //redirect('transaksi/');
    }
}

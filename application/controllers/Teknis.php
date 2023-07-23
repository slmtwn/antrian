<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknis extends CI_Controller
{
    public function pelanggan()
    {
        $data['title'] = 'Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pelanggan_model');
        $data['pelanggan'] = $this->Pelanggan_model->getPelanggan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggan/index', $data);
        $this->load->view('templates/footer');
    }



    public function tambah()
    {
        $data['title'] = 'Tambah Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nm_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pelanggan/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nm_pelanggan' => $this->input->post('nm_pelanggan'),
                'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
                'status' => $this->input->post('status'),
                'tgl_daftar' => time()
            ];
            $this->db->insert('pelanggan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub Menu added!</div>');
            redirect('teknis/pelanggan');
        }
    }
}

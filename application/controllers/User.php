<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];


            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your Profile has been updated!</div>');
            redirect('user ');
        }
    }
    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm Password', 'required|trim|min_length[3]|matches[new_password1] ');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password cannot be same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
            // $new_password2 = $this->input->post('new_password2');
        }
    }

    public function tambahpakai()
    {
        $data['title'] = 'Tambah Pemakaian Air';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $idpel = $this->input->post('id_pelanggan');

        $this->load->model('Pemakaian_model');
        $data['bulan'] = $this->db->get('tbl_bulan')->result_array();
        $data['pelanggan'] = $this->db->get('tbl_pelanggan')->result_array();

        $this->form_validation->set_rules('id_pelanggan', 'ID Pelanggan', 'required');
        // $this->form_validation->set_rules('nm_pelanggan', 'Nama Pelanggan', 'required');
        // $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required');
        $this->form_validation->set_rules('akhir', 'Akhir', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/tambahpakai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'tahun' => $this->input->post('tahun'),
                'bulan' => $this->input->post('bulan'),
                'awal' => $this->input->post('awal'),
                'akhir' => $this->input->post('akhir'),
                'pakai' => $this->input->post('pakai'),
                'tgl_input' => time()
            ];
            $this->db->insert('tbl_pakai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pemakaian berhasil ditambahkan</div>');
            redirect('user/pemakaian');
        }
    }
    public function pemakaian()
    {
        $data['title'] = 'Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pemakaian_model');
        $data['pemakaian'] = $this->Pemakaian_model->getAllPemakaian();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pemakaian', $data);
        $this->load->view('templates/footer');
    }

    public function hapuspakai($id)
    {
        $this->load->model('Pemakaian_model');

        $this->Pemakaian_model->hapusPemakaian($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pemakaian berhasil dihapus</div>');
        redirect('user/pemakaian');
    }
}

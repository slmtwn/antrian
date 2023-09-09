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

        $this->load->model('Pemakaian_model');
        $this->db->order_by('id_bulan', 'ASC');
        $data['bulan'] = $this->db->get('tbl_bulan')->result_array();

        $data['tarif'] = $this->Pemakaian_model->getTarif();

        $row = $this->Pemakaian_model->id_terakhir();
        $config['id'] = $row->id_pakai;
        $config['awalan'] = 'GL';
        //$config['id'] = '0';
        $this->auto_number->config($config);
        $data['id_pakai'] = $this->auto_number->generate_id();

        $this->form_validation->set_rules('id_pelanggan', 'ID Pelanggan', 'required');
        $this->form_validation->set_rules('akhir', 'Akhir', 'required|numeric');

        $id_pelanggan = $this->input->post('id_pelanggan');
        $bln = $this->input->post('bulan');
        $thn = $this->input->post('tahun');

        $sql = $this->db->query("SELECT id_pelanggan,tahun,bulan 
        FROM tbl_pakai 
        WHERE id_pelanggan='$id_pelanggan'
        AND tahun='$thn'
        AND bulan='$bln'");
        $cek_data = $sql->num_rows();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/tambahpakai', $data);
            $this->load->view('templates/footer');
        } else if ($cek_data > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data bulan ' . $bln . ' tahun ' . $thn . ' untuk id Pelanggan ' . $id_pelanggan . ' sudah ada</div>');
            redirect('user/tambahpakai');
            echo var_dump($cek_data);
            die;
        } else {
            $datapakai = [
                'id_pakai' => $this->input->post('id_pakai'),
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'tahun' => $this->input->post('tahun'),
                'bulan' => $this->input->post('bulan'),
                'awal' => $this->input->post('awal'),
                'akhir' => $this->input->post('akhir'),
                'pakai' => $this->input->post('pakai'),
                'tgl_input' => time()
            ];
            $this->db->insert('tbl_pakai', $datapakai);
            $datatagihan = [
                'id_pakai' => $this->input->post('id_pakai'),
                'beban' => $this->input->post('beban'),
                'tagihan' => $this->input->post('harga'),
                'status' => '0'
            ];
            $this->db->insert('tbl_tagihan', $datatagihan);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pemakaian berhasil ditambahkan</div>');
            redirect('user/pemakaian');
        }
    }

    public function pemakaian()
    {
        $data['title'] = 'Pemakaian Air';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Pemakaian_model');
        $data['pemakaian'] = $this->Pemakaian_model->getAllPemakaian();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pemakaian', $data);
        $this->load->view('templates/footer');
    }

    function get_awal()
    {
        $this->load->model('m_pos');
        $id_pelanggan = $this->input->post('id_pelanggan');
        $data = $this->m_pos->get_data_barang_bykode($id_pelanggan);
        echo json_encode($data);
    }

    function tarif()
    {
        $this->load->model('Pemakaian_model');
        $data['tarif'] = $this->Pemakaian_model->getTarif();
    }

    public function hapuspakai($id)
    {
        $this->load->model('Pemakaian_model');
        $cek_status = $this->Pemakaian_model->cekstatus($id)->row_array();
        // echo var_dump($cek_status);
        // die;
        if ($cek_status['status'] == '1') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data sudah terbayar tidak dapat dihapus</div>');
            redirect('user/pemakaian');
        } else {
            $this->Pemakaian_model->hapusPemakaian($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pemakaian berhasil dihapus</div>');
            redirect('user/pemakaian');
        }
    }
}

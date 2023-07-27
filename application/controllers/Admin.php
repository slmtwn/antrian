<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        $this->load->model('Dashboard_model');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jml_pelanggan'] = $this->db->count_all('tbl_pelanggan');


        $data['totalTagihan'] = $this->Dashboard_model->getSumTotalTagihan();
        $data['totalLunas'] = $this->Dashboard_model->getSumTagihanLunas();
        $data['totalBlmLunas'] = $this->Dashboard_model->getSumTagihanBlmLunas();
        $data['real_bln'] = $this->Dashboard_model->getRealBUlan();
        // $this->db->select_sum('uang_bayar');
        // $data['hasil_bulan'] = $this->db->get('tbl_pembayaran');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }
    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Access Change!</div>');
    }

    public function tarif()
    {
        $data['title'] = 'Tarif';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['tarif'] = $this->db->get('tbl_layanan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tarif', $data);
        $this->load->view('templates/footer');
    }
    public function user()
    {
        $data['title'] = 'User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['allUser'] = $this->Admin_model->getAllUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }
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

        $this->load->model('Pelanggan_model');
        $data['layanan'] = $this->db->get('tbl_layanan')->row_array();

        // $row = $this->Pelanggan_model->id_terakhir();
        // $config['id'] = $row->id_pelanggan;
        // $config['awalan'] = 'GL';
        // $config['id'] = '4';
        // $this->auto_number->config($config);
        // $data['idpel'] = $this->auto_number->generate_id();

        $row = $this->Pelanggan_model->id_terakhir();
        $row = $this->Pelanggan_model->id_terakhir();
        $config['id'] = $row->id_pelanggan;
        $config['digit'] = 4;
        $config['tanggal'] = TRUE;
        $this->auto_number->config($config);
        $data['idpel'] = $this->auto_number->generate_id();


        $this->form_validation->set_rules('id_pelanggan', 'ID Pelanggan', 'required');
        $this->form_validation->set_rules('nm_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'required|numeric');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pelanggan/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'nm_pelanggan' => $this->input->post('nm_pelanggan'),
                'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
                'status' => $this->input->post('status'),
                'no_hp' => $this->input->post('nohp'),
                'id_layanan' => $this->input->post('layanan'),
                'tgl_daftar' => time()
            ];
            $this->db->insert('tbl_pelanggan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pelanggan berhasil ditambahkan</div>');
            redirect('admin/pelanggan');
        }
    }
    public function hapuspelanggan($id)
    {
        $this->load->model('Pelanggan_model');

        $this->Pelanggan_model->hapusPelanggan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pelanggan berhasil dihapus</div>');
        redirect('admin/pelanggan');
    }
}

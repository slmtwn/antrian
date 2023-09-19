<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'display antrian';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header');
		$this->load->view('templates/topbar', $data);
		$this->load->view('welcome_message', $data);
		//$this->load->view('layanan/index', $data);
		$this->load->view('templates/footer');
	}
}

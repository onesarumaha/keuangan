<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_profile');
		if($this->session->userdata('level')!= "Bagian Keuangan" & $this->session->userdata('level')!= "Manejer" & $this->session->userdata('level')!= "Karyawan" ) {
			redirect(base_url('welcome'));
		}
		
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['query']= $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$this->load->model('Transaksi_m');

		$data['sum'] = $this->Transaksi_m->getSum();
		$data['sum2'] = $this->Transaksi_m->getSum2();

		$data['sisa'] = $this->Transaksi_m->getSum() - $this->Transaksi_m->getSum2();

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('master/index');
		$this->load->view('layouts/footer');
	}

	public function profile()
	{
		$data['title'] = "Profile";
		$data['query']= $this->db->get_where('users',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('master/profile', $data);
		$this->load->view('layouts/footer');
	}

	public function proses_edit($id) 
	{
		$data['title'] = "Edit Profile";
		$data['nama'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['query'] = $this->M_profile->getProfileId($id);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[20]');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('ttl', 'Tanggal lahir', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password2]');
		$this->form_validation->set_rules('password2', 'konfirmasi Password', 'required|trim|matches[password]');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/navbar');
			$this->load->view('layouts/sidebar');
			$this->load->view('master/profile', $data);
			$this->load->view('layouts/footer');
		}else{
			$this->M_profile->edit_profile();
			$this->session->set_flashdata('flash', ' Diubah');
			redirect(base_url('Auth/profile'));
		}

	}

	


}

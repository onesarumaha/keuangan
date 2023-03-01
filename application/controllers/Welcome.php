<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->model('M_profile');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['title'] = "LOGIN | PT. RAJAWALI PENTA GRAFIKA";

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login/index', $data);
		}else{
			$this->login();
		}	
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if($user) {
			if(password_verify($password, $user['password'])) { 
			// if($user['password']) { 
				$data = [
					'username' => $user['username'],
					'level' => $user['level'],
				];
				$this->session->set_userdata($data);
				if($user['level'] == 'Bagian Keuangan' ) {
					redirect(base_url('Auth'));
				}elseif($user['level'] == 'Manejer') {
					redirect(base_url('Auth'));
				}elseif($user['level'] == 'Karyawan' ) {
					redirect(base_url('Auth'));
				}
			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert"> Password Salah</div>');
        		redirect(base_url('welcome'));
			}
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible" role="alert"> Username Salah</div>');
        	redirect(base_url('welcome'));
		}
	}

	public function daftar_karyawan() 
	{
		$data['title'] = "DAFTAR KARYAWAN | PT. RAJAWALI PENTA GRAFIKA";
		$this->load->view('login/daftar', $data);
	}

	public function aksi_daftar() 
	{
		if($this->session->userdata('username')) {
			redirect('welcome');
		}
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
				'is_unique' => 'Password sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password','Password','required|trim|min_length[5]|matches[password2]', [
				'matches' => 'Password Tidak Sesuai',
				'min_length' => 'Password terlalu pendek minimal 5 karakter'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

		if($this->form_validation->run() == false){
			$data['title'] = 'DAFTAR KARYAWAN';
			$this->load->view('login/daftar', $data);
		}else{
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'jk' => htmlspecialchars($this->input->post('jk', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('ttl', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'level' => 'Karyawan'
			];

			$this->db->insert('users', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
 			 Selamat, Silahkan Login</div>');
			redirect('Welcome');

		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->sess_destroy();

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert"> Logout Berhasil</div>');
        redirect(base_url('welcome'));
	}
}

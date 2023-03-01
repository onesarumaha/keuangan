<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('Transaksi_m');
		if($this->session->userdata('level')!= "Bagian Keuangan" & $this->session->userdata('level')!= "Karyawan") {
			redirect(base_url('welcome'));
		}
		
	}

	// PENDAPATAN

	public function pendapatan() 
	{
		$data['title'] = "Transaksi Pendapatan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();

		// pagination 

		$config['base_url'] = 'http://localhost/keuangan/Transaksi/pendapatan';
		$config['total_rows'] = $this->Transaksi_m->countAllPendapatan();
		$config['per_page'] = 5;
		$config['num_links'] = 2;

		
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&laquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&raquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');
		

		$this->pagination->initialize($config);


 		$data['start'] = $this->uri->segment(3);
		$data['pendapatan'] = $this->Transaksi_m->getPagination($config['per_page'], $data['start']);
		$data['sum'] = $this->Transaksi_m->getSum();


		if($this->input->post('cari') ) {
			$data['pendapatan'] = $this->Transaksi_m->cari_pen();
		}

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('master/pendapatan', $data);
		$this->load->view('layouts/footer');	
	}

	public function add_pendapatan() 
	{
		$data['title'] = "Transaksi Pendapatan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['pendapatan'] = $this->Transaksi_m->get_transaksi();


		// 
		// pagination 

		$config['base_url'] = 'http://localhost/keuangan/Transaksi/pendapatan';
		$config['total_rows'] = $this->Transaksi_m->countAllPendapatan();
		$config['per_page'] = 5;
		$config['num_links'] = 2;

		
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&laquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&raquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');
		

		$this->pagination->initialize($config);


 		$data['start'] = $this->uri->segment(3);
		$data['pendapatan'] = $this->Transaksi_m->getPagination($config['per_page'], $data['start']);
		$data['sum'] = $this->Transaksi_m->getSum();
		// 

		$this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('jenis_pendapatan', 'Jenis Pendapatan', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/navbar');
			$this->load->view('layouts/sidebar');
			$this->load->view('master/pendapatan', $data);
			$this->load->view('layouts/footer');
		}else{
			$this->Transaksi_m->addPendapatan();
			
			$this->session->set_flashdata('pesan', ' Ditambahkan');
            redirect(base_url('Transaksi/pendapatan'));
		}


	}


	public function edit_pendapatan($id)
	{
		$data['title'] = "Edit Pendapatan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		// $data['pendapatan'] = $this->Transaksi_m->getDataTransaksi();
		$data['pendapatan'] = $this->Transaksi_m->idPendapatan($id);

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('master/edit_pendapatan', $data);
		$this->load->view('layouts/footer');
	}

	public function proses_edit($id)
	{
		$data['title'] = "Edit Pendapatan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['pendapatan'] = $this->Transaksi_m->idPendapatan($id);

		$this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('jenis_pendapatan', 'Jenis Pendapatan', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/navbar');
			$this->load->view('layouts/sidebar');
			$this->load->view('master/edit_pendapatan', $data);
			$this->load->view('layouts/footer');
		}else{
			$this->Transaksi_m->editPendapatan();
			$this->session->set_flashdata('pesan', ' diupdate');
            redirect(base_url('Transaksi/pendapatan'));
		}
	}


	public function del_pendapatan($id)
	{
		$this->Transaksi_m->del_pendapatan($id);
       	$this->session->set_flashdata('pesan', ' Dihapus');
        redirect(base_url('Transaksi/pendapatan'));

	}


	// PENGELUARAN


	public function pengeluaran()
	{
		$data['title'] = "Data Transaksi Pengeluaran";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['pengeluaran'] = $this->Transaksi_m->getPengeluaran();

		// pagination 

		$config['base_url'] = 'http://localhost/keuangan/Transaksi/pengeluaran';
		$config['total_rows'] = $this->Transaksi_m->countAllPengeluaran();
		$config['per_page'] = 5;
		$config['num_links'] = 2;

		
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&laquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&raquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');
		

		$this->pagination->initialize($config);


 		$data['start'] = $this->uri->segment(3);
		$data['pengeluaran'] = $this->Transaksi_m->getPagination2($config['per_page'], $data['start']);
		$data['sum'] = $this->Transaksi_m->getSum2();

		if($this->input->post('cari1') ) {
			$data['pengeluaran'] = $this->Transaksi_m->cari_peng();
		}

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('master/pengeluaran', $data);
		$this->load->view('layouts/footer');
	}

	public function add_pengeluaran() 
	{
		$data['title'] = "Tambah Pengeluaran";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['pengeluaran'] = $this->Transaksi_m->getPengeluaran();

		// 
		// pagination 

		$config['base_url'] = 'http://localhost/keuangan/Transaksi/pengeluaran';
		$config['total_rows'] = $this->Transaksi_m->countAllPengeluaran();
		$config['per_page'] = 5;
		$config['num_links'] = 2;

		
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&laquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&raquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');
		

		$this->pagination->initialize($config);


 		$data['start'] = $this->uri->segment(3);
		$data['pengeluaran'] = $this->Transaksi_m->getPagination2($config['per_page'], $data['start']);
		$data['sum'] = $this->Transaksi_m->getSum2();
		
		// 

		$this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('jenis_pengeluaran', 'Jenis Pengeluaran', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/navbar');
			$this->load->view('layouts/sidebar');
			$this->load->view('master/pengeluaran', $data);
			$this->load->view('layouts/footer');
		}else{
			$this->Transaksi_m->addPengeluaran();
      		$this->session->set_flashdata('pesan', ' Ditambahkan');
            redirect(base_url('Transaksi/pengeluaran'));
		}
	}

	public function del_pengeluaran($id)
	{
		$this->Transaksi_m->del_pengeluaran($id);
       	$this->session->set_flashdata('pesan', ' Dihapus');
        redirect(base_url('Transaksi/pengeluaran'));
	}

	public function edit_pengeluaran($id)
	{
		$data['title'] = "Edit Pengeluaran";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['pengeluaran'] = $this->Transaksi_m->idPengeluaran($id);

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('master/edit_pengeluaran', $data);
		$this->load->view('layouts/footer');
	}

	public function proses_pengeluaran($id)
	{
		$data['title'] = "Edit Pengeluaran";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['pengeluaran'] = $this->Transaksi_m->idPengeluaran($id);

		$this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('jenis_pengeluaran', 'Jenis Pengeluaran', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/navbar');
			$this->load->view('layouts/sidebar');
			$this->load->view('master/edit_pengeluaran', $data);
			$this->load->view('layouts/footer');
		}else{
			$this->Transaksi_m->editPengeluaran();
       		$this->session->set_flashdata('pesan', ' Diupdate');
            redirect(base_url('Transaksi/pengeluaran'));
		}
	}

	





























}
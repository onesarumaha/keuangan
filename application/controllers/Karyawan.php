<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('Karyawan_m');
		$this->load->model('Transaksi_m');
		if($this->session->userdata('level')!= "Karyawan" & $this->session->userdata('level')!= "Bagian Keuangan" & $this->session->userdata('level')!= "Manejer") {
			redirect(base_url('welcome'));
		}
		
	}

	public function pendapatan() 
	{
		$data['title'] = "Transaksi Pendapatan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('karyawan/pendapatan', $data);
		$this->load->view('layouts/footer');	
	}


	public function input_pendapatan()
	{
		$data['title'] = "Input Pendapatan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();

		$this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('jenis_pendapatan', 'Jenis Pendapatan', 'trim|required');
		
		$config['upload_path']          = './assets/buktitransaksi/';
        $config['allowed_types']        = 'gif|jpg|png|JPEG';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar'))
        {
            $this->load->view('layouts/header', $data);
			$this->load->view('layouts/navbar');
			$this->load->view('layouts/sidebar');
			$this->load->view('karyawan/pendapatan', $data);
			$this->load->view('layouts/footer');
        }
        else
        {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $nama = $this->input->post('nama', TRUE);
			$tgl = $this->input->post('tgl');
			$kategori = $this->input->post('jenis_pendapatan', TRUE);
			$keterangan = $this->input->post('keterangan', TRUE);
			$pendapatan = $this->input->post('jumlah', TRUE);
			$jenis_transaksi = 'Pendapatan';
			$status = 'Belum';

			$data = array(
				'nama' => $nama,
				'tgl' => $tgl,
				'kategori' => $kategori,
				'keterangan' => $keterangan,
				'pendapatan' => $pendapatan,
				'jenis_transaksi' => $jenis_transaksi,
				'status' => $status,
				'gambar' => $gambar
			);

			$this->db->insert('data_transaksi', $data);
			$this->session->set_flashdata('pesan', ' Ditambahkan');
            redirect(base_url('Karyawan/pendapatan'));
        }


	
	}



	public function pengeluaran() 
	{
		$data['title'] = "Transaksi Pengeluaran";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('karyawan/pengeluaran', $data);
		$this->load->view('layouts/footer');	
	}

	public function input_pengeluaran()
	{
		$data['title'] = "Input Pendapatan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		
		$config['upload_path']          = './assets/buktitransaksi/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar'))
        {
            $this->load->view('layouts/header', $data);
			$this->load->view('layouts/navbar');
			$this->load->view('layouts/sidebar');
			$this->load->view('karyawan/pengeluaran', $data);
			$this->load->view('layouts/footer');
        }
        else
        {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $nama = $this->input->post('nama', TRUE);
			$tgl = $this->input->post('tgl');
			$kategori = $this->input->post('jenis_pengeluaran', TRUE);
			$keterangan = $this->input->post('keterangan', TRUE);
			$pengeluaran = $this->input->post('jumlah', TRUE);
			$jenis_transaksi = 'Pengeluaran';
			$status = 'Belum';

			$data = array(
				'nama' => $nama,
				'tgl' => $tgl,
				'kategori' => $kategori,
				'keterangan' => $keterangan,
				'pengeluaran' => $pengeluaran,
				'jenis_transaksi' => $jenis_transaksi,
				'status' => $status,
				'gambar' => $gambar
			);

			$this->db->insert('data_transaksi', $data);
			$this->session->set_flashdata('pesan', ' Ditambahkan');
            redirect(base_url('Karyawan/pengeluaran'));
        }
	}

	public function data_karyawan()
	{
		$data['title'] = "Data Karyawan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['karyawan'] = $this->Karyawan_m->get_karyawan();
		if($this->input->post('cari5') ) {
			$data['karyawan'] = $this->Karyawan_m->cari_kar();
		}
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('karyawan/data_karyawan', $data);
		$this->load->view('layouts/footer');
	}

	public function del_karyawan($id)
	{
		$this->Karyawan_m->del_karyawan($id);
       	$this->session->set_flashdata('pesan', ' Dihapus');
        redirect(base_url('Karyawan/data_karyawan'));
	}

	public function varifikasi_pendapatan()
	{
		$data['title'] = "Transaksi Pendapatan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();

		// pagination 

		$config['base_url'] = 'http://localhost/keuangan/Karyawan/varifikasi_pendapatan';
		$config['total_rows'] = $this->Karyawan_m->countAllPendapatan();
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
		$data['veripen'] = $this->Karyawan_m->getPagination($config['per_page'], $data['start']);
		$data['sum'] = $this->Karyawan_m->getSum();

		
		if($this->input->post('cari3') ) {
			$data['veripen'] = $this->Karyawan_m->cari_ver();
		}

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('karyawan/verifikasi_pendapatan', $data);
		$this->load->view('layouts/footer');
	}

	public function varifikasi_pengeluaran()
	{
		$data['title'] = "Data Transaksi Pengeluaran";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();

		// pagination 

		$config['base_url'] = 'http://localhost/keuangan/Karyawan/varifikasi_pengeluaran';
		$config['total_rows'] = $this->Karyawan_m->countAllPengeluaran();
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
		$data['veripeng'] = $this->Karyawan_m->getPagination2($config['per_page'], $data['start']);
		$data['sum'] = $this->Karyawan_m->getSum2();
		
		if($this->input->post('cari4') ) {
			$data['veripeng'] = $this->Karyawan_m->cari_verp();
		}

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('karyawan/verifikasi_pengeluaran', $data);
		$this->load->view('layouts/footer');
	}

	public function ver_pendapatan($id)
	{
	      $data  = array(
	         'status'      =>  'Sudah'
	      );

	      $res = $this->Karyawan_m->ver_pendapatan($id, $data);

	      if($res >0){
	      	$this->session->set_flashdata('pesan', ' Verifikasi');
	        redirect(base_url('Karyawan/varifikasi_pendapatan'));
	      }else{
	       // kalau error 
	      }

	}

	public function ver_pengeluaran($id)
	{
	      $data  = array(
	         'status'      =>  'Sudah'
	      );

	      $res = $this->Karyawan_m->ver_pengeluaran($id, $data);

	      if($res >0){
	      $this->session->set_flashdata('pesan', ' Verifikasi');	
	        redirect(base_url('Karyawan/varifikasi_pengeluaran'));
	      }else{
	       // kalau error 
	      }
	}

	public function hapus_pengeluaran($id)
	{
		$this->Transaksi_m->del_pengeluaran($id);
      	$this->session->set_flashdata('pesan', ' Dihapus');
        redirect(base_url('Karyawan/varifikasi_pengeluaran'));
	}

	public function hapus_pendapatan($id)
	{
		$this->Transaksi_m->del_pendapatan($id);
      	$this->session->set_flashdata('pesan', ' Dihapus');
        redirect(base_url('Karyawan/varifikasi_pendapatan'));
	}

	public function view_pendapatan($id)
	{
		$data['title'] = "Review Bukti Transaksi";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['view_pen'] = $this->Karyawan_m->getId($id);
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('karyawan/view_pendapatan', $data);
		$this->load->view('layouts/footer');
		
	}

	public function view_pengeluaran($id)
	{
		$data['title'] = "Review Bukti Transaksi";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['view_peng'] = $this->Karyawan_m->getId($id);
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('karyawan/view_pengeluaran', $data);
		$this->load->view('layouts/footer');
	}












}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
		$this->load->library('form_validation');
		$this->load->model('Transaksi_m');
		if($this->session->userdata('level')!= "Bagian Keuangan" & $this->session->userdata('level')!= "Manejer") {
			redirect(base_url('welcome'));
		}
		
	}

	// Laporan

	public function laporan() 
	{
		$data['title'] = "Laporan Keuangan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['lap_pendapatan'] = $this->Transaksi_m->get_laporan();
		$data['sum'] = $this->Transaksi_m->getSum();
		$data['sum2'] = $this->Transaksi_m->getSum2();
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('master/laporan', $data);
		$this->load->view('layouts/footer');
	}

	public function laporan_keuangan() 
	{
		$data['title'] = "Laporan Keuangan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['lap_pendapatan'] = $this->Transaksi_m->get_laporan();
		$data['sum'] = $this->Transaksi_m->getSum();
		$data['sum2'] = $this->Transaksi_m->getSum2();
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('master/laporan_pendapatan', $data);
		$this->load->view('layouts/footer');
	}

	public function periode_keuangan() {
		$data['title'] = "Laporan Keuangan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['lap_pendapatan'] = $this->Transaksi_m->get_laporan();
		$data['sum'] = $this->Transaksi_m->getSum();
		$data['sum2'] = $this->Transaksi_m->getSum2();
		$this->form_validation->set_rules('tgl_1', 'Tanggal Awal', 'trim|required');
		$this->form_validation->set_rules('tgl_2', 'Tanggal Akhir', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/navbar');
			$this->load->view('layouts/sidebar');
			$this->load->view('master/laporan_pendapatan', $data);
			$this->load->view('layouts/footer');
		}else{
			$this->load->view('master/cetak_pendapatan');
		}
        
    }
	
    public function full_laporan() {
		$dompdf = new Dompdf();
		$data = array(
			'title' => 'Laporan Keuangan'
		);
		$data['full'] = $this->Transaksi_m->get_laporan();
		$data['sum'] = $this->Transaksi_m->getSum();
		$data['sum2'] = $this->Transaksi_m->getSum2();
		$data['saldo'] = $this->Transaksi_m->getSum() - $this->Transaksi_m->getSum2();
		$html = $this->load->view('master/full_laporan_keuangan', $data,true);
		$dompdf->load_html($html);
		$dompdf->set_paper('A4', 'landscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporaanpendapatan.pdf', array("Attachment" => false));
        
    }

    public function laporan_pengeluaran() 
	{
		$data['title'] = "Laporan Pengeluaran";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['lap_pengeluaran'] = $this->Transaksi_m->getpengeluaran();
		$data['sum2'] = $this->Transaksi_m->getSum2();
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('master/laporan_pengeluaran', $data);
		$this->load->view('layouts/footer');
	}

	public function periode_pengeluaran() 
	{
		$data['title'] = "Laporan Pengeluaran";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['lap_pengeluaran'] = $this->Transaksi_m->getpengeluaran();
		$data['sum2'] = $this->Transaksi_m->getSum2();
		$this->form_validation->set_rules('tgl_1', 'Tanggal Awal', 'trim|required');
		$this->form_validation->set_rules('tgl_2', 'Tanggal Akhir', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/navbar');
			$this->load->view('layouts/sidebar');
			$this->load->view('master/laporan_pengeluaran', $data);
			$this->load->view('layouts/footer');
		}else{
			$this->load->view('master/cetak_pengeluaran');
		}
        
    }

     public function full_pengeluaran() 
     {
		$dompdf = new Dompdf();
		$data = array(
			'title' => 'Laporan Pengeluaran'
		);
		$data['full'] = $this->Transaksi_m->getpengeluaran();
		$data['sum2'] = $this->Transaksi_m->getSum2();
		$html = $this->load->view('master/full_pengeluaran', $data,true);
		$dompdf->load_html($html);
		$dompdf->set_paper('A4', 'landscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporaanpengeluaran.pdf', array("Attachment" => false));
        
    }

}
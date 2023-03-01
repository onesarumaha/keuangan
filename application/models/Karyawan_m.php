<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_m extends CI_Model {

	public function get_allpendapatan() 
	{
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->where('status','Belum');
		$this->db->where('pendapatan');
		return $this->db->get('data_transaksi')->result_array();  
	}

	public function countAllPendapatan()
	{
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->where('status','Belum');
		$this->db->where('jenis_transaksi','Pendapatan');
		return $this->db->get('data_transaksi')->num_rows();
	}

	public function getId($id) {
		return $this->db->get_where('data_transaksi', ['id_transaksi' => $id])->row_array();
	}

	public function getPagination($limit, $start)
	{
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->where('status','Belum');
		$this->db->where('jenis_transaksi','Pendapatan');
		return $this->db->get('data_transaksi', $limit,$start)->result_array();
	}

		public function getSum()
	{
		$sql = "SELECT sum(pendapatan) as pendapatan FROM data_transaksi where status='Belum' ";
		$result = $this->db->query($sql);
		return $result->row()->pendapatan;
	}

	// pengeluaran

	public function countAllPengeluaran()
	{
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->where('status','Belum');
		$this->db->where('jenis_transaksi', 'Pengeluaran');
		return $this->db->get('data_transaksi')->num_rows();
	}

	public function getPagination2($limit, $start)
	{
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->where('status','Belum');
		$this->db->where('jenis_transaksi', 'Pengeluaran');
		return $this->db->get('data_transaksi', $limit,$start)->result_array();
	}

		public function getSum2()
	{
		$sql = "SELECT sum(pengeluaran) as pengeluaran FROM data_transaksi where status='Belum'";
		$result = $this->db->query($sql);
		return $result->row()->pengeluaran;
	}

	public function inputPendapatan() 
	{
		$data = [
				'nama_input' => htmlspecialchars($this->input->post('nama', true)),
				'tgl' => htmlspecialchars($this->input->post('tgl', true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
				'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
				'jenis_pendapatan' => htmlspecialchars($this->input->post('jenis_pendapatan', true)),
				'status' => 'Belum Verifikasi'
			];

		$this->db->insert('pendapatan', $data);

	}


	public function get_karyawan() 
	{
		$this->db->where('level','Karyawan');
		return $this->db->get('users')->result_array();
	}

	public function del_karyawan($id) 
	{
		$this->db->delete('users', ['id' => $id]);
		
	}

	public function ver_pendapatan($id, $data) 
	{
		$this->db->where('id_transaksi', $id);
		return $this->db->update('data_transaksi', $data);
	}

	public function ver_pengeluaran($id, $data) 
	{
		$this->db->where('id_transaksi', $id);
		return $this->db->update('data_transaksi', $data);
	}

	public function cari_ver() {
		$cari3 = $this->input->post('cari3');
		$this->db->or_like('nama', $cari3);
		$this->db->where('status','Belum');
		$this->db->where('jenis_transaksi','Pendapatan');
		return $this->db->get('data_transaksi')->result_array();
	}

	public function cari_verp() 
	{
		$cari4 = $this->input->post('cari4');
		$this->db->or_like('nama', $cari4);
		$this->db->where('status','Belum');
		$this->db->where('jenis_transaksi','Pengeluaran');
		return $this->db->get('data_transaksi')->result_array();
	}

	public function cari_kar() 
	{
		$cari5 = $this->input->post('cari5');
		$this->db->or_like('nama', $cari5);
		$this->db->or_like('username', $cari5);
		$this->db->where('level','Karyawan');
		return $this->db->get('users')->result_array();
	}

	// public function karPendapatan()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('data_transaksi');
	// 	$this->db->where('status', 'Pendapatan');
	// 	$this->db->where('nama', $this->session->userdata('username'));

	// 	return $this->db->get();

	// 	$this->db->order_by('id_transaksi', 'DESC');
	// 	$this->db->where('status','Belum');
	// 	$this->db->where('jenis_transaksi', 'Pengeluaran');
	// 	$this->db->where('nama', $this->session->userdata('username'));
	// 	return $this->db->get('data_transaksi')->num_rows();


	// }









}

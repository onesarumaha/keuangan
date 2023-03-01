<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_m extends CI_Model {

	public function get_transaksi()
	{
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->where('status','Sudah');
		$this->db->where('pendapatan');
		return $this->db->get('data_transaksi')->result_array();  
	}

	public function getPagination($limit, $start)
	{
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->where('status','Sudah');
		$this->db->where('jenis_transaksi','Pendapatan');
		return $this->db->get('data_transaksi', $limit,$start)->result_array();
	}

	public function countAllPendapatan()
	{
		return $this->db->get('data_transaksi')->num_rows();
	}

	public function getSum()
	{
		$sql = "SELECT sum(pendapatan) as pendapatan FROM data_transaksi where status='Sudah' ";
		$result = $this->db->query($sql);
		return $result->row()->pendapatan;
	}


	public function idPendapatan($id) {
		return $this->db->get_where('data_transaksi', ['id_transaksi' => $id])->row_array();
	}

	public function addPendapatan() 
	{
		$data = [
				'nama' => 'Bagian Keuangan',
				'tgl' => htmlspecialchars($this->input->post('tgl', true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
				'kategori' => htmlspecialchars($this->input->post('jenis_pendapatan', true)),
				'pendapatan' => htmlspecialchars($this->input->post('jumlah', true)),
				'pengeluaran' => ' ',
				'status' => 'Sudah',
				'jenis_transaksi' => 'Pendapatan',
				'gambar' => 'Bagian Keuangan',
			];

		$this->db->insert('data_transaksi', $data);

	}

	public function editPendapatan()
	{
		$data = [
				'nama' => 'Bagian Keuangan',
				'tgl' => htmlspecialchars($this->input->post('tgl', true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
				'kategori' => htmlspecialchars($this->input->post('jenis_pendapatan', true)),
				'pendapatan' => htmlspecialchars($this->input->post('jumlah', true)),
				'pengeluaran' => ' ',
				'status' => 'Sudah',
				'jenis_transaksi' => 'Pendapatan',
				'gambar' => 'Bagian Keuangan',
			];
		$this->db->where('id_transaksi', $this->input->post('id_transaksi'));
		$this->db->update('data_transaksi', $data);
	}

	public function del_pendapatan($id) 
	{
		$this->db->where('id_transaksi',$id);
	    $query = $this->db->get('data_transaksi');
	    $row = $query->row();

	    unlink("./assets/buktitransaksi/$row->gambar");

	    $this->db->delete('data_transaksi', ['id_transaksi' => $id]);
	}



	// pengeluaran

	public function getPengeluaran()
	{
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->where('status','Sudah');
		$this->db->where('pengeluaran');
		return $this->db->get('data_transaksi')->result_array();  
	}

	public function addPengeluaran() 
	{
		$data = [
				'nama' => 'Bagian Keuangan',
				'tgl' => htmlspecialchars($this->input->post('tgl', true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
				'kategori' => htmlspecialchars($this->input->post('jenis_pengeluaran', true)),
				'pendapatan' => ' ',
				'pengeluaran' => htmlspecialchars($this->input->post('jumlah', true)),
				'status' => 'Sudah',
				'jenis_transaksi' => 'Pengeluaran',
				'gambar' => 'Bagian Keuangan',
			];

		$this->db->insert('data_transaksi', $data);

	}

	public function getSum2()
	{
		$sql = "SELECT sum(pengeluaran) as pengeluaran FROM data_transaksi where status='Sudah'";
		$result = $this->db->query($sql);
		return $result->row()->pengeluaran;
	}

	public function getPagination2($limit, $start)
	{
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->where('status','Sudah');
		$this->db->where('jenis_transaksi','Pengeluaran');
		return $this->db->get('data_transaksi', $limit,$start)->result_array();
	}

	public function countAllPengeluaran()
	{
		return $this->db->get('data_transaksi')->num_rows();
	}

	public function del_pengeluaran($id)
	{
		$this->db->where('id_transaksi',$id);
	    $query = $this->db->get('data_transaksi');
	    $row = $query->row();

	    unlink("./assets/buktitransaksi/$row->gambar");

	    $this->db->delete('data_transaksi', ['id_transaksi' => $id]);

	}

	public function idPengeluaran($id) {
		return $this->db->get_where('data_transaksi', ['id_transaksi' => $id])->row_array();
	}

	public function editPengeluaran()
	{
		$data = [
				'nama' => 'Bagian Keuangan',
				'tgl' => htmlspecialchars($this->input->post('tgl', true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
				'kategori' => htmlspecialchars($this->input->post('jenis_pengeluaran', true)),
				'pendapatan' => ' ',
				'pengeluaran' => htmlspecialchars($this->input->post('jumlah', true)),
				'status' => 'Sudah',
				'gambar' => 'Bagian Keuangan',
			];
		$this->db->where('id_transaksi', $this->input->post('id_transaksi'));
		$this->db->update('data_transaksi', $data);
	}

	public function cari_pen() {
		$cari = $this->input->post('cari');
		$this->db->or_like('tgl', $cari);
		$this->db->or_like('kategori', $cari);
		$this->db->where('status','Sudah',$cari);
		$this->db->where('jenis_transaksi','Pendapatan',$cari);
		return $this->db->get('data_transaksi')->result_array();
	}

	public function cari_peng() {
		$cari1 = $this->input->post('cari1');
		$this->db->or_like('tgl', $cari1);
		$this->db->or_like('kategori', $cari1);
		$this->db->where('status','Sudah',$cari1);
		$this->db->where('jenis_transaksi', 'Pengeluaran',$cari1);
		return $this->db->get('data_transaksi')->result_array();
	}

	public function get_laporan()
	{
		$this->db->order_by('id_transaksi', 'DESC');
		$this->db->where('status','Sudah');
		return $this->db->get('data_transaksi')->result_array();  
	}


}
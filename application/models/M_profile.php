<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {

	public function getAllProfile()
	{
		return $this->db->get('users')->result_array();
	}

	public function getProfileId($id)
	{

		return $this->db->get_where('users', ['id' => $id])->row_array();
			

	}

	public function edit_profile() 
	{
		$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'jk' => htmlspecialchars($this->input->post('jk', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('ttl', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('users', $data);
	}
}

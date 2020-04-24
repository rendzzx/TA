<?php defined('BASEPATH') OR exit('No direct script access allowed');

class karyawan_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('karyawan');
		if($id != null) {
			$this->db->where('karyawan_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'nik' => $post['nik'],
			'nama' => $post['karyawan_name'],
			'gender' => $post['gender'],
			'phone' => $post['nom'],
			'alamat' => $post['addr'],
			'divisi' => $post['div'],
			'status' => $post['status'],
		];
		$this->db->insert('karyawan', $params);
	}

	public function edit($post)
	{
		$params = [
			'nik' => $post['nik'],
			'nama' => $post['karyawan_name'],
			'gender' => $post['gender'],
			'phone' => $post['nom'],
			'alamat' => $post['addr'],
			'divisi' => $post['div'],
			'status' => $post['status'],
		];
		$this->db->where('karyawan_id', $post['id']);
		$this->db->update('karyawan', $params);
	}

	public function del($id)
	{
		$this->db->where('karyawan_id', $id);
		$this->db->delete('karyawan');
	}
}
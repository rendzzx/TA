<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pengembalian_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('v_transaksi_kembali');
		if($id != null) {
			$this->db->where('no_trans', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_process(){
		$this->db->from('v_transaksi_process');
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'no_trans' => $post['no_trans'],
			'nik' => $post['nik'],
			'kd_alat' => $post['kd'],
			'jumlah' => $post['jml'],
			'tgl_pinjam' => $post['tgl'],
			'keterangan' => $post['ket'],
		];
		$this->db->insert('pengembalian', $params);
	}

	public function edit($post)
	{
		$params = [
			'no_trans' => $post['no_trans'],
			'nik' => $post['nik'],
			'kd_alat' => $post['kd'],
			'jumlah' => $post['jml'],
			'tgl_pinjam' => $post['tgl'],
			'keterangan' => $post['ket'],
		];
		$this->db->where('pengembalian_id', $post['id']);
		$this->db->update('pengembalian', $params);
	}

	public function del($id)
	{
		$this->db->where('pengembalian_id', $id);
		$this->db->delete('pengembalian');
	}
}
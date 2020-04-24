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

	public function get_kembali($id)
	{
		$this->db->from('v_transaksi_pinjam');
		$this->db->where('no_trans', $id);
		$query = $this->db->get();
		return $query;
	}

	public function combo_karyawan(){
		$this->db->from('karyawan');
		$query = $this->db->get();
		return $query->result();
	}

	public function combo_tools(){
		$this->db->from('tools');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_process(){
		$this->db->from('v_transaksi_process');
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$header = [
			'tanggal_kembali' => $post['tgl'],
		];
		$this->db->where('no_trans', $post['no_trans']);
		$this->db->update('transaksi_header', $header);
		$detail = [
			'no_trans' => $post['no_trans'],
			'alat_id' => $post['tools'],
			'qty' => $post['jml'],
			'keterangan' => $post['ket'],
		];
		$this->db->insert('transaksi_detail_pengembalian', $detail);
	}

	public function edit($post)
	{
		$header = [
			'tanggal_kembali' => $post['tgl'],
		];
		$this->db->where('no_trans', $post['no_trans']);
		$this->db->update('transaksi_header', $header);
		$detail = [
			'qty' => $post['jml'],
			'keterangan' => $post['ket'],
		];
		$this->db->where('no_trans', $post['no_trans']);
		$this->db->update('transaksi_detail_pengembalian', $detail);
	}

	public function del($id)
	{
		$this->db->where('no_trans', $id);
		$this->db->delete('transaksi_detail_pengembalian');
	}
}
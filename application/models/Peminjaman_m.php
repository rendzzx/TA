<?php defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('v_transaksi_pinjam');
		if($id != null) {
			$this->db->where('no_trans', $id);
		}
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

	public function add($post)
	{
		$id = makeID('no_trans','transaksi_header','TRS');
		$header = [
			'no_trans' => $id,
			'karyawan_id' => $post['karyawan'],
			'tanggal_pinjam' => $post['tgl'],
		];
		$detail = [
			'no_trans' => $id,
			'alat_id' => $post['tools'],
			'qty' => $post['jml'],
			'keterangan' => $post['ket'],
		];
		$this->db->insert('transaksi_header', $header);
		$this->db->insert('transaksi_detail_peminjaman', $detail);
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
		$this->db->where('no_trans', $post['id']);
		$this->db->update('peminjaman', $params);
	}

	public function del($id)
	{
		$this->db->where('no_trans', $id);
		$this->db->delete('peminjaman');
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('tools');
		if($id != null) {
			$this->db->where('alat_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'nama' => $post['alat_name'],
			'harga' => $post['price'],
			'keterangan' => empty($post['keterangan']) ? null : $post['keterangan'],
			'tgl_beli' => $post['beli'],
			'stok' => $post['stok'],
		];
		$this->db->insert('tools', $params);
	}

	public function edit($post)
	{
		$params = [
			'nama' => $post['alat_name'],
			'harga' => $post['price'],
			'keterangan' => $post['keterangan'],
			'tgl_beli' => $post['beli'],
			'stok' => $post['stok'],
		];
		$this->db->where('alat_id', $post['id']);
		$this->db->update('tools', $params);
	}

	public function del($id){
		$this->db->from('transaksi_detail_peminjaman');
		$this->db->where('alat_id', $id);
		$trans = $this->db->get();
		$this->db->from('transaksi_detail_pengembalian');
		$this->db->where('alat_id', $id);
		$trans2 = $this->db->get();
		if (count($trans->result()) > 0 || count($trans2->result()) > 0 ) {
			$this->session->set_flashdata('error','gagal menghapus tools <br> <small> tools sedang di gunakan dalam transaksi</small>');
			redirect('Tools');
		}

		$this->db->where('alat_id', $id);
		$this->db->delete('tools');
	}
}
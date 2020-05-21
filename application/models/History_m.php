<?php defined('BASEPATH') OR exit('No direct script access allowed');

class history_m extends CI_Model {
	public function get($kar = null, $tools= null){
		$this->db->from('v_transaksi_kembali');
		if($kar != null) {
			$this->db->where('karyawan_id', $kar);
		}
		if($tools != null) {
			$this->db->where('alat_id', $tools);
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_kar(){
		$this->db->from('karyawan');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_tools(){
		$this->db->from('tools');
		$query = $this->db->get();
		return $query->result();
	}

	public function del($id){
		$this->db->where('no_trans', $id);
		$this->db->delete('transaksi_history');

		$this->db->where('no_trans', $id);
		$this->db->delete('transaksi_detail_peminjaman');

		$this->db->where('no_trans', $id);
		$this->db->delete('transaksi_detail_pengembalian');

		$this->db->where('no_trans', $id);
		$this->db->delete('transaksi_header');
	}
}
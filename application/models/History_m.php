<?php defined('BASEPATH') OR exit('No direct script access allowed');

class history_m extends CI_Model {

	public function get($id = null)
	{
		$this->db->from('v_transaksi_kembali');
		if($id != null) {
			$this->db->where('no_trans', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function del($id)
	{
		$this->db->where('no_trans', $id);
		$this->db->delete('transaksi_detail_pengembalian');
	}
}
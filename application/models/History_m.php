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

	public function getbynotrans($notrans){
		$this->db->from('v_transaksi_kembali');
		$this->db->where('no_trans', $notrans);
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
}
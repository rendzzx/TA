<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pengembalian_m extends CI_Model {

	public function get_kembali($id){
		$this->db->from('v_transaksi_pinjam');
		$this->db->where('no_trans', $id);
		$query = $this->db->get();
		return $query;
	}

	public function get_process(){
		$this->db->from('v_transaksi_process');
		$query = $this->db->get();
		return $query;
	}

	public function kembali($post){
		$no_trans = $post['no_trans'];

		$dataheader = array(
			'tanggal_kembali' 	=> $post['tgl'],
		);
		$this->db->where('no_trans', $no_trans);
		$this->db->update('transaksi_header', $dataheader);

		$detail = array();
		for ($i = 0; $i < count($post['tools']); $i++) {
			$detail = array(
				'no_trans' 		=> $no_trans,
				'alat_id' 		=> $post['tools'][$i],
				'qty' 			=> $post['jml'][$i],
				'keterangan' 	=> $post['ket'],
			);
			$this->db->insert('transaksi_detail_pengembalian', $detail);
		}

		$this->db->from('v_transaksi_pinjam');
		$this->db->where('no_trans', $no_trans);
		$query = $this->db->get()->result();

		foreach ($query as $val) {
			$data = array(
				'no_trans' 			=> $no_trans,
				'karyawan_id' 		=> $val->karyawan_id,
				'tanggal_pinjam' 	=> $val->tanggal_pinjam,
				'tanggal_kembali' 	=> $post['tgl'],
				'alat_id' 			=> $val->alat_id,
				'qty' 				=> $val->qty,
				'keterangan' 		=> $post['ket'],
				'foto_pinjam'		=> $val->foto_pinjam,
			);
			$this->db->insert('transaksi_history', $data);
		}
	}
}
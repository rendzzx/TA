<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pengembalian_m extends CI_Model {

	public function get_kembali($id)
	{
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
		$this->db->from('v_transaksi_pinjam');
		$this->db->where('no_trans', $no_trans);
		$query = $this->db->get()->result();

		$this->db->from('tools');
		$this->db->where('alat_id',$post['tools']);
		$stok = $this->db->get()->result();

		$kembali = (int)$stok[0]->stok + $post['jml'];
		$dataupdate = [
			'stok' => $kembali
		];
		$this->db->where('alat_id', $post['tools']);
		$this->db->update('tools', $dataupdate);

		$datakembali = array(
			'no_trans' => $no_trans,
			'alat_id' => $post['tools'],
			'qty' => $post['jml'],
			'keterangan' => $post['ket']
		);
		$this->db->insert('transaksi_detail_pengembalian', $datakembali);

		$dataheader = array(
			'tanggal_kembali' => $post['tgl'],
		);
		$this->db->where('no_trans', $no_trans);
		$this->db->update('transaksi_header', $dataheader);

		$data = array(
			'no_trans' 			=> $no_trans,
			'karyawan_id' 		=> $query[0]->karyawan_id,
			'tanggal_pinjam' 	=> $query[0]->tanggal_pinjam,
			'tanggal_kembali' 	=> $post['tgl'],
			'alat_id' 			=> $query[0]->alat_id,
			'qty' 				=> $query[0]->qty,
			'keterangan' 		=> $post['ket']
		);
		$this->db->insert('transaksi_history', $data);
	}
}
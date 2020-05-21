<?php defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman_m extends CI_Model {

	public function get($id = null){
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

	public function cek_stok($alat_id,$qty){
		$this->db->from('tools');
		$this->db->where('alat_id',$alat_id);
		$stok = $this->db->get()->result();
		if ($qty > $stok[0]->stok) {
			return false;
		}
		else{
			return true;
		}
	}

	public function kembalikan_stok($alat_id, $qty){
		$this->db->from('tools');
		$this->db->where('alat_id',$alat_id);
		$stok = $this->db->get()->result();

		$kembali = (int)$stok[0]->stok + $qty;
		$dataupdate = [
			'stok' => $kembali
		];
		$this->db->where('alat_id', $alat_id);
		$this->db->update('tools', $dataupdate);
	}

	public function add($post){
		$id = makeID('no_trans','transaksi_header','TRS');
		$updir = "./file/$id";

		$extension = pathinfo($_FILES['foto']['name']);
		$extension = $extension['extension'];

		$upfile = $updir ."/pinjam.".$extension;

		if(!is_dir("$updir")){
        	mkdir("$updir", 0777, true);
        }

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $upfile)) {
        	echo "File is valid, and was successfully uploaded.\n";
	    }
	    else {
	        echo "Upload failed";
	    }

		$header = [
			'no_trans' 			=> $id,
			'karyawan_id' 		=> $post['karyawan'],
			'tanggal_pinjam' 	=> $post['tgl'],
			'foto_pinjam' 		=> $upfile
		];
		$this->db->insert('transaksi_header', $header);

		$detail = array();
		for ($i = 0; $i < count($post['tools']); $i++) {
			$detail = array(
				'no_trans' 		=> $id,
				'alat_id' 		=> $post['tools'][$i],
				'qty' 			=> $post['jml'][$i],
				'keterangan' 	=> $post['ket'],
			);
			$this->db->insert('transaksi_detail_peminjaman', $detail);
		}
	}

	public function edit($post){
		$detail = array();
		for ($i = 0; $i < count($post['tools']); $i++) {
			$detail = array(
				'qty' => $post['jml'][$i]
			);
			$this->db->where('no_trans', $post['no_trans']);
			$this->db->where('alat_id', $post['tools'][$i]);
			$this->db->update('transaksi_detail_peminjaman', $detail);

			$this->db->from('tools');
			$this->db->where('alat_id', $post['tools'][$i]);
			$stok = $this->db->get()->result();

			$ambil = (int)$stok[0]->stok - $post['jml'][$i];
			$dataupdate = [
				'stok' => $ambil
			];
			$this->db->where('alat_id', $post['tools'][$i]);
			$this->db->update('tools', $dataupdate);
		}
	}
}
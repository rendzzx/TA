<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		chek_not_login();
		$tools = $this->db->query('SELECT COUNT(*) AS tools FROM tools')->result();
		$karyawan = $this->db->query('SELECT COUNT(*) AS karyawan FROM karyawan')->result();
		$user = $this->db->query('SELECT COUNT(*) AS user FROM user')->result();
		$pinjam = $this->db->query('SELECT COUNT(*) AS pinjam FROM transaksi_detail_peminjaman')->result();
		$kembali = $this->db->query('SELECT COUNT(*) AS kembali FROM transaksi_detail_pengembalian')->result();

		$data = array(
			'tools' 	=> $tools,
			'karyawan' 	=> $karyawan,
			'user' 		=> $user,
			'pinjam' 	=> $pinjam,
			'kembali' 	=> $kembali,
		);
		$this->template->load('template', 'dashboard', $data);
	}
}


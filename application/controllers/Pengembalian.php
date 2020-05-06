<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pengembalian extends CI_Controller {

		function __construct()
	{
		parent::__construct();
		chek_not_login();
		$this->load->model('pengembalian_m');
	}

	public function index()
	{
		$data['process'] = $this->pengembalian_m->get_process();

		$this->template->load('template', 'pengembalian/pengembalian_data', $data);
	}

	public function kembali($id){
		$query = $this->pengembalian_m->get_kembali($id);
		if($query->num_rows() > 0) {
			$pengembalian = $query->row();
			$data = array(
			'page' => 'kembali',
			'row' => $pengembalian
		);
			$this->template->load('template', 'pengembalian/pengembalian_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('pengembalian')."';</script>";
		}
	}

	public function proses(){
		$post = $this->input->post(null, TRUE);

		if (isset($_POST['kembali'])) {
			$kembali = $this->pengembalian_m->kembali($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		redirect('pengembalian');
	}
}



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
		$data['row'] = $this->pengembalian_m->get();
		$data['process'] = $this->pengembalian_m->get_process();

		$this->template->load('template', 'pengembalian/pengembalian_data', $data);
	}

	public function add()
	{
		$pengembalian = new stdClass();
		$pengembalian->pengembalian_id = null;
		$pengembalian->no_trans = null;
		$pengembalian->nik = null;
		$pengembalian->kd_alat = null;
		$pengembalian->jumlah = null;
		$pengembalian->tgl_pinjam = null;
		$pengembalian->keterangan = null;
		$data = array(
			'page' => 'add',
			'row' => $pengembalian
		);
		$this->template->load('template', 'pengembalian/pengembalian_form', $data);
	}

	public function edit($id)
	{
		$query = $this->pengembalian_m->get($id);
		if($query->num_rows() > 0) {
			$pengembalian = $query->row();
			$data = array(
			'page' => 'edit',
			'row' => $pengembalian
		);
			$this->template->load('template', 'pengembalian/pengembalian_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('pengembalian')."';</script>";
		}
	}


	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->pengembalian_m->add($post);

		}else if(isset($_POST['edit'])) {
			$this->pengembalian_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data Berhasil di Simpan');</script>";
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		// echo "<script>window.location='".site_url('pengembalian')."';</script>";
			redirect('pengembalian');
	}

	public function del($id)
	{
		$this->pengembalian_m->del($id);
			if($this->db->affected_rows() > 0) {
				// echo "<script>alert('Data Berhasil di Hapus');</script>";
				$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
			}
			// echo "<script>window.location='".site_url('pengembalian')."';</script>";
			redirect('pengembalian');
	}	
}



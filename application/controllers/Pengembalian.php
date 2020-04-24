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

	public function edit($id)
	{
		$combo_karyawan = $this->pengembalian_m->combo_karyawan();
		$combo_tools = $this->pengembalian_m->combo_tools();

		$query = $this->pengembalian_m->get($id);
		if($query->num_rows() > 0) {
			$pengembalian = $query->row();
			$data = array(
			'page' => 'edit',
			'row' => $pengembalian,
			'combo_kar' => $combo_karyawan,
			'combo_tools' => $combo_tools,
		);
			$this->template->load('template', 'pengembalian/pengembalian_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('pengembalian')."';</script>";
		}
	}

	public function kembali($id)
	{
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


	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['kembali'])) {
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



<?php defined('BASEPATH') OR exit('No direct script access allowed');

class karyawan extends CI_Controller {

	function __construct(){
		parent::__construct();
		chek_not_login();
		$this->load->model('karyawan_m');
	}

	public function index()
	{
		$data['row'] = $this->karyawan_m->get();
		$this->template->load('template', 'karyawan/karyawan_data', $data);
	}

	public function add()
	{
		$karyawan = new stdClass();
		$karyawan->karyawan_id = null;
		$karyawan->nik = null;
		$karyawan->nama = null;
		$karyawan->gender = null;
		$karyawan->phone = null;
		$karyawan->alamat = null;
		$karyawan->divisi = null;
		$karyawan->status = null;
		$data = array(
			'page' => 'add',
			'row' => $karyawan
		);
		$this->template->load('template', 'karyawan/karyawan_form', $data);
	}

	public function edit($id)
	{
		$query = $this->karyawan_m->get($id);
		if($query->num_rows() > 0) {
			$karyawan = $query->row();
			$data = array(
			'page' => 'edit',
			'row' => $karyawan
		);
			$this->template->load('template', 'karyawan/karyawan_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('karyawan')."';</script>";
		}
	}


	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->karyawan_m->add($post);

		}else if(isset($_POST['edit'])) {
			$this->karyawan_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
			// echo "<script>alert('Data Berhasil di Simpan');</script>";
		}
		// echo "<script>window.location='".site_url('karyawan')."';</script>";
		redirect('karyawan');
	}

	public function del($id)
	{
		$this->karyawan_m->del($id);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
			}
			// echo "<script>window.location='".site_url('karyawan')."';</script>";
			redirect('karyawan');
	}
}



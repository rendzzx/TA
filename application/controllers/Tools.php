<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

		function __construct()
	{
		parent::__construct();
		chek_not_login();
		$this->load->model('tools_m');
	}

	public function index()
	{
		$data['row'] = $this->tools_m->get();
		$this->template->load('template', 'tools/tools_data', $data);
	}

	public function add()
	{
		$tools = new stdClass();
		$tools->alat_id = null;
		$tools->nama = null;
		$tools->harga = null;
		$tools->keterangan = null;
		$tools->tgl_beli = null;
		$tools->stok = null;
		$data = array(
			'page' => 'add',
			'row' => $tools
		);
		$this->template->load('template', 'tools/tools_form', $data);
	}

	public function edit($id)
	{
		$query = $this->tools_m->get($id);
		if($query->num_rows() > 0) {
			$tools = $query->row();
			$data = array(
			'page' => 'edit',
			'row' => $tools
		);
			$this->template->load('template', 'tools/tools_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('tools')."';</script>";
		}
	}


	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->tools_m->add($post);

		}else if(isset($_POST['edit'])) {
			$this->tools_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data Berhasil di Simpan');</script>";
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		// echo "<script>window.location='".site_url('tools')."';</script>";
			redirect('tools');
	}

	public function del($id)
	{
		$this->tools_m->del($id);
			if($this->db->affected_rows() > 0) {
				// echo "<script>alert('Data Berhasil di Hapus');</script>";
				$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
			}
			// echo "<script>window.location='".site_url('tools')."';</script>";
			redirect('tools');
	}	
}



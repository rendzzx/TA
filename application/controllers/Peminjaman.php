<?php defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman extends CI_Controller {

		function __construct()
	{
		parent::__construct();
		chek_not_login();
		$this->load->model('peminjaman_m');
	}

	public function index()
	{
		$data['row'] = $this->peminjaman_m->get();
		$this->template->load('template', 'peminjaman/peminjaman_data', $data);
	}

	public function add()
	{
		$peminjaman = new stdClass();
		$peminjaman->no_trans = null;
		$peminjaman->karyawan_id = null;
		$peminjaman->alat_id = null;
		$peminjaman->qty = null;
		$peminjaman->tanggal_pinjam = null;
		$peminjaman->keterangan = null;

		$combo_karyawan = $this->peminjaman_m->combo_karyawan();
		$combo_tools = $this->peminjaman_m->combo_tools();

		$data = array(
			'page' => 'add',
			'row' => $peminjaman,
			'combo_kar' => $combo_karyawan,
			'combo_tools' => $combo_tools,
		);
		$this->template->load('template', 'peminjaman/peminjaman_form', $data);
	}

	public function edit($id)
	{
		$query = $this->peminjaman_m->get($id);
		if($query->num_rows() > 0) {
			$peminjaman = $query->row();

			$combo_karyawan = $this->peminjaman_m->combo_karyawan();
			$combo_tools = $this->peminjaman_m->combo_tools();

			$data = array(
			'page' => 'edit',
			'row' => $peminjaman,
			'combo_kar' => $combo_karyawan,
			'combo_tools' => $combo_tools,
		);
			$this->template->load('template', 'peminjaman/peminjaman_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('peminjaman')."';</script>";
		}
	}


	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->peminjaman_m->add($post);

		}else if(isset($_POST['edit'])) {
			$this->peminjaman_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			// echo "<script>alert('Data Berhasil di Simpan');</script>";
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		// echo "<script>window.location='".site_url('peminjaman')."';</script>";
			redirect('peminjaman');
	}

	public function del($id)
	{
		$this->peminjaman_m->del($id);
			if($this->db->affected_rows() > 0) {
				// echo "<script>alert('Data Berhasil di Hapus');</script>";
				$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
			}
			// echo "<script>window.location='".site_url('peminjaman')."';</script>";
			redirect('peminjaman');
	}	
}



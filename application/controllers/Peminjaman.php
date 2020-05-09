<?php defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman extends CI_Controller {

	function __construct(){
		parent::__construct();
		chek_not_login();
		$this->load->model('peminjaman_m');
	}

	public function index(){
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

	public function proses(){
		$post = $this->input->post(null, TRUE);

		$alat_id = $this->input->post('tools');
		$qty = $this->input->post('jml');

		if ($this->peminjaman_m->cek_stok($alat_id,$qty)) {
			if(isset($_POST['add'])) {
				$this->peminjaman_m->add($post);

			}else if(isset($_POST['edit'])) {
				//kembalikan stok 
				$query = $this->peminjaman_m->get($id)->result();
				$alat_id = $query[0]->alat_id;
				$qty = $query[0]->qty;
				$kembali_stok = $this->peminjaman_m->kembalikan_stok($alat_id, $qty);
				$this->peminjaman_m->edit($post);
			}

			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
			}
			redirect('peminjaman');
		}
		else{
			$this->session->set_flashdata('error', 'Stok tidak cukup');
			redirect('peminjaman/add');
		}
	}

	public function del($id){
		$query = $this->peminjaman_m->get($id)->result();
		$alat_id = $query[0]->alat_id;
		$qty = $query[0]->qty;
		$kembali_stok = $this->peminjaman_m->kembalikan_stok($alat_id, $qty);
		
		$this->peminjaman_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
		}
		redirect('peminjaman');
	}	
}



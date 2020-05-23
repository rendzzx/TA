<?php defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman extends CI_Controller {

	function __construct(){
		parent::__construct();
		// chek_not_login();
		$this->load->model('peminjaman_m');
	}

	public function index(){
		$data['row'] = $this->peminjaman_m->get();
		$data['tools'] = $this->peminjaman_m->combo_tools();

		$this->template->load('template', 'peminjaman/peminjaman_data', $data);
	}

	public function add(){
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
			'tools' => $combo_tools,
		);
		$this->template->load('template', 'peminjaman/peminjaman_form', $data);
	}

	public function edit($id){
		$query = $this->peminjaman_m->get($id);
		if($query->num_rows() > 0) {
			$peminjaman = $query->row();
			$pinjam = $query->result();

			foreach ($pinjam as $val) {
				$alat_id[] = $val->alat_id;
				$nama_tools[] = $val->nama_tools;
				$qty[] = $val->qty;
			}

			$combo_karyawan = $this->peminjaman_m->combo_karyawan();
			$combo_tools = $this->peminjaman_m->combo_tools();

			$data = array(
				'page' => 'edit',
				'row' => $peminjaman,
				'alat_id' => $alat_id,
				'nama_tools' => $nama_tools,
				'qty' => $qty,
				'combo_kar' => $combo_karyawan,
				'tools' => $combo_tools,
			);
			$this->template->load('template', 'peminjaman/peminjaman_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');</script>";
			echo "<script>window.location='".site_url('peminjaman')."';</script>";
		}
	}

	public function proses(){
		$post = $this->input->post(null, TRUE);
		$id = $this->input->post('no_trans');
		$alat_id = $this->input->post('tools');
		$qty = $this->input->post('jml');

		for ($i = 0; $i < count($alat_id); $i++) {
			$cek = $this->peminjaman_m->cek_stok($alat_id[$i], $qty[$i]);
			if (!$cek) {
				$this->session->set_flashdata('error', 'Stok alat dengan id '.$alat_id[$i].' tidak cukup');
				redirect('peminjaman/add');
			}
		}

		$id = makeID('no_trans','transaksi_header','TRS');
		$upfile = "./file/pinjam-$id.jpg";

		move_uploaded_file($_FILES['webcam']['tmp_name'], $upfile);

		if (!isset($_POST['tools'])) {
			$this->session->set_flashdata('success', 'silahkan pilih tools');
			redirect('peminjaman/add');
		}

		if(isset($_POST['add'])) {
			$this->peminjaman_m->add($post, $upfile);
		}
		else if(isset($_POST['edit'])) {
			//kembalikan stok 
			$query = $this->peminjaman_m->get($id)->result();
			foreach ($query as $val) {
				$kembali_stok = $this->peminjaman_m->kembalikan_stok($val->alat_id, $val->qty);
			}
			$this->peminjaman_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		redirect('peminjaman');
	}
}



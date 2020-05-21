<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {
	function __construct(){
		parent::__construct();
		chek_not_login();
		check_admin();
		$this->load->model('history_m');
    $this->load->library('Pdf');
	}

	public function index(){
		$data['karyawan'] = $this->history_m->get_kar();
		$data['tools'] = $this->history_m->get_tools();

		if ($_POST) {
			$kar = $this->input->post('karyawan');
			$tools = $this->input->post('tools');
			$data['row'] = $this->history_m->get($kar, $tools);
		}
		else{
			$data['row'] = $this->history_m->get();
		}

		$this->template->load('template', 'history/history_data', $data);
	}

	public function del($id){
		$this->history_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Dihapus');
		}
		redirect('history');
	}

	public function printone($id){
		$data = $this->history_m->get($id);
		if ($data) {
			$pdf = new FPDF('P','mm','A4');
	    $pdf->AddPage();

	     // mencetak string 
	    $pdf->SetFont('Arial','B',20);
	    $pdf->Cell(0,10,'LAPORAN PEMINJAMAN TOOLS',0,1,'C');

	    $pdf->SetFont('Arial','B',15);
	    $pdf->Cell(0,8,'Auto 2000 Cabang Kelapa Gading',0,1,'C');

	    $pdf->Line(20, 30, 210-20, 30);

	    $pdf->Cell(0,10,'',0,1,'C');
	    
	    $pdf->SetFont('Arial','B',10);
	    $pdf->Cell(30,8,'NO Transaksi',1,0);
	    $pdf->Cell(30,8,'Karyawan',1,0);
	    $pdf->Cell(30,8,'Alat',1,0);
	    $pdf->Cell(15,8,'Jumlah',1,0, 'C');
	    $pdf->Cell(25,8,'TGL Pinjam',1,0, 'C');
	    $pdf->Cell(25,8,'TGL Kembali',1,0);
	    $pdf->Cell(35,8,'Keterangan',1,1);

	    $pdf->SetFont('Arial','',10);
	    // var_dump($data);die;
	    foreach ($data->result() as $key => $data){
	        $pdf->Cell(30,8,$data->no_trans,1,0);
	        $pdf->Cell(30,8,$data->nama_karyawan,1,0);
	        $pdf->Cell(30,8,$data->nama_tools,1,0);
	        $pdf->Cell(15,8,$data->qty,1,0, 'C');
	        $pdf->Cell(25,8,$data->tanggal_pinjam,1,0, 'C');
	        $pdf->Cell(25,8,$data->tanggal_kembali,1,0, 'C');  
	        $pdf->Cell(35,8,$data->keterangan,1,1);  
	    }
	    $pdf->Output("laporan-".$data->no_trans.".pdf", "I");
	  }
	}

	public function printall(){
		$data = $this->history_m->get();
		if ($data) {
			$pdf = new FPDF('P','mm','A4');
	    $pdf->AddPage();
	    
	    // mencetak string 
	    $pdf->SetFont('Arial','B',20);
	    $pdf->Cell(0,10,'LAPORAN PEMINJAMAN TOOLS',0,1,'C');

	    $pdf->SetFont('Arial','B',15);
	    $pdf->Cell(0,8,'Auto 2000 Cabang Kelapa Gading',0,1,'C');

	    $pdf->Line(20, 30, 210-20, 30);

	    $pdf->Cell(0,10,'',0,1,'C');
	    
	    $pdf->SetFont('Arial','B',10);
	    $pdf->Cell(30,8,'NO Transaksi',1,0);
	    $pdf->Cell(30,8,'Karyawan',1,0);
	    $pdf->Cell(30,8,'Alat',1,0);
	    $pdf->Cell(15,8,'Jumlah',1,0, 'C');
	    $pdf->Cell(25,8,'TGL Pinjam',1,0, 'C');
	    $pdf->Cell(25,8,'TGL Kembali',1,0);
	    $pdf->Cell(35,8,'Keterangan',1,1);

	    $pdf->SetFont('Arial','',10);
	    // var_dump($data);die;
	    foreach ($data->result() as $key => $data){
	        $pdf->Cell(30,8,$data->no_trans,1,0);
	        $pdf->Cell(30,8,$data->nama_karyawan,1,0);
	        $pdf->Cell(30,8,$data->nama_tools,1,0);
	        $pdf->Cell(15,8,$data->qty,1,0, 'C');
	        $pdf->Cell(25,8,$data->tanggal_pinjam,1,0, 'C');
	        $pdf->Cell(25,8,$data->tanggal_kembali,1,0, 'C');  
	        $pdf->Cell(35,8,$data->keterangan,1,1);  
	    }
	    $pdf->Output("laporan-tools.pdf", "I");
	  }
	}

	public function exportexcel(){
		$data['row'] = $this->history_m->get();

		$this->load->view('history/export_excel', $data);
	}
}

/* End of file History.php */
/* Location: ./application/controllers/History.php */
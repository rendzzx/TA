<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pdf {
		
	public function __construct() {
		
		require_once dirname(__FILE__) . '/fpdf/fpdf.php';
		
		$pdf = new FPDF();
		$pdf->AddPage();
		
		$CI =& get_instance();
		$CI->fpdf = $pdf;
		
	}
	
}
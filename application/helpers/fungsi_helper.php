<?php
	
function chek_already_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('userid');
	if($user_session) {
		redirect('dashboard');
	}
}

function chek_not_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('userid');
	if(!$user_session) {
		redirect('auth/login');
	}
}

function check_admin() {
	$ci =& get_instance();
	$ci->load->library('fungsi');
	if($ci->fungsi->user_login()->level != 1){
		redirect('dashboard');
	}
}

function makeID($fields="", $table="", $inisial=""){
		$CI =& get_instance();
		$query = $CI->db->query("SELECT MAX($fields) as max from ".$table);
		$result = current($query->result());

		//set tanggal
		$datenow = date("ymd");
		
		$number = 0;
		$imax = 6;	
		$tmp = "";
		if ($result->max !='') {
			$tgl = substr($result->max,3);
			$tgl = substr($tgl,0,-4);

			if($tgl != $datenow){
				$number = 0;
			}
			else{
				$number = substr($result->max, -3);
			}
		}

		$number++;
		$number = strval($number);
		for ($i=0; $i <=($imax-strlen($inisial)-strlen($number)) ; $i++) { 
			$tmp = $tmp."0";
		}
		
		return $inisial.$datenow.$tmp.$number;
	}

?>
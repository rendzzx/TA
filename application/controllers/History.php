<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		chek_not_login();
		$this->load->model('history_m');
	}

	public function index()
	{
		$data['row'] = $this->history_m->get();

		$this->template->load('template', 'history/history_data', $data);
	}

}

/* End of file History.php */
/* Location: ./application/controllers/History.php */
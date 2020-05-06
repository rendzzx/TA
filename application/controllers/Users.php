<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		chek_not_login();
		check_admin();
		$this->load->model('user');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->user->get();
		$this->template->load('template', 'users/user_data', $data);
	}

	public function profile(){
		$userid = $this->session->userdata('userid');
		$data['row'] = $this->user->get($userid)->result();
		$this->template->load('template', 'users/profile', $data);
	}

	public function add()
	{
		// $this->load->library('form_validation');

		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]', 
			array('matches' => '%s tidak sesuai dengan password')
		);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong');
		$this->form_validation->set_message('min_length', '{field} Minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah terpakai, silakan ganti!');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'users/user_add');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".site_url('users')."';</script>";
		}	
	}

		public function edit($id)
	{

		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');

		if($this->input->post('password')){
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password','matches[password]', 
				array('matches' => '%s tidak sesuai dengan password')
			);
		}
		if($this->input->post('passconf')){
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password','matches[password]', 
				array('matches' => '%s tidak sesuai dengan password')
			);
		}
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong');
		$this->form_validation->set_message('min_length', '{field} Minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah terpakai, silakan ganti!');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'users/user_edit', $data);
			} else {
				echo "<script>alert('Data Tidak Di Temukan');";
				echo "window.location='".site_url('users')."';</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".site_url('users')."';</script>";
		}	
	}

	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if($query->num_rows() > 0 ){
			$this->form_validation->set_message('username_check', '{field} Sudah terpakai silahkan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
		
	}

	public function del()
	{
		$id = $this->input->post('user_id');
		$this->user->del($id);

		if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil di Hapus');</script>";
			}
			echo "<script>window.location='".site_url('users')."';</script>";
	}

}


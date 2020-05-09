<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('user');
		$this->load->library('form_validation');
	}

	public function login(){
		chek_already_login();
		$this->load->view('login');

	}

	public function register(){
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]', 
			array('matches' => '%s tidak sesuai dengan password')
		);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		$this->form_validation->set_message('required', '%s masih kosong');
		$this->form_validation->set_message('min_length', '{field} Minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah terpakai, silakan ganti!');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
		} 
		else {
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'alamat' => $this->input->post('alamat'),
				'level' => 2
			);
			$this->user->add($data);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Berhasil Register. sliakan login');</script>";
			}
			echo "<script>window.location='".site_url('Auth/login')."';</script>";
		}	
	}

	public function proses()
	{	
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$query = $this->user->login($post);
			if($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'userid'=> $row->user_id,
					'level' => $row->level

				);
				$this->session->set_userdata($params);
				echo "<script>
					alert('Selamat Login Berhasil');
					window.location='".site_url('dashboard')."';
				</script>";

			} else{
				echo "<script>
					alert('Login Gagal! Username atau Password Salah');
					window.location='".site_url('auth/login')."';
				</script>";
			}
		}
	}

	public function logout()
	{
		$params = array('userid', 'level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}

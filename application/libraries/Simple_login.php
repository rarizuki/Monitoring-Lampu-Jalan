<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->load->model('M_login');
	}

	//fungsi login

	public function login($username,$password)
	{
		$check=$this->CI->m_login->login($username,$password);
		//jika ada data login maka session login dibuat

		if ($check) {
			$id       = $check->id;
			$nama     = $check->nama;
			$username = $check->username;
			//buat session
			$this->CI->session->set_userdata('id',$id);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			// redirect ke halaman admin

			redirect(base_url('admin'),'refresh');
			# code...
		}else{
			$this->CI->session->set_flashdata('warning', 'Username Dan Password Tidak Ditemukan');
			redirect(base_url('login'),'refresh');
		}
	}

	public function cek_login()
	{
		if ($this->CI->session->userdata('username')=="") {
			$this->CI->session->set_flashdata('warning','Anda Belum Login');
			redirect(base_url('login'),'refresh');
			# code...
		}
	}

	public function logout()
	{
		//membuang semua session yg telah dibuat tadi saat login berhasil
		$this->CI->session->unset_userdata('id');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		// setelah session di unset maka redirec ke halaman login
		$this->CI->session->set_flashdata('sukses','Anda Berhasil Logout');
			redirect(base_url('login'),'refresh');
	}	

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */

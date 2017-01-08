<?php

class Login extends MY_Controller
{
	public function index()
	{
		if($this->session->userdata('user_id'))
			return redirect('admin/dashboard');
		$this->load->helper('form');
		$this->load->view('public/admin_login');
	}

	public function admin_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','User Name','required|alpha|trim');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$pass = $this->input->post('password');
			$this->load->model('loginmodel');
			$loginid = $this->loginmodel->login_valid($username,$pass);
			if ($loginid)
			{
				$this->load->library('session');
				$this->session->set_userdata('user_id',$loginid);
				return redirect('admin/dashboard');
				//Valid
			}
			else
			{
				$this->session->set_flashdata('login_failed','Invalid Username or Password');
				return redirect('login');
				//wrong
			}
		}
		else
		{
			$this->load->view('public/admin_login');
			//echo validation_errors();
		}
	}

	public function logout()
	{

		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
}
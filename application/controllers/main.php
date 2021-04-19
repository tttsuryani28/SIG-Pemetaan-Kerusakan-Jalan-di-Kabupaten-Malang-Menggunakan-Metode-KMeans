<?php
defined('BASEPATH') or exit('No direct script access allowed');

class main extends CI_Controller
{
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->helper('url');

	// }

	public function index()
	{
		$this->load->view('v_dashboard');
	}

	function login()
	{
		$this->load->view('admin/login');
	}

	function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run())
		{
			//true
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//model function
			$this->load->model('main_model');
			if($this->main_model->can_login($username, $password))
			{
				$session_data = array(
					'login' => 'true',
					'username' => $username,
				);
				$this->session->set_userdata($session_data);
				redirect(base_url('main/enter'));
			}
			else
			{
				$this->session->set_flashdata('error', 'Invalid username and password');
				redirect(base_url('main/login'));
			}
		}
		else
		{
			//false
			$this->login();
		}
	}

	function enter()
	{
		if($this->session->userdata('username') != '')
		{
			redirect(base_url('c_admin/dashboard_admin'));
		}
		else
		{
			redirect(base_url('main/login'));	
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('dashboard/home'));
	}
}

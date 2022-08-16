<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthenticationController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("frontendModels/CommonModel");
	}

	//Welcome Page Load Here
	public function index()
	{
		$css = "";
		$js = "";
		$data = [
			'css' => $css,
			'js' => $js,
			'title' => 'College Management System',
			'body' => 'frontendViews/authentication/welcome',
			'getRegisterInfo' => $this->CommonModel->checkAdminExist(),
		];
		$this->load->view("frontendViews/layouts/baseLayout", $data);
	}
	
	//Admin Register Page Load Here
	public function register()
	{
		$table = "tbl_roles";
		$css ="";
		$js ="";
		$data = [
			'css' => $css,
			'js' => $js,
			'title' => 'College Management System',
			'body' => 'frontendViews/authentication/register',
			'getRoleData' => $this->CommonModel->getRoleData($table),
		];
		$this->load->view("frontendViews/layouts/baseLayout", $data);
	}

	//Sign Up Here
	public function signup()
	{
		$this->form_validation->set_rules('name', 'user name', 'required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$this->form_validation->set_rules('role', 'role', 'required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('con_password', 'confirm password', 'trim|required|matches[password]|min_length[5]');

		if($this->form_validation->run()){
			$table = 'tbl_users';
			$data = $this->input->post();
			$data['password'] = sha1($this->input->post('password'));
			$data['con_password'] = sha1($this->input->post('con_password'));
			$result = $this->CommonModel->dataInsert($table, $data);
			if($result == true){
				$this->session->set_flashdata('success', "Admin Register Successfully.");
				$this->register();
			} else if($result == false) {
				$this->session->set_flashdata('error', "Data Register Failed!.");
				$this->register();
			}
		} else{
			$this->register();
		}
	}

	//Admin Login Page Load Here
	public function login()
	{
		$css = "";
		$js = "";
		$data = [
			'css' => $css,
			'js' => $js,
			'title' => 'College Management System',
			'body' => 'frontendViews/authentication/login',
		];
		$this->load->view("frontendViews/layouts/baseLayout", $data);
	}

	//Sign-in Here 
	public function signin()
	{
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run()) {
			$table = 'tbl_users';
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$data = $this->CommonModel->adminCheck($table, $email, $password);
			if($data == true){
				$sessionData = [
					'user_id' => $data->user_id,
					'name' => $data->name,
					'email' => $data->email,
					'role' => $data->role,
				];
				$this->session->set_userdata($sessionData);
				return redirect('dashboard');
			} else{
				$this->session->set_flashdata('loginFailed', "Please Enter Your Valid Email & Password");
				$this->login();
			}
		} else {
			$this->login();
		}
	}
}

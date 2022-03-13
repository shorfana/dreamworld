<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model("Login_model");
	}

	public function index()
	{
		$this->load->view('back/login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	// otentikasi login
	public function auth()
	{
		$usernameEmail = $this->input->post('usernameEmail');
		$password = SHA1($this->input->post('password'));
		$userAuth = $this->Login_model->userAuth($usernameEmail, $password);
		$userRow = $userAuth->num_rows();
		if ($userRow > 0) {
			$userData = $userAuth->row_array();
			// var_dump($userData);die;
			$this->session->set_userdata('DW-login', TRUE);
			$this->session->set_userdata('DW-userId', $userData['user_id']);
			$this->session->set_userdata('DW-nama', $userData['username']);
			$this->session->set_userdata('DW-role', $userData['role']);
			redirect(base_url('simulasiBiaya'));
		} else {
			$this->session->set_flashdata('FailedLogin', 'Wrong Email / Password');
			redirect(base_url('login'));
		}
	}

	public function forgotPassword()
	{
		$this->load->view('back/forgotPassword');
	}

	public function sendMail()
	{
		$email = $this->input->post('email');
		$clean = $this->security->xss_clean($email);
		$userInfo = $this->Login_model->getByEmail($clean);

		if (!$userInfo) {
			$this->session->set_flashdata('EmailNotRegistered', 'warning');
			redirect(base_url().'/login/forgotPassword', 'refresh');
		}
		$token = $this->Login_model->insertToken($userInfo->user_id);
		$qstring = $this->base64url_encode($token);
		$url = base_url() . 'login/updatePassword/token/' . $qstring;
		$link = '<a href="' . $url . '">' . $url . '</a>';
		// KIRIM EMAIL
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'smartfarming99@gmail.com',
			'smtp_pass'   => 'Bismillah99%',
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		];
		$this->load->library('email', $config);
		$this->email->from('smartfarming99@gmail.com', 'Dreamworld Admin');
		$this->email->to($userInfo->email);
		$this->email->subject('RESET PASSWORD ACCOUNT');
		$this->email->message("Hallo " . $userInfo->username . ", our system detect that you want to reset your password.
							   Click <strong><a href=" . $url . ">this link</a></strong> to create a new password.<br><br>
							   Ignore this message if you won't reset your password");
		if ($this->email->send()) {
			$this->session->set_flashdata('EmailSent', 'Sent');
		} else {
			$this->session->set_flashdata('EmailNotSent', 'NotSent');
		}
		// echo $sendStatus;die;
		$this->forgotPassword();
	}

	public function resetPassword()
	{
		$this->load->view('back/resetPassword');
	}

	public function updatePassword()
	{
		$data = $this->data;
		$token = $this->base64url_decode($this->uri->segment(4));
		$cleanToken = $this->security->xss_clean($token);
		$userInfo = $this->Login_model->isTokenValid($cleanToken); //either false or array();          
		// var_dump($userInfo);die;
		if (!$userInfo) {
			$this->session->set_flashdata('tokenExpired', 'expired');
			redirect(base_url('login/resetPassword'), 'refresh');
		}

		$data['token'] = $this->base64url_encode($token);

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('confirmPassword', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('back/resetPassword', $data);
		} else {
			$post = $this->input->post(NULL, TRUE);
			$cleanPost = $this->security->xss_clean($post);
			$hashed = SHA1($cleanPost['password']);
			$cleanPost['password'] = $hashed;
			$cleanPost['user_id'] = $userInfo->user_id;
			unset($cleanPost['ConfPass']);
			$this->Login_model->updatePassword($cleanPost);
			$this->session->set_flashdata('SuccessResetPassword', 'success');
			redirect(base_url('login'));
		}
	}

	public function base64url_encode($data)
	{
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

	public function base64url_decode($data)
	{
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}
}

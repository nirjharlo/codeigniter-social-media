<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loging extends CI_Controller {

	/**
	 * The front page is Login form
	 * @return void
	 */
	public function index() {

		$this->load->helper('form');
		$this->load->view('login');
	}

	public function signup() {

		$this->load->helper('form');
		$this->load->view('signup');
	}

	public function signup_submit() {

		$this->load->model('User');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE) {
			$fname = $this->input->post('first_name');
			$lname = $this->input->post('last_name');
			$email = $this->input->post('email_address');			
			$uname = $this->input->post('username');
			$pass = $this->encrip_password($this->input->post('password'));

			$uname_checked = $this->User->check('user_name', $uname);
			$email_address_checked = $this->User->check('email_addres', $email);
			if($uname_checked != false) {

				$data['uname_taken'] = $uname_checked;
				$this->load->view('signup', $data);

			} elseif($email_address_checked != false) {

				$data['email_address_taken'] = $email_address_checked;
				$this->load->view('signup', $data);

			} else {

				$data['insert'] = $this->User->signup($fname, $lname, $email, $uname, $pass);
				$this->load->view('login', $data);

			}
		} else {
			$this->load->view('signup');
		}
	}

	/**
	 * Password encryption
	 * @param  string $password
	 * @return string
	 */
	public function encrip_password($password) {

		 return md5($password);
	}

	/**
	 * Login validation
	 * @return void
	 */
	public function validate() {

		$this->load->model('User');

		$user_name = $this->input->post('user_name');
		$password = $this->encrip_password($this->input->post('password'));

		// Using the model validate the user
		$is_valid = $this->User->validate($user_name, $password);

		// If validataion is true, redirect to profile
		if($is_valid) {

			$data = array(
				'user_name' => $user_name,
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('admin/profile');

		} else {

			// incorrect username or password
			$data['message_error'] = TRUE;

			$this->load->helper('form');
			$this->load->view('login', $data);
		}
	}
}
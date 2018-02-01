<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * The front page is Login form
	 * @return void
	 */
	public function index() {

		$this->load->helper('form');
		$userdata = $this->session->userdata;
		$is_logged_in = array_key_exists('is_logged_in', $userdata) ? $userdata['is_logged_in'] : false;

		if ($is_logged_in) {

			$user_name = $userdata['user_name'];
			$data['user_name'] = $user_name;

			$this->load->model('User');
			$user = $this->User->get_data($user_name);
			$user_data = $user[0];

			$data['first_name'] = $user_data->first_name;
			$data['last_name'] = $user_data->last_name;
			$data['email_addres'] = $user_data->email_addres;
			$data['src'] = $user_data->image;

			$this->load->view('profile', $data);
		} else {
			$this->load->view('login');
		}
	}

	public function specific_profile() {

		$user_name = $this->uri->segment(2);
		$data['user_name'] = $user_name;

		$this->load->model('User');
		$user = $this->User->get_data($user_name);
		$user_data = $user[0];

		$data['first_name'] = $user_data->first_name;
		$data['last_name'] = $user_data->last_name;
		$data['email_addres'] = $user_data->email_addres;
		$data['src'] = $user_data->image;
		$data['specific'] = true;

		$this->load->helper('form');
		$this->load->view('profile', $data);
	}

	/**
	 * Uploading image method
	 * @return void
	 */
	public function do_upload() {

		$this->load->helper('form');

		$config['upload_path']   = './uploads/'; 
		$config['allowed_types'] = 'gif|jpg|png'; 
		$config['max_size']      = 100; 
		$config['max_width']     = 1024; 
		$config['max_height']    = 768;  
		$this->load->library('upload', $config);
			
		if ( $this->upload->do_upload('profile_image')) {
			$upload_data = $this->upload->data();

			$this->load->model('User');
			$userdata = $this->session->userdata;
			$user_name = $userdata['user_name'];
			$image = $upload_data['client_name'];
			$this->User->insert_image($user_name, $image);
			$this->index();
		}
	}
}
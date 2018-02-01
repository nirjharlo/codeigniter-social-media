<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {

	/**
	 * The front page list
	 * @return void
	 */
	public function index() {

		$this->load->model('User');
		$data['members'] = $this->User->get_members();

		$this->load->view('list', $data);
	}
}
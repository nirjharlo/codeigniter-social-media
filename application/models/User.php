<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	function validate($user_name, $password) {

		$this->db->where('user_name', $user_name);
		$this->db->where('pass_word', $password);
		$query = $this->db->get('members');
		
		if($query->result_id->num_rows == 1) {
			return true;
		}		
	}

	public function insert_image($uname, $image) {

		$data = array('image' => $image);

		$this->db->set($data);
		$this->db->where('user_name', $uname);
		$this->db->update('members', $data);
	}

    /**
    * Get the user data 
    * @param $user_name
    * @return array
    */
	function get_data($uname) {

		$this->db->where('user_name', $uname);
		$query = $this->db->get('members');
		$user = $query->result();

		return $user;
	}

	/**
	 * Check if username or email already exists or not
	 * @param  string $key
	 * @param  string $value
	 * @return string
	 */
	public function check($key, $value) {

		$this->db->where($key, $value);
		$query = $this->db->get('members');

        if($query->result_id->num_rows > 0){
			  return "already taken";
		}
	}


    /**
    * Store the new user's data into the database
    * @return void
    */	
	function signup($fname, $lname, $email, $uname, $pass) {

		$new_member_insert_data = array(
			'first_name' => $fname,
			'last_name' => $lname,
			'email_addres' => $email,
			'user_name' => $uname,
			'pass_word' => $pass,
		);
		$insert = $this->db->insert('members', $new_member_insert_data);
	}
}


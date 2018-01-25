<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	function validate($user_name, $password)
	{
		$this->db->where('user_name', $user_name);
		$this->db->where('pass_word', $password);
		$query = $this->db->get('members');
		
		if($query->result_id->num_rows == 1) {
			return true;
		}		
	}

    /**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		$user = array(); /* array to store the user data we fetch */
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    /* put data in array using username as key */
		    $user['user_name'] = $udata['user_name']; 
		    $user['is_logged_in'] = $udata['is_logged_in']; 
		}
		return $user;
	}

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


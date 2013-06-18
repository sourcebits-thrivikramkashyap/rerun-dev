<?php 

class Login_model extends CI_Model{
	
	public function login($login_details)
	{		
		//check whether email exists in database	


		$email = $login_details['email'];
		$sql = "SELECT * from users
				WHERE email = '$email'";
		$query = $this->db->query($sql);
		
		$email_from_db = '';
		$password_from_db = '';
		foreach($query->result() as $row)
		{
			$email_from_db = $row->email;
			$password_from_db = $row->password;
		}
		
		// if email and passwords match set session
		if(($email_from_db == $login_details['email'])&&($password_from_db == md5($login_details['password'])))
		{
			$this->load->library('session');
			$this->session->set_userdata('email', $login_details['email']);		
			return true;	
		}		
		else
		{
			return false;
		}				
	}
}

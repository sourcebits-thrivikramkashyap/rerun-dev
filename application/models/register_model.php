<?php 

class Register_model extends CI_Model{
	
	public function register($details)
	{
		$email = $details['email'];
		$sql = "SELECT * from users
				WHERE email = '$email'";
		$query = $this->db->query($sql);
		
		// if email already exists return false
		if($query->num_rows()>0)
		return false;
		
		$email = $details['email'];
		$password = $details['password'];
		$password_confirm = $details['password_confirm'];
		
		if($password != $password_confirm)
		{
			return false;
		}
		
			$sql = "INSERT into users(email,password)
			 values(".$this->db->escape($details['email']).",".$this->db->escape(md5($details['password'])).")";
			$this->db->query($sql);
			
			$this->session->set_userdata('email', $details['email']);		
			return true;
	}
}

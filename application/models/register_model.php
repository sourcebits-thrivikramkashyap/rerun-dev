<?php 

class Register_model extends CI_Model{
	
	public function register($details)
	{
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

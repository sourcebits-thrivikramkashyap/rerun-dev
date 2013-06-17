<?php 

class Login_model extends CI_Model{
	
	public function login($login_details)
	{
		//TODO
		//check whether email already exists
		
		$sql = "INSERT into users(email,password)
		 values(".$this->db->escape($login_details['email']).",".$this->db->escape($login_details['password']).")";
		$this->db->query($sql);
		
		$this->load->library('session');
		$this->session->set_userdata('email', $login_details['email']);				
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller{
	
	
	public function index()
	{
		$this->load->library('session');
		echo "Welcome".$this->session->userdata('email');
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer extends CI_Controller{
	
	
	public function index()
	{
		$data = array(
				'email' => $this->session->userdata('email')
		);
		$this->load->view('header', $data);		
	}
}

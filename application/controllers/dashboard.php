<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller{
	
	public function index()
	{
		$this->_header();
	}
	
	public function _header()
	{
		$this->load->library('session');
		
		$data = array(
				'email' => $this->session->userdata('email')
		);
		$this->load->view('header', $data);		
	}
}
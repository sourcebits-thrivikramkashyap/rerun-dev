<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payment_stream_new extends CI_Controller{
	
	
	public function index()
	{
		$this->_header();
		$this->load->view('payment_stream/payments');
	}
	
	public function add()
	{
		$this->_header();
		$this->load->view('payment_stream/create_payment_stream');
	}
	
	public function save()
	{
		echo "<pre>";print_r($_POST);die;
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

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer extends CI_Controller{
	
	
	public function index()
	{
		$this->_header();
		$this->load->model('customer_model');
		$customers = $this->customer_model->get_customers();
		
		$view_data = array('customers'=>$customers);
		$this->load->view('customer/customer', $view_data);
	}
	
	public function add()
	{
		$this->_header();
		$this->load->view('customer/create_customer');
	}
	
	public function save()
	{		
		$this->load->model('customer_model');
		$success = $this->customer_model->save_customer_details($_POST);
			
		if($success)
		{
			redirect('/customer');				
		}
		else
		{
			$this->_header();
			$this->load->view('customer/create_customer');
		}		
	}
	
	public function view($customer_id)
	{
		$this->_header();
		$this->load->model('customer_model');
		$customer_details = $this->customer_model->get_details($customer_id);
		$view_data = array('customer_details' => $customer_details[0]);
		$this->load->view('customer/customer_detail', $view_data);		
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

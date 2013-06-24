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
		$this->load->model('customer_model');
		$customers = $this->customer_model->get_customers();
		$this->load->model('items_model');
		$items = $this->items_model->get_items();
		$view_data = array(
			'customers' => $customers,
			'items' => $items
		);
		$this->load->view('payment_stream/create_payment_stream', $view_data);
	}
	
	public function save()
	{
		$this->load->model('payment_stream_model');
		$result = $this->payment_stream_model->create_payment_stream();
		
		$payment_stream_id = $result[0]->payment_stream_id;
//		echo $_POST['total_amount'];
//		echo "<pre>";print_r($_POST);
		
		if(isset($_POST['item_ids']))
		{
			$item_ids = $_POST['item_ids'];
			foreach($item_ids as $item_id)
			{
				$this->payment_stream_model->add_item_to_payment_stream($payment_stream_id, $item_id);
			}
		}
		if(isset($_POST[customer_ids]))
		{
			$customers = $_POST['customer_ids'];
			foreach($customers as $customer)
			{
//				echo "<pre>";print_r($customer);
				$this->payment_stream_model->add_customer_to_payment_stream($payment_stream_id, $customer);
			}			
		}		
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

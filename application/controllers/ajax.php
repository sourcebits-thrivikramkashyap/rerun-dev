<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends CI_Controller{
	
	public function get_items()
	{
		$this->load->model('items_model');
		$items = $this->items_model->get_items();
		echo $items;		
	}
	
	public function get_item()
	{		
		$item_name = $_GET['item_name'];
		$this->load->model('items_model');
		$item_detail = $this->items_model->get_item_detail($item_name);
		echo json_encode($item_detail);
	}
	
	public function get_customer()
	{
		$customer_name = $_GET['customer_name'];
		$this->load->model('customer_model');
		$customer = $this->customer_model->get_customer_by_name($customer_name);
		echo json_encode($customer);
	}
	
	public function add_customer_to_payment_stream()
	{
		
	}
}
<?php

class payment_stream_model extends CI_Model{
	
	/*
	 * Function : create_payment_stream
	 * desc 	: inserts payment_stream data into db and returns the payment_stream_id
	 * returns  : payment_stream_id 
	 */
	public function create_payment_stream()
	{
		$payment_stream_details =  Array(
					
					'stream_name'    => $_POST['stream_name'],
					'stream_type'    => $_POST['stream_type'],
					'no_of_payments' => $_POST['no_of_payments2'],
					'frequency'      => $_POST['frequency'],
					'total_amount'	 => $_POST['total_amount']
		);
		
		$sql = "INSERT into payment_stream(stream_name, stream_type, no_of_payments, frequency, total_amount)
				Values(".$this->db->escape($payment_stream_details['stream_name']).","
						.$this->db->escape($payment_stream_details['stream_type']).","
						.$this->db->escape($payment_stream_details['no_of_payments']).","
						.$this->db->escape($payment_stream_details['frequency']).","
						.$this->db->escape($payment_stream_details['total_amount'])
						.")";

		$result = $this->db->query($sql);
		
		if($result)
		{
			$sql = "SELECT payment_stream_id 
			FROM payment_stream
			WHERE stream_name=".$this->db->escape($_POST['stream_name']);
			
			$query = $this->db->query($sql);
			return $query->result();
		}
	}
	
	/*
	 * Function: add_item_to_payment_stream
	 * desc    : adds an entry in payment_stream_items table for item with specified item_id
	 * param   : payment_stream_id, item_id
	 */
	public function add_item_to_payment_stream($payment_stream_id, $item_id)
	{
		
	}
	
	/*
	 * Function : add_customer_to_payment_stream
	 * desc		: adds an entry in payment_stream_customers table for the specified customer
	 * param 	: payment_stream_id, customer(array)
	 */
	public function add_customer_to_payment_stream($payment_stream_id, $customer)
	{
		
	}
}

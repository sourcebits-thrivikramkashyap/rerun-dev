<?php

class Customer_Model extends CI_Model{
	
	public function save_customer_details($customer_details)
	{		
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('primary_email', 'Email', 'required|valid_email');
		
		if($this->form_validation->run() == false)
		{
			return false;
		}
		
		$email = $customer_details['primary_email'];
		$sql = "SELECT * from customers
				WHERE primary_email = '$email'";
		$query = $this->db->query($sql);
		
		// if email already exists return false
		if($query->num_rows()>0)
		return false;
		
		$first_name= $customer_details['first_name'];
		$last_name= $customer_details['last_name'];
		$primary_email= $customer_details['primary_email'];
		$primary_phone= $customer_details['primary_phone'];
		$mobile= $customer_details['mobile'];
		$fax= $customer_details['fax'];
		$street1= $customer_details['street1'];
		$street2= $customer_details['street2'];
		$city= $customer_details['city'];
		$state= $customer_details['state'];
		$zip= $customer_details['zip'];
		$country= $customer_details['country'];
		$notes= $customer_details['notes'];
		$userid=$this->session->userdata('userid');
		
		$sql = "INSERT into customers(first_name, last_name, primary_email, primary_phone, mobile, fax, street1, street2, city, state, zip, country, note, user_id)
			 values("
			.$this->db->escape($first_name).","
			.$this->db->escape($last_name).","
			.$this->db->escape($primary_email).","
			.$this->db->escape($primary_phone).","
			.$this->db->escape($mobile).","
			.$this->db->escape($fax).","
			.$this->db->escape($street1).","
			.$this->db->escape($street2).","
			.$this->db->escape($city).","
			.$this->db->escape($state).","
			.$this->db->escape($zip).","
			.$this->db->escape($country).","
			.$this->db->escape($notes).","
			.$this->db->escape($userid)
			
			.")";
			$result = $this->db->query($sql);
			
			return $result;
		
	}
	
	public function get_customers()
	{
		$sql = "SELECT * from customers 
				where user_id=".$this->session->userdata('userid');
		$query = $this->db->query($sql);
		
//		$html='<ul class="customers">';
//		foreach($query->result() as $row)
//		{
//			$html.='<li>'.$row->first_name.'</li>';
//		}
//		
//		$html.='</ul>';
//		
//		return $html;

		return $query->result();
	}
	
	public function get_details($customer_id)
	{
		$sql = "SELECT * 
				FROM customers
				WHERE customer_id=".$customer_id;
		
		$query = $this->db->query($sql);
		return $query->result();
	}
}
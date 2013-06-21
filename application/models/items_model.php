<?php

class Items_Model extends CI_Model{
	
	public function get_items()
	{
		$sql = "select * from items";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_item_detail($item_name)
	{	
		$sql = "select * from items 
				where item_name=".$this->db->escape($item_name);
		$query = $this->db->query($sql);
		return $query->result();
	}
}
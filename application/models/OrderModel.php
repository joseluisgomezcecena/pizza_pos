<?php

class OrderModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function newOrder($id)
	{
		$data = [
			'order_qty'=>0,
			'created_at'=>date("Y-m-d H:i:s"),
			'client_id'=>$id
		];

		$this->db->insert('orders', $data);
		//$last_query = $this->db->last_query();
		//print_r($last_query);
		return $this->db->insert_id();
	}



	public function newOrderItem($size, $item, $order, $qty, $extras)
	{
		$data = [
			'order_id'=>$order,
			'item_id'=>$item,
			'size_id'=>$size,
			'qty'=>$qty,
			//'item_extras'=>$extras,
			'price'=>$this->getprice($size)
		];

		$this->db->insert('order_items', $data);
		$last_query = $this->db->last_query();
		print_r($last_query);
		return $this->db->insert_id();
	}




	public function get_order_items($order_id)
	{
		$this->db->select('order_items.*, items.item_name, sizes.size_name');
		$this->db->from('order_items');
		$this->db->join('items', 'items.item_id = order_items.item_id');
		$this->db->join('sizes', 'sizes.size_id = order_items.size_id');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get();
		return $query->result_array();
	}



	//callback function for get price
	public function getprice($size)
	{
		$this->db->select('price');
		$this->db->from('item_size');
		$this->db->where('size_id', $size);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result['price'];
	}




}

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
			'item_id'=>$item,
			'order_id'=>$order,
			'item_size_id'=>$size,
			'item_qty'=>$qty,
			'item_extras'=>$extras,
			'price'=>$this->getprice($size)
		];

		$this->db->insert('order_items', $data);
		//$last_query = $this->db->last_query();
		//print_r($last_query);
		return $this->db->insert_id();
	}






}

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
		//$last_query = $this->db->last_query();
		//print_r($last_query);
		$id = $this->db->insert_id();

		foreach ($extras as $extra) {
			$data = [
				'oi_id'=>$id,
				'extra_ingredient_id'=>$extra,
				'extra_size_id'=>$size,
				'price'=>$this->get_price_extra($size, $extra)
			];
			$this->db->insert('order_item_extras', $data);
		}

		return true;

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


	public function get_order_extras($order, $item)
	{
		$this->db->select('order_item_extras.*, sizes.size_name, ingredients.ingredient_name');
		$this->db->from('order_item_extras');
		$this->db->join('ingredients', 'ingredients.ingredient_id = order_item_extras.extra_ingredient_id');
		//$this->db->join('extra_ingredients', 'extra_ingredients.extra_ingredient_id = order_item_extras.extra_ingredient_id');
		$this->db->join('sizes', 'sizes.size_id = order_item_extras.extra_size_id');
		$this->db->where('oi_id', $item);
		$query = $this->db->get();

		$last_query = $this->db->last_query();
		print_r($last_query);

		return $query->result_array();
	}


	public function up($item)
	{
		$this->db->set('qty', 'qty+1', FALSE);
		$this->db->where('oi_id', $item);
		$this->db->update('order_items');
	}


	public function down($item)
	{
		$this->db->set('qty', 'qty-1', FALSE);
		$this->db->where('oi_id', $item);
		$this->db->update('order_items');

		$this->db->select('qty');
		$this->db->from('order_items');
		$this->db->where('oi_id', $item);
		$query = $this->db->get();
		$result = $query->row_array();
		if($result['qty'] == 0 || $result['qty'] < 0)
		{
			$this->db->where('oi_id', $item);
			$this->db->delete('order_items');
		}
	}


	public function delete($item)
	{
		$this->db->where('oi_id', $item);
		$this->db->delete('order_items');
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

	public function get_price_extra($size, $extra)
	{
		$this->db->select('extra_price');
		$this->db->from('extras');
		$this->db->where('size_id', $size);
		$this->db->where('ingredient_id', $extra);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result['extra_price'];
	}




}

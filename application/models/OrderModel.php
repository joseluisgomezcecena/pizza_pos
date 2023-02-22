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
			'price'=>$this->getprice($size, $item)
		];

		$this->db->insert('order_items', $data);
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


	public function get_orders()
	{
		$this->db->select('orders.*, clients.client_name');
		$this->db->from('orders');
		$this->db->join('clients', 'clients.client_id = orders.client_id');
		$this->db->where('orders.order_closed', 1);
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_panels($params = NULL)
	{
		if ($params == 'today')
		{
			$this->db->where('created_at >=', date('Y-m-d 00:00:00'));
			$this->db->where('created_at <=', date('Y-m-d 23:59:59'));
		}

		if($params == 'week')
		{
			$this->db->where('created_at >=', date('Y-m-d 00:00:00', strtotime('monday this week')));
			$this->db->where('created_at <=', date('Y-m-d 23:59:59', strtotime('sunday this week')));
		}

		if ($params == 'month')
		{
			$this->db->where('created_at >=', date('Y-m-01 00:00:00'));
			$this->db->where('created_at <=', date('Y-m-t 23:59:59'));
		}

		$this->db->select('order_total');
		$this->db->from('orders');
		$this->db->where('order_closed', 1);
		//$this->db->where('created_at >=', date('Y-m-d 00:00:00'));
		//$this->db->where('created_at <=', date('Y-m-d 23:59:59'));
		$query = $this->db->get();
		$orders = $query->result_array();
		$panels = [];
		$panels['total'] = 0;
		$panels['count'] = 0;
		foreach ($orders as $order) {
			$panels['total'] += $order['order_total'];
			$panels['count']++;
		}

		$data = [
			'orders'=>$panels['count'],
			'total'=>$panels['total']
		];

		return $data;
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
		$this->db->join('sizes', 'sizes.size_id = order_item_extras.extra_size_id');
		$this->db->where('oi_id', $item);
		$query = $this->db->get();

		#$last_query = $this->db->last_query();
		#print_r($last_query);

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


	public function end_order($order)
	{
		$this->db->count_all('order_items');
		$this->db->where('order_id', $order);
		$query = $this->db->get('order_items');
		$result = $query->num_rows();


		$this->db->set('order_closed', 1, FALSE);
		$this->db->set('order_qty', $result, FALSE);
		$this->db->set('order_total', $this->input->post('order_total'), FALSE);
		$this->db->where('order_id', $order);
		$this->db->update('orders');
	}









	//callback function for get price
	public function getprice($size, $item)
	{
		$this->db->select('price');
		$this->db->from('item_size');
		$this->db->where('size_id', $size);
		$this->db->where('item_id', $item);
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

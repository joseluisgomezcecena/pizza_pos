<?php
class ProductModel extends  CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function getall()
	{
		$query = $this->db->get('items');
		return $query->result_array();
	}

	public function get($id)
	{
		$query = $this->db->get_where('items', array('item_id' => $id));
		return $query->row_array();
	}

	public function getsizes($id)
	{
		$this->db->select('*');
		$this->db->from('item_size');
		$this->db->join('sizes', 'item_size.size_id = sizes.size_id');
		$this->db->where('item_size.item_id', $id);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function getingredients($id)
	{
		$this->db->select('*');
		$this->db->from('item_ingredient');
		$this->db->join('ingredients', 'item_ingredient.ingredient_id = ingredients.ingredient_id');
		$this->db->where('item_ingredient.item_id', $id);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function getallingredients()
	{
		$query = $this->db->get('ingredients');
		return $query->result_array();
	}


	public function getprice($size)//,item
	{
		$this->db->select('price');
		$this->db->from('item_size');
		//$this->db->where('item_id', $item);
		$this->db->where('size_id', $size);

		$query = $this->db->get();
		$result = $query->row_array();

		//$last_query = $this->db->last_query();
		#print_r($last_query);

		return $result['price'];
	}


	public function getextraprice()
	{
		$ingredient = $this->input->post('ingredient');
		$this->db->select('price');
		$this->db->from('ingredients');
		$this->db->where('ingredient_id', $ingredient);

		$query = $this->db->get();
		$result = $query->row_array();

		return $result['price'];
	}


	public function getdetails()
	{

		$this->db->select('*');
		$this->db->from('items');
		$this->db->join('item_ingredient ii', 'items.item_id = ii.item_id');
		$this->db->join('ingredients i', 'ii.ingredient_id = i.ingredient_id');
		$this->db->join('item_size s', 'ii.item_id = s.item_id');
		$this->db->join('sizes si', 's.size_id = si.size_id');

		$query = $this->db->get();
		$query->result_array();
		$data = [];

		foreach ($query->result_array() as $row)
		{
			$data[$row['item_id']]['item_name'] = $row['item_name'];
			$data[$row['item_id']]['price'] = $row['price'];
			$data[$row['item_id']]['item_image'] = $row['item_image'];
			$data[$row['item_id']]['item_ingredients'][$row['ingredient_id']] = $row['ingredient_name'];
			$data[$row['item_id']]['item_sizes'][$row['size_id']] = $row['size_name'];
			//size prices
			$data[$row['item_id']]['item_size_prices'][$row['size_id']] = $row['price'];
		}

		print_r($data['items'] = $data);
		return  $data;

	}



}

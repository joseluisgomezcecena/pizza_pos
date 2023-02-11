<?php
class ItemModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function index()
	{
		$query = $this->db->get('items');
		return $query->result_array();
	}

	public function get($id)
	{
		$this->db->select('items.*, ingredients.ingredient_name, sizes.size_name');
		$this->db->from('items');
		$this->db->join('ingredients', 'ingredients.ingredient_id = items.ingredient_id');
		$this->db->join('sizes', 'sizes.size_id = items.size_id');
		$this->db->where('items.item_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function itemdetails($id)
	{
		$this->db->select('*');
		$this->db->from('item_size');
        $this->db->where('item_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}



	public function create($sizes)
	{
		/*********** INSERT INTO ITEMS ***********/
		$data = array(
			'item_name' => $this->input->post('item_name'),
		);
		$this->db->insert('items', $data);
		$id = $this->db->insert_id();

		/*********** Insert last id ITEM_SIZE ***********/
		foreach ($sizes as $size)
		{
			$data = array(
				'item_id' => $id,
				'price' => $this->input->post($size['size_name'].'_price'),
				'size_id' => $size['size_id'],
			);

			$this->db->insert('item_size', $data);
		}

		//insertinto item_ingredient
		$ingredients = $this->input->post('ingredient_id');
		foreach ($ingredients as $ingredient)
		{
			$data = array(
				'item_id' => $id,
				'ingredient_id' => $ingredient,
			);

			$this->db->insert('item_ingredient', $data);
		}

	}






	/*
	public function check_extra_exists($extra_name)
	{
		$query = $this->db->get_where('extras', array('ingredient_id' => $extra_name));
		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	*/
}

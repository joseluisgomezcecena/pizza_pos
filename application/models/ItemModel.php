<?php
class ItemModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function index($is_pizza = NULL)
	{
		$query = $this->db->get_where('items', array('is_pizza' => $is_pizza));
		return $query->result_array();
	}

	public function get($id)
	{
		$query = $this->db->get_where('items', array('item_id' => $id));
		return $query->row_array();
	}


	public function get_item_ingredients($id)
	{
		$this->db->select('*');
		$this->db->from('item_ingredient');
		$this->db->join('ingredients', 'ingredients.ingredient_id = item_ingredient.ingredient_id');
		$this->db->where('item_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_item_sizes($id)
	{
		$this->db->select('*');
		$this->db->from('item_size');
		$this->db->join('sizes', 'sizes.size_id = item_size.size_id');
		$this->db->where('item_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function itemdetails($id)
	{
		$this->db->select('*');
		$this->db->from('item_size');
        $this->db->where('item_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}



	public function create($sizes, $is_pizza)
	{
		/*********** INSERT INTO ITEMS ***********/
		$data = array(
			'item_name' => $this->input->post('item_name'),
			'is_pizza' => $is_pizza,
		);
		$this->db->insert('items', $data);
		$id = $this->db->insert_id();

		if ($is_pizza == 1)
		{
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
		else
		{
			$data = array(
				'item_id' => $id,
				'price' => $this->input->post('side_price'),
				'size_id' => 0,
			);

			$this->db->insert('item_size', $data);
		}
	}



	public function edit($sizes, $id)
	{
		/*********** DELETE EVERYTHING FROM ITEM_SIZE *******/

		$this->db->delete('item_size', array('item_id' => $id));
		$this->db->delete('item_ingredient', array('item_id' => $id));

		/*********** UPDATE INTO ITEMS ***********/
		$data = array(
			'item_name' => $this->input->post('item_name'),
		);
		$this->db->update('items', $data, array('item_id' => $id));


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




	public function delete($id)
	{
		$this->db->delete('items', array('item_id' => $id));
		$this->db->delete('item_size', array('item_id' => $id));
		$this->db->delete('item_ingredient', array('item_id' => $id));
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

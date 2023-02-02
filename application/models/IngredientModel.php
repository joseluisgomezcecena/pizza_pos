<?php

class IngredientModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}


	public function get_ingredients($id = NULL)
	{
		if ($id)
		{
			$query = $this->db->get_where('ingredients', array('ingredient_id' => $id));
			return $query->row_array();
		}
		else
		{
			$query = $this->db->get('ingredients');
			return $query->result_array();
		}
	}

	public function create_ingredient()
	{
		$data = array(
			'ingredient_name' => $this->input->post('ingredient_name')
		);
		$this->db->insert('ingredients', $data);
	}


	public function check_ingredient_exists($ingredient)
	{
		$query = $this->db->get_where('ingredients', array('ingredient_name' => $ingredient));

		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}


}

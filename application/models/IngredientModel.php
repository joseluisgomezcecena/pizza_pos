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
			$this->db->select('*');
			$this->db->from('ingredients');
			$this->db->where('is_crust != ', 1);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	public function get_crusts($id = NULL)
	{
		if ($id)
		{
			$query = $this->db->get_where('ingredients', array('ingredient_id' => $id));
			return $query->row_array();
		}
		else
		{
			$this->db->select('*');
			$this->db->from('ingredients');
			//$this->db->where('is_crust', 1);
			$this->db->where('is_crust = 1 OR ingredient_name = "Queso"');//added this line
			//$this->db->where('ingredient_name = ', 'queso');//added this line
			$query = $this->db->get();
			return $query->result_array();
		}
	}





	public function get_all_ingredients()
	{
		$this->db->select('*');
		$this->db->from('ingredients');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function create_ingredient()
	{
		$data = array(
			'ingredient_name' => $this->input->post('ingredient_name'),
			'is_crust'=>$this->input->post('is_crust')
		);
		$this->db->insert('ingredients', $data);
	}




	public function edit_ingredient($id)
	{
		$data = array(
			'ingredient_name' => $this->input->post('ingredient_name'),
			'is_crust'=>$this->input->post('is_crust')
		);
		$this->db->where('ingredient_id', $id);
		$this->db->update('ingredients', $data);
	}




	public function delete_ingredient($id)
	{
		$this->db->where('ingredient_id', $id);
		$this->db->delete('ingredients');

		$this->db->where('ingredient_id', $id);
		$this->db->delete('item_ingredient');

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

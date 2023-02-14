<?php
class ExtraModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_extras()
	{

		$this->db->select('extras.*, ingredients.ingredient_name, sizes.size_name');
		$this->db->from('extras');
		$this->db->join('ingredients', 'ingredients.ingredient_id = extras.ingredient_id');
		$this->db->join('sizes', 'sizes.size_id = extras.size_id');
		$this->db->order_by('extras.extra_id', 'ASC');
		$query = $this->db->get();

		return $query->result_array();
	}


	public function get_extra($id)
	{
		$this->db->select('extras.*, ingredients.ingredient_name, sizes.size_name');
		$this->db->from('extras');
		$this->db->join('ingredients', 'ingredients.ingredient_id = extras.ingredient_id');
		$this->db->join('sizes', 'sizes.size_id = extras.size_id');
		$this->db->where('extras.extra_id', $id);

		$query = $this->db->get();
		return $query->row_array();
	}




	public function get_extras_by_name()
	{
		$this->db->select('DISTINCT(extras.ingredient_id),ingredients.ingredient_name, extras.extra_id');
		$this->db->from('extras');
		$this->db->join('ingredients', 'ingredients.ingredient_id = extras.ingredient_id');
		$query = $this->db->get();

		$last_query = $this->db->last_query();
		print_r($last_query);

		return $query->result_array();
	}


	public function create_extra($sizes)
	{
		foreach ($sizes as $size)
		{
			$data = array(
				'ingredient_id' => $this->input->post('ingredient_id'),
				'extra_price' => $this->input->post($size['size_name'].'_price'),
				'size_id' => $size['size_id'],
			);

			$this->db->insert('extras', $data);

			$last_query = $this->db->last_query();
			print_r($last_query);
		}

	}


	public function edit_extra($id)
	{
		$data = array(
			'ingredient_id' => $this->input->post('ingredient_id'),
			'extra_price' => $this->input->post('price'),
			//'size_id' => $this->input->post('size_id'),
		);

		$this->db->where('extra_id', $id);
		$this->db->update('extras', $data);
	}


	public function delete_extra($id)
	{
		$this->db->delete('extras', array('extra_id' => $id));
		return true;
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

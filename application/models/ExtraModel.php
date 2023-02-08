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
		$this->db->order_by('extras.extra_id', 'DESC');
		$query = $this->db->get();

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

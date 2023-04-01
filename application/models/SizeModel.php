<?php
/*
class SizeModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}


	public function get($id = FALSE )
	{
		if ($id)
		{
			$query = $this->db->get_where('sizes', array('size_id' => $id));
			return $query->row_array();
		}
		else
		{
			$query = $this->db->get('sizes');
			return $query->result_array();
		}
	}


	public function store()
	{
		$data = array(
			'size_name' => $this->input->post('size_name'),
			'notes' => $this->input->post('notes')
		);

		$this->db->insert('sizes', $data);
	}


	public function update($id)
	{
		$data = array(
			'size_name' => $this->input->post('size_name'),
			'notes' => $this->input->post('notes')
		);

		$this->db->update('sizes', $data, array('size_id' => $id));
	}


	public function delete($id)
	{
		$this->db->delete('sizes', array('size_id' => $id));
	}

}
*/

class SizeModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}


	public function get_sizes($id = NULL)
	{
		if ($id)
		{
			$query = $this->db->get_where('sizes', array('size_id' => $id));
			return $query->row_array();
		}
		else
		{
			$query = $this->db->get('sizes');
			return $query->result_array();
		}
	}


	public function create_size()
	{
		$data = array(
			'size_name' => $this->input->post('size_name')
		);
		$this->db->insert('sizes', $data);
	}


	public function edit_size($id)
	{
		$data = array(
			'size_name' => $this->input->post('size_name')
		);
		$this->db->update('sizes', $data, array('size_id' => $id));
	}


	public function delete_size($id)
	{
		$this->db->delete('sizes', array('size_id' => $id));

		$this->db->delete('item_size', array('size_id' => $id));
	}


	public function check_size_exists($size)
	{
		$query = $this->db->get_where('sizes', array('size_name' => $size));

		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}


}

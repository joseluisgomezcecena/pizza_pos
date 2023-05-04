<?php
class ShippingModel extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}

	public function get_deliveries($id = FALSE)
	{
		if($id === FALSE)
		{
			$query = $this->db->get('shipping');
			return $query->result_array();
		}

		$query = $this->db->get_where('shipping', array('delivery_id' => $id));
		return $query->row_array();
	}


	public function create_delivery()
	{
		$data = array(
			'delivery_name' => $this->input->post('delivery_name'),
			'delivery_price' => $this->input->post('delivery_price')
		);

		return $this->db->insert('shipping', $data);
	}


	public function edit_delivery($id)
	{
		$data = array(
			'delivery_name' => $this->input->post('delivery_name'),
			'delivery_price' => $this->input->post('delivery_price')
		);

		$this->db->where('delivery_id', $id);
		return $this->db->update('shipping', $data);
	}


	public function delete_delivery($id)
	{
		$this->db->where('delivery_id', $id);
		return $this->db->delete("shipping");
	}


}

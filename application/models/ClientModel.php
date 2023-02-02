<?php
class ClientModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}


	public function get($id = FALSE )
	{
		if ($id)
		{
			$query = $this->db->get_where('clients', array('client_id' => $id));
			return $query->row_array();
		}
		else
		{
			$query = $this->db->get('clients');
			return $query->result_array();
		}
	}

	public function get_client_by_order($order = FALSE )
	{
			$this->db->select('*');
			$this->db->from('orders');
			$this->db->join('clients', 'clients.client_id = orders.client_id');
			$this->db->where('orders.order_id', $order);

			$query = $this->db->get();
			return $query->row_array();
	}


	public function store()
	{
		$data = array(
			'client_name' => $this->input->post('name'),
			'client_phone' => $this->input->post('phone'),
			'client_street' => $this->input->post('street'),
			'client_number' => $this->input->post('number'),
			'client_block'=> $this->input->post('neighborhood'),
			'client_address_notes' => $this->input->post('notes'),
		);

		$this->db->insert('clients', $data);
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

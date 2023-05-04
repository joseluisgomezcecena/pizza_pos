<?php
class Shipping extends MY_Controller
{
	public function index()
	{
		$data['title'] = "Envios.";
		$data['deliveries'] = $this->ShippingModel->get_deliveries();

		$this->form_validation->set_rules('delivery_name', 'Nombre de la entrega.', 'required');
		$this->form_validation->set_rules('delivery_price', 'Precio de la entrega.', 'required');

		//validation style
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');



		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('shipping/index', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->ShippingModel->create_delivery();
			$this->session->set_flashdata('message', 'El tipo de entrega ha sido creado.');
			redirect(base_url() . 'admin/shipping');
		}
	}




	public function edit($id = NULL)
	{
		$data['title'] = "Editar o Actualizar Envios.";
		$data['delivery'] = $this->ShippingModel->get_deliveries($id);

		if($id === NULL || empty($data['delivery']))
		{
			show_404();
		}

		$this->form_validation->set_rules('delivery_name', 'Nombre de la entrega.', 'required');
		$this->form_validation->set_rules('delivery_price', 'Precio de la entrega.', 'required');

		//validation style
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('shipping/edit', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->ShippingModel->edit_delivery($id);
			$this->session->set_flashdata('message', 'El tipo de entrega ha sido actualizado.');
			redirect(base_url() . 'admin/shipping');
		}
	}




	public function delete($id = NULL)
	{
		$data['title'] = "Eliminar Tamaños.";
		$data['delivery'] = $this->ShippingModel->get_deliveries($id);

		if($id === NULL || empty($data['delivery']))
		{
			show_404();
		}

		if(!isset($_POST['delete']))
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('shipping/delete', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->ShippingModel->delete_delivery($id);
			$this->session->set_flashdata('message', 'El tipo de entrega ha sido eliminado.');
			redirect(base_url() . 'admin/shipping');
		}
	}






	function check_size_exists($size)
	{
		$this->form_validation->set_message('check_size_exists','El tamaño ya se encuentra registrado.');

		if($this->SizeModel->check_size_exists($size))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}

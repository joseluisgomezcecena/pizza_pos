<?php
class Items extends CI_Controller
{
	public function index()
	{
		$data['controller'] = $this;

		$data['title'] = "Items.";
		$data['items'] = $this->ItemModel->index();
		$data['ingredients'] = $this->IngredientModel->get_ingredients();
		$data['sizes'] = $this->SizeModel->get_sizes();

		$this->form_validation->set_rules('item_name', 'Nombre del item.', 'required');

		foreach ($data['sizes'] as $size)
		{
			$this->form_validation->set_rules($size['size_name'].'_price', 'Precio para '.$size['size_name'], 'required');
		}

		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('items/index', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->ItemModel->create($data['sizes']);
			$this->session->set_flashdata('item_created', 'El platillo ha sido creado.');
			redirect(base_url() . 'items/index');
		}
	}



	public function edit($id = NULL)
	{
		$data['controller'] = $this;

		$data['title'] = "Editar o Actualizar Menu.";
		$data['items'] = $this->ItemModel->index();
		$data['ingredients'] = $this->IngredientModel->get_ingredients();
		$data['sizes'] = $this->SizeModel->get_sizes();

		$data['item'] = $this->ItemModel->get($id);
		$data['item_ingredients'] = $this->ItemModel->get_item_ingredients($id);
		$data['item_sizes'] = $this->ItemModel->get_item_sizes($id);

		$this->form_validation->set_rules('item_name', 'Nombre del item.', 'required');

		foreach ($data['sizes'] as $size)
		{
			$this->form_validation->set_rules($size['size_name'].'_price', 'Precio para '.$size['size_name'], 'required');
		}

		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('items/edit', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->ItemModel->edit($data['sizes'], $id);
			$this->session->set_flashdata('item_created', 'El platillo ha sido editado.');
			redirect(base_url() . 'items/index');
		}


	}








	//callback
	public function item_details($id)
	{
		$data = $this->ItemModel->itemdetails($id);
		return $data;
	}


}

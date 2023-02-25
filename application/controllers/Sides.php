<?php
class Sides extends MY_Controller
{
	public function index()
	{
		$data['controller'] = $this;

		$data['title'] = "Items.";
		$data['items'] = $this->ItemModel->index(0);
		$data['sizes'] = $this->SizeModel->get_sizes();

		$this->form_validation->set_rules('item_name', 'Nombre del item.', 'required');
		$this->form_validation->set_rules('side_price', 'Precio del platillo.', 'required');

		//set validation style
		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<span class="alert-icon m-r-20 font-size-30">
						<i class="anticon anticon-close-circle"></i>
					</span>
					<strong>Operación fallida &nbsp;</strong>',
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>'
		);


		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('sides/index', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->ItemModel->create($data['sizes'], 0);
			$this->session->set_flashdata('message', 'El platillo ha sido creado.');
			redirect(base_url() . 'sides/index');
		}
	}



	public function edit($id = NULL)
	{
		$data['controller'] = $this;

		$data['title'] = "Editar o Actualizar Menu.";
		$data['items'] = $this->ItemModel->index();
		$data['sizes'] = $this->SizeModel->get_sizes();

		$data['item'] = $this->ItemModel->get($id);
		$data['item_sizes'] = $this->ItemModel->get_item_sizes($id);

		$this->form_validation->set_rules('item_name', 'Nombre del item.', 'required');
		$this->form_validation->set_rules('side_price', 'Precio del platillo.', 'required');


		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('sides/edit', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->ItemModel->edit($data['sizes'], $id, 0);
			$this->session->set_flashdata('message', 'El platillo ha sido editado.');
			redirect(base_url() . 'sides/index');
		}


	}


	public function delete($id = NULL)
	{
		$data['controller'] = $this;

		$data['title'] = "Eliminar de Menu.";
		$data['items'] = $this->ItemModel->index();
		$data['ingredients'] = $this->IngredientModel->get_ingredients();
		$data['sizes'] = $this->SizeModel->get_sizes();

		$data['item'] = $this->ItemModel->get($id);
		$data['item_ingredients'] = $this->ItemModel->get_item_ingredients($id);
		$data['item_sizes'] = $this->ItemModel->get_item_sizes($id);


		if(!isset($_POST['delete']))
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('sides/delete', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->ItemModel->delete($id);
			$this->session->set_flashdata('message', 'El platillo ha sido eliminado.');
			redirect(base_url() . 'sides/index');
		}
	}







	//callback
	public function item_details($id)
	{
		$data = $this->ItemModel->itemdetails($id);
		return $data;
	}


}

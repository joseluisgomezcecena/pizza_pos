<?php
class Ingredients extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Ingredientes.";
		$data['ingredients'] = $this->IngredientModel->get_ingredients();

		$this->form_validation->set_rules(
			'ingredient_name',
			'Nombre del Ingrediente.',
			'required|callback_check_ingredient_exists'
		);

		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('ingredients/index', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->IngredientModel->create_ingredient();
			$this->session->set_flashdata('message', 'El tamaño ha sido creado.');
			redirect(base_url() . 'ingredients/index');
		}


	}



	public function edit($id = NULL)
	{
		$data['title'] = "Actualizar ingrediente.";
		$data['ingredient'] = $this->IngredientModel->get_ingredients($id);

		if(empty($data['ingredient']))
		{
			show_404();
		}

		$this->form_validation->set_rules(
			'ingredient_name',
			'Nombre del Ingrediente.',
			'required|callback_check_ingredient_exists'
		);

		if($this->form_validation->run() === FALSE)
		{


			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('ingredients/edit', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->IngredientModel->edit_ingredient($id);
			$this->session->set_flashdata('message', 'El ingrediente ha sido actualizado.');
			redirect(base_url() . 'ingredients/index');
		}
	}





	public function delete($id = NULL)
	{
		$data['title'] = "Editar o Actualizar ingrediente.";
		$data['ingredient'] = $this->IngredientModel->get_ingredients($id);

		if(empty($data['ingredient']))
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
			$this->load->view('ingredients/delete', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->IngredientModel->delete_ingredient($id);
			$this->session->set_flashdata('message', 'El ingrediente ha sido eliminado.');
			redirect(base_url() . 'ingredients/index');
		}
	}






	public function create()
	{
		$data['title'] = "Nuevo tamaño.";

		$this->form_validation->set_rules(
			'size_name',
			'Nombre del Tamaño.',
			'required|callback_check_size_exists'
		);

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/workspace_start');
			$this->load->view('sizes/create', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->SizeModel->create_size();
			$this->session->set_flashdata('size_created', 'El tamaño ha sido creado.');
			redirect('sizes/new');
		}
	}





	function check_ingredient_exists($ingredient)
	{
		$this->form_validation->set_message('check_size_exists','El ingrediente ya se encuentra registrado.');

		if($this->SizeModel->check_size_exists($ingredient))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}

<?php
class Extras extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Extras.";
		$data['extras'] = $this->ExtraModel->get_extras();
		$data['ingredients'] = $this->IngredientModel->get_ingredients();
		$data['sizes'] = $this->SizeModel->get_sizes();

		$this->form_validation->set_rules('ingredient_id', 'Ingrediente.', 'required');

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
			$this->load->view('extras/index', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->ExtraModel->create_extra($data['sizes']);
			$this->session->set_flashdata('message', 'El extra ha sido creado.');
			redirect(base_url() . 'extras/index');
		}
	}


	public function edit($id = NULL)
	{
		$data['title'] = "Editar Extras.";
		$data['extras'] = $this->ExtraModel->get_extras();
		$data['ingredients'] = $this->IngredientModel->get_ingredients();
		$data['sizes'] = $this->SizeModel->get_sizes();
		$data['extra'] = $this->ExtraModel->get_extra($id);

		$this->form_validation->set_rules('ingredient_id', 'Ingrediente.', 'required');

		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('extras/edit', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->ExtraModel->edit_extra($id);
			$this->session->set_flashdata('message', 'El extra ha sido editado o actualizado.');
			redirect(base_url() . 'extras/index');
		}
	}


	public function delete($id = NULL)
	{
		$data['title'] = "Editar Extras.";
		$data['extras'] = $this->ExtraModel->get_extras();
		$data['ingredients'] = $this->IngredientModel->get_ingredients();
		$data['sizes'] = $this->SizeModel->get_sizes();
		$data['extra'] = $this->ExtraModel->get_extra($id);


		if(!isset($_POST['delete']))
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('extras/delete', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->ExtraModel->delete_extra($id);
			$this->session->set_flashdata('message', 'El extra ha sido eliminado.');
			redirect(base_url() . 'extras/index');
		}
	}


}

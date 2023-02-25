<?php
class Sizes extends MY_Controller
{
	public function index()
	{
		$data['title'] = "Tamaños.";
		$data['sizes'] = $this->SizeModel->get_sizes();

		$this->form_validation->set_rules(
			'size_name',
			'Nombre del Tamaño.',
			'required|callback_check_size_exists'
		);

		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('sizes/index', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->SizeModel->create_size();
			$this->session->set_flashdata('size_created', 'El tamaño ha sido creado.');
			redirect(base_url() . 'sizes/index');
		}
	}




	public function edit($id = NULL)
	{
		$data['title'] = "Editar o Actualizar Tamaños.";
		$data['size'] = $this->SizeModel->get_sizes($id);

		if($id === NULL)
		{
			show_404();
		}

		$this->form_validation->set_rules(
			'size_name',
			'Nombre del Tamaño.',
			'required|callback_check_size_exists'
		);

		if($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('sizes/edit', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->SizeModel->edit_size($id);
			$this->session->set_flashdata('message', 'El tamaño ha sido actualizado.');
			redirect(base_url() . 'sizes/index');
		}
	}




	public function delete($id = NULL)
	{
		$data['title'] = "Eliminar Tamaños.";
		$data['size'] = $this->SizeModel->get_sizes($id);

		if($id === NULL)
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
			$this->load->view('sizes/delete', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->SizeModel->delete_size($id);
			$this->session->set_flashdata('message', 'El tamaño ha sido eliminado.');
			redirect(base_url() . 'sizes/index');
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

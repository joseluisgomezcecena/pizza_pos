<?php
class Sales extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Reporte de ventas.";


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

}

<?php

class Cashiers extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Caja";
		$data['clients'] = $this->ClientModel->get();

		//load header, page & footer
		$this->load->view('templates/header');
		$this->load->view('templates/topnav');
		$this->load->view('cashiers/index', $data); //loading page and data
		$this->load->view('templates/footer_cashier');
	}



	public function addclient($param = NULL)
	{
		$data['title'] = "Agregar Cliente";
		$data['param'] = $param;

		$this->form_validation->set_rules('name', 'name', 'required');

		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong class="uppercase"><bdi>Error</bdi></strong> &nbsp;',
			'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
		);


		if ($this->form_validation->run() === FALSE)
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			//$this->load->view('templates/sidebar');
			//$this->load->view('templates/wrapper');
			$this->load->view('cashiers/add', $data); //loading page and data
			$this->load->view('templates/footer_cashier');
		}
		else
		{
			$client_id = $this->ClientModel->store();
			$this->session->set_flashdata('message', 'Se ha guardado el cliente.');

			if ($param == 'next')
			{
				redirect(base_url() . 'cashier/order/' . $client_id);
			}
			elseif ($param == 'new')
			{
				redirect(base_url() . 'cashiers/addclient/new');
			}
		}
	}


}

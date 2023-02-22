<?php
class Admins extends MY_Controller
{
	public function index()
	{
		$data['title'] = "Administrador.";

		$data['orders'] = $this->OrderModel->get_orders();
		$data['panels'] = $this->OrderModel->get_panels('today');
		$data['panels_month'] = $this->OrderModel->get_panels('month');

		$this->load->view('templates/header');
		$this->load->view('templates/topnav');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/wrapper');
		$this->load->view('admin/index', $data); //loading page and data
		$this->load->view('templates/footer');
	}

}

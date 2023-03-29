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

	public function view($id)
	{
		$data['controller'] = $this;

		$data['title'] = "Orden";
		$data['order_details'] = $this->OrderModel->get_order_items($id);
		$data['order'] = $this->OrderModel->get_single($id);


		$this->load->view('templates/header');
		$this->load->view('templates/topnav');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/wrapper');
		$this->load->view('admin/view_order', $data); //loading page and data
		$this->load->view('templates/footer');

	}


	public function get_extras($order, $item)
	{
		$data = $this->OrderModel->get_order_extras($order, $item);
		return $data;
	}

}

<?php
class Sales extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Reporte de ventas.";

		$start = $this->input->post('start');
		$end = $this->input->post('end');

		if(!isset($_POST['report']))
		{

			$data['orders'] = $this->OrderModel->report('' , '');

			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('sales/index', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$data['orders'] = $this->OrderModel->report($start, $end);
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('sales/index', $data); //loading page and data
			$this->load->view('templates/footer');
		}
	}

}

<?php
class Admins extends MY_Controller
{
	public function index()
	{
		$data['title'] = "Administrador.";

		$this->load->view('templates/header');
		$this->load->view('templates/topnav');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/wrapper');
		$this->load->view('admin/index', $data); //loading page and data
		$this->load->view('templates/footer');
	}

}

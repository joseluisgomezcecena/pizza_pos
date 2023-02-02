<?php
class Orders extends  CI_Controller
{

	public function createOrder($id)
	{
		$order_no = $this->OrderModel->newOrder($id);
		redirect(base_url() . 'cashier/order/items/' . $order_no);
	}


	public function neworder($id = NULL)
	{

		$data['items'] = $this->ProductModel->getall();
		$data['client'] = $this->ClientModel->get_client_by_order($id);
		$data['order'] = $id;

		//load header, page & footer
		$this->load->view('templates/header');
		$this->load->view('templates/topnav');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/wrapper');
		$this->load->view('orders/index', $data); //loading page and data
		$this->load->view('templates/footer');
	}



	public function detail($item, $order)
	{
		$data['item'] = $this->ProductModel->get($item);
		$data['sizes'] = $this->ProductModel->getsizes($item);
		$data['ingredients'] = $this->ProductModel->getingredients($item);
		$data['client'] = $this->ClientModel->get_client_by_order($order);
		$data['extras'] = $this->ProductModel->getallingredients();
		$data['order'] = $order;


		//inputs
		$size = $this->input->post('size');
		$item = $this->input->post('item');
		$order = $this->input->post('order');
		$qty = $this->input->post('qty');
		$extras = $this->input->post('extras[]');

		$this->form_validation->set_rules('size', 'Tamaño', 'required');
		$this->form_validation->set_rules('qty', 'Cantidad', 'required');


		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong class="uppercase"><bdi>Error</bdi></strong> &nbsp;',
			'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
		);


		if ($this->form_validation->run() === FALSE)
		{

			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('orders/detail', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->OrderModel->newOrderItem($size, $item, $order, $qty, $extras);
			redirect(base_url() . 'cashier/order/items/' . $order);
		}
	}


	public function addtoorder($item, $order)
	{


		$data['title'] = "Orden";

		$size = $this->input->post('size');
		$item = $this->input->post('item');
		$order = $this->input->post('order');
		$qty = $this->input->post('qty');
		$extras = $this->input->post('extras');

		$this->form_validation->set_rules('size', 'Tamaño', 'required');
		$this->form_validation->set_rules('qty', 'Cantidad', 'required');


		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong class="uppercase"><bdi>Error</bdi></strong> &nbsp;',
			'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
		);


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/wrapper');
			$this->load->view('orders/detail', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{

		}

		/*
		$size = $this->input->post('size');
		$item = $this->input->post('item');
		$order = $this->input->post('order');
		$qty = $this->input->post('qty');
		$extras = $this->input->post('extras');
		$price = $this->ProductModel->getprice($size);
		$price = $price['price'];
		$price = $price * $qty;
		$extras_price = 0;
		$extras_name = '';
		if ($extras) {
			foreach ($extras as $extra) {
				$extras_price += $this->ProductModel->getingredientprice($extra);
				$extras_name .= $this->ProductModel->getingredientname($extra) . ', ';
			}
		}
		$price += $extras_price;
		$extras_name = rtrim($extras_name, ', ');
		$this->OrderModel->addtoorder($order, $item, $size, $qty, $price, $extras_name);
		redirect(base_url() . 'cashier/order/items/' . $order);
		*/
	}


















	//controller for ajax call and get price
	public function getprice()
	{
		$size = $this->input->post('size');
		//$item = $this->input->post('item');
		//$price = $this->ProductModel->getprice($size, $item);
		$price = $this->ProductModel->getprice($size);

		//return  json_encode($price);
		echo $price;
	}

	public function getextraprice()
	{
		$ingredient = $this->input->post('ingredient');
		$price = $this->ProductModel->getextraprice($ingredient);
		echo $price;
	}


}

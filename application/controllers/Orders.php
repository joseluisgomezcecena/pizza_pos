<?php
class Orders extends  CI_Controller
{

	//creating an order on button click and redirecting to order detail.
	public function createOrder($id)
	{
		$order_no = $this->OrderModel->newOrder($id);
		redirect(base_url() . 'cashier/order/items/' . $order_no);
	}



	public function neworder($order = NULL)
	{

		$data['controller'] = $this;

		$item = null;
		$data['items'] = $this->ProductModel->getall();
		$data['client'] = $this->ClientModel->get_client_by_order($order);
		$data['order_details'] = $this->OrderModel->get_order_items($order);

		if(!empty($data['order_details']))
		{
			$item = $data['order_details'][0]['item_id'];
		}


		$data['order_extras'] = $this->OrderModel->get_order_extras($order, $item);

		$data['order'] = $order;

		//load header, page & footer
		$this->load->view('templates/header');
		$this->load->view('templates/topnav');
		//$this->load->view('templates/sidebar');
		//$this->load->view('templates/wrapper');
		$this->load->view('orders/index', $data); //loading page and data
		$this->load->view('templates/footer_cashier');
	}



	public function detail($item, $order)
	{
		$data['item'] = $this->ProductModel->get($item);
		$data['sizes'] = $this->ProductModel->getsizes($item);
		$data['ingredients'] = $this->ProductModel->getingredients($item);
		$data['client'] = $this->ClientModel->get_client_by_order($order);
		//$data['extras'] = $this->ProductModel->getallingredients();
		$data['extras'] = $this->IngredientModel->get_crusts();
		$data['order'] = $order;
		$data['item_id'] = $item;


		//inputs
		$size = $this->input->post('size');
		//$item = $this->input->post('item');
		//$order = $this->input->post('order');
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
			//$this->load->view('templates/sidebar');
			//$this->load->view('templates/wrapper');
			$this->load->view('orders/detail', $data); //loading page and data
			$this->load->view('templates/footer_cashier');
		}
		else
		{
			$this->OrderModel->newOrderItem($size, $item, $order, $qty, $extras);
			redirect(base_url() . 'cashier/order/items/' . $order);
		}
	}


	public function edit($item, $order)
	{
		$data['item'] = $this->ProductModel->get($item);



		$this->form_validation->set_rules('size', 'Tamaño', 'required');
		$this->form_validation->set_rules('qty', 'Cantidad', 'required');
	}


	public function up($order, $order_item)
	{
		$data['title'] = 'Agregar elemento.';

		if(isset($_POST['up']))
		{
			$this->OrderModel->up($order_item);
			redirect(base_url() . 'cashier/order/items/' . $order);
		}
		else
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('orders/index', $data); //loading page and data
			$this->load->view('templates/footer_cashier');
		}
	}


	public function down($order,$order_item)
	{
		$data['title'] = 'Descontar elemento.';

		if(isset($_POST['down']))
		{
			$this->OrderModel->down($order_item);
			redirect(base_url() . 'cashier/order/items/' . $order);
		}
		else
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('orders/index', $data); //loading page and data
			$this->load->view('templates/footer_cashier');
		}
	}


	public function remove($order,$order_item)
	{
		$data['title'] = 'Eliminar elemento.';

		if(isset($_POST['remove']))
		{
			$this->OrderModel->delete($order_item);
			redirect(base_url() . 'cashier/order/items/' . $order);
		}
		else
		{
			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');
			$this->load->view('orders/index', $data); //loading page and data
			$this->load->view('templates/footer_cashier');
		}
	}





	public function get_extras($order, $item)
	{
		$data = $this->OrderModel->get_order_extras($order, $item);
		return $data;
	}





	//controller for ajax call and get price
	public function getprice()
	{
		$size = $this->input->post('size');
		$item = $this->input->post('item');

		//$price = $this->ProductModel->getprice($size, $item);
		$price = $this->OrderModel->getprice($size, $item);

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

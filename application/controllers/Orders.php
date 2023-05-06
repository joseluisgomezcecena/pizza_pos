<?php
class Orders extends  CI_Controller
{

	//creating an order on button click and redirecting to order detail.
	public function createOrder($id)//passing client id
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
		$data['deliveries'] = $this->ShippingModel->get_deliveries();

		if(!empty($data['order_details']))
		{
			$item = $data['order_details'][0]['item_id'];
		}


		$data['order_extras'] = $this->OrderModel->get_order_extras($order, $item);

		$data['order'] = $order;

		//load header, page & footer
		$this->load->view('templates/header');
		$this->load->view('templates/topnav');
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

		$is_pizza = $data['item']['is_pizza'];


		//inputs
		$size = $this->input->post('size');
		//$item = $this->input->post('item');
		//$order = $this->input->post('order');
		$qty = $this->input->post('qty');
		$extras = $this->input->post('extras[]');



		if($is_pizza == 0)
		{
			$this->form_validation->set_rules('qty', 'Cantidad', 'required');
		}
		else
		{
			$this->form_validation->set_rules('size', 'Tamaño', 'required');
			$this->form_validation->set_rules('qty', 'Cantidad', 'required');
		}



		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong class="uppercase"><bdi>Error</bdi></strong> &nbsp;',
			'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
		);


		if ($this->form_validation->run() === FALSE)
		{

			//load header, page & footer
			$this->load->view('templates/header');
			$this->load->view('templates/topnav');

			if ($is_pizza == 0)
			{
				$this->load->view('orders/detail_side', $data); //loading page and data
			}
			else
			{
				$this->load->view('orders/detail', $data); //loading page and data
			}

			//$this->load->view('orders/detail', $data); //loading page and data

			$this->load->view('templates/footer_cashier');
		}
		else
		{
			$this->OrderModel->newOrderItem($size, $item, $order, $qty, $extras, $is_pizza);
			redirect(base_url() . 'cashier/order/items/' . $order);
		}
	}



	public function end_and_print($order, $source = NULL)
	{
		if(isset($_POST['end']))
		{

			if($source == "cashier")
			{
				$data['link'] = "cashier";
			}
			else
			{
				$data['link'] = "admin";
			}


			$data['controller'] = $this;
			$item = null;
			$data['items'] = $this->ProductModel->getall();
			$data['client'] = $this->ClientModel->get_client_by_order($order);
			$data['order_details'] = $this->OrderModel->get_order_items($order);
			$data['order_data'] = $this->OrderModel->get_single($order);

			if($this->input->post('shipping_total') != NULL)
			{
				$data['shipping_price'] = $this->input->post('shipping_total');
			}
			else
			{
				$data['shipping_price'] = 0;
			}


			if(!empty($data['order_details']))
			{
				$item = $data['order_details'][0]['item_id'];
			}


			$data['order_extras'] = $this->OrderModel->get_order_extras($order, $item);
			$data['order'] = $order;

			if($data['order_data']['order_closed'] == 0)//only update status if order is not closed.
			{
				$this->OrderModel->end_order($order);
			}


			//load views
			$this->load->view('templates/header_print');
			$this->load->view('orders/receipt', $data); //loading page and data
		}
		else
		{
			redirect(base_url() . 'cashier/order/items/' . $order);
		}
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

<?php

class Auth extends CI_Controller{

	public function login()
	{

		$data['title'] = 'Inicia Sessión | Pizza POS v1.0.';

		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error de autenticación: &nbsp;</strong>',
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'
		);

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header',$data);
			$this->load->view('auth/login', $data); //loading page and data
			$this->load->view('templates/footer_wide');
		}
		else
		{
			//Encrypt password
			$username = $this->input->post('username');
			$password = $this->input->post('password');


			$data = $this->UserModel->login($username, $password);

			if($data)
			{
				//create session
				$session_data = array(
					'data'=>$data,
					'user_name'=>$username,
					'logged_in'=>true,
				);

				$this->session->set_userdata($session_data);


				//session message
				$this->session->set_flashdata('login_success', 'Has iniciado sesión.');
				redirect(base_url() . 'admin');
			}
			else
			{
				//session message
				$this->session->set_flashdata('errors', 'Usuario o contraseña incorrectas.');
				redirect(base_url() . 'auth/login');
			}
		}

	}



	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('data');
		$this->session->unset_userdata('user_name');

		//session message
		$this->session->set_flashdata('user_logged_out', 'You have logged out.');
		redirect(base_url());
	}




	public function register()
	{
		$data['title'] = 'Registro de inspeccion final';
		$data['departments'] = $this->InsertPartsModel->get_departments();

		$this->form_validation->set_rules('user_name', 'Usuario o Firma Martech', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');
		$this->form_validation->set_rules('user_martech_number', 'Numero de usuario', 'required');
		$this->form_validation->set_rules('user_department_id', 'Department', 'required');

		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong class="uppercase"><bdi>Error!: </bdi></strong> &nbsp;',
			'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
		);


		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			//Encrypt password
			$encrypted_pwd = password_hash($this->input->post('password'), PASSWORD_DEFAULT);



			$this->UserModel->register($encrypted_pwd);


			//session message
			$this->session->set_flashdata('user_registered', 'You can now login.');

			redirect(base_url() . 'users/register');
		}

	}




	public function profile()
	{
		$data['title'] = 'Profile';

		$user_array  = $this->session->userdata('user_id');
		$user_id = $user_array['id'];

		$data['user'] = $this->UserModel->get_user($user_id);

		//validation style
		$this->form_validation->set_error_delimiters(
			'<div class="alert alert_danger mb-5"><strong class="uppercase">Error: </strong>',
			'<button type="button" class="dismiss la la-times" data-dismiss="alert"></button></div>'
		);


		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'User Name', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('phone', 'Mobile Number', 'callback_check_phone_exists');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'matches[password]');


		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('users/profile', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			//file uploads
			$config['upload_path'] = './assets/uploads/users';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '2048';
			$config['max_width'] = '2500';
			$config['max_height'] = '2500';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload())
			{
				$errors = array('error'=>$this->upload->display_errors());
				//$post_image = 'noimage.jpg';
				$uploaded = 0;
			}
			else
			{
				$data = array('upload_data'=>$this->upload->data());
				$post_image = $_FILES['userfile']['name'];
				$uploaded = 1;
			}

			//encrypting passwords
			$encrypted_pwd = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$this->UserModel->edit_profile($post_image, $uploaded, $user_id, $encrypted_pwd);
			redirect(base_url() . 'posts');

		}


	}


	public function get_user($id)
	{
		$user_array  = $this->session->userdata('user_id');
		$id = $user_array['id'];
		$data['user'] = $this->UserModel->get_user($id);
	}


	function check_username_exists($username)
	{
		$this->form_validation->set_message('check_username_exists','That username is taken. Please choose a different one.');

		if($this->UserModel->check_username_exists($username))
		{
			return true;
		}
		else
		{
			return false;
		}
	}



	function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists','That email is taken. Please choose a different one.');

		if($this->UserModel->check_email_exists($email))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function check_phone_exists($phone)
	{
		$this->form_validation->set_message('check_phone_exists','That phone number is taken. Please choose a different one.');

		if($this->UserModel->check_phone_exists($phone))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}

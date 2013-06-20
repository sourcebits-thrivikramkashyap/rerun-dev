<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{						
		$this->load->view('login');
//		$this->load->view('welcome_message');
	}
	
	public function login()
	{	
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');			
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[40]');
		$this->form_validation->set_rules('password', 'Password', 'required');		

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			$login_details = array(
						'email' => $_POST['email'],
						'password' => $_POST['password']		
			);
		
			$this->load->model('login_model');
			$success = $this->login_model->login($login_details);

			if($success)
			{
				$this->load->helper('url');		
				redirect('/dashboard');	
			}
			else
			{
				$this->load->view('login');
			}
				
		}
			
	}
	
	public function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->helper('url');		
		redirect('/welcome/index');
	}
	
	public function register()
	{
		$this->load->view('register');
	}
	
	public function register_process()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');		
		$this->form_validation->set_rules('password_confirm', 'Password', 'required');	

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register');
		}
		else
		{
			$details = array(
						'email' => $_POST['email'],
						'password' => $_POST['password'],
						'password_confirm' => $_POST['password_confirm']		
			);
		
			$this->load->model('register_model');
			$success = $this->register_model->register($details);
			
			if($success)
			{
				redirect('/dashboard');	
			}
			else
			{
				$this->load->view('register');
			}				
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
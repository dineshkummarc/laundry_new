<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/*
 *	@author 	: Red Planet Computer Team
 *	date		: 07 June, 2017
 *	Laundry Management Application
 *	rpcits2013@gmail.com
 */
 
	public function __construct()
    {   parent::__construct();
        $this->load->helper(array('form','url','html'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
		$this->load->model('login_model');
      	$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Sat, 11 Jun 1983 05:00:00 GMT");
		
    }
	
	public function index()
	{			
		$this->load->view('login');
	}
	
	public function rediract()
	{	// get form input
		$UserName=$this->input->post('username');
		$Password=$this->input->post('password');
		
		$uresult = $this->login_model->get_user($UserName, $Password);
		
		if (count($uresult) > 0)
		{	
			//echo "Login Successfully ==> Redirecting";
			$this->session->set_userdata('admin_login', 1);
			if ($this->session->userdata('admin_login') == 1)
			{ ?> <script> alert("Administration Login Successfully \nRedirecting Dashboard ..."); </script> <?php	
			redirect('admin/index','refresh');
			}
		}
		else
		{	$this->session->set_userdata('admin_login', 0);
			echo "<script> alert('Username and Password Invalid...'); </script>"; 	
            redirect('login/index','refresh');
			//echo "Error :";
		}


	}

	function logout() {
        $this->session->set_userdata('admin_login', 0);
		$this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
		?>
			<script> alert("Your are Logging Out"); </script>
		<?php
		redirect('login/index','refresh');
    }
}

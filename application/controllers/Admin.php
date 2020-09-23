<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/*
 *	@author 	: Red Planet Computer Team
 *	date		: 30 May, 2017
 *	Laundry Management Application
 *	rpcits2013@gmail.com
 
	 * This source code not use without licenses and permission for Red Planet Computers. http://laundry.rpcits.co.in 
	*/
 
	public function __construct()
    {   parent::__construct();
        $this->load->helper(array('form','url','html'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
      	$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Sat, 11 Jun 1983 05:00:00 GMT");
		
    }
	
	public function index()
	{	if ($this->session->userdata('admin_login') == 0) redirect('login/logout');
		$this->session->set_userdata('menu','dashboard');
		
		$this->db->from('customer_order');
		$this->db->order_by("total_paid", "desc");
		$desktop['order_data'] = $this->db->get();
		
		$desktop['userdata'] = $this->db->get('users');
		$desktop['today']=date('d-m-Y');
		$this->load->view('admin/header');
		$this->load->view('admin/main',$desktop);
		$this->load->view('admin/footer');
	}
	
	
	// Customer Controller = = >
	
	function customers()
	{	
		if ($this->session->userdata('admin_login') == 0) redirect('login/logout');
		
		$this->session->set_userdata('menu','master');
		$this->session->set_userdata('submenu','customers');
		$data['userdata'] = $this->db->get('users');
		$data['last_id']=0;	
		$result=$this->db->select('*')->from('users')->order_by('id',"desc")->limit(1)->get()->result();
		if (count($result) > 0)	$data['last_id'] = $result[0]->id;
		$this->load->view('admin/users',$data);
	}
	
	// customer Profile Controller --->
	
	function customer_profile($CustID='')
	{	if ($this->session->userdata('admin_login') == 0) redirect('login/logout');
		
		$this->session->set_userdata('menu','master');
		$this->session->set_userdata('submenu','customers');
		
		$UserID=$CustID;
		$data['userdata'] = $this->db->get_where('users' , array('id' => $UserID) );
		
		//$data['userdata'] = $this->db->get('users');
		$this->load->view('admin/customer_profile',$data);
		
	}
	
	
	function customer_crud($param1='', $param2='')
	{	if($param1=='create')
		{	$join_date=$this->input->post('join_date');
			$first_name=ucwords($this->input->post('first_name'));
			$last_name=ucwords($this->input->post('last_name'));
			$email_id=$this->input->post('email');
			$phone=$this->input->post('phone');
			$daddress=$this->input->post('address');
			$password=$this->input->post('password');
			$status=$this->input->post('status');
			
			$customer_data = array('join_date' => $join_date, 'first_name' => $first_name, 'last_name' => $last_name, 'address' => $daddress, 'email_id' => $email_id, 'mobile' => $phone, 'password' => $password, 'status' => $status);
			if($this->db->insert('users', $customer_data)===TRUE)		// using direct parameter
			{
			?>
			<script> alert("Record Added Successfully"); </script>
			<?php
			redirect('admin/customers','refresh');
			}	
		}
		
		if($param1=='do_update')
		{	$query['custmoer_edit'] = $this->db->get_where('users' , array('id' => $param2) )->result();
			$this->load->view('admin/customer_update',$query);
		}
		
		
				
		if($param1=='delete')
		{	echo '<script> alert(" Record Deleted Successfully"); </script>';
			
			redirect('admin/customers','refresh');
				
		}
	}
	
		
	
	
	
	// Employee Controller = = >
	
	function employer()
	{
		if ($this->session->userdata('admin_login') == 0) redirect('login/logout');
		
		$this->session->set_userdata('menu','master');
		$this->session->set_userdata('submenu','employee');
		$data['empdata'] = $this->db->get('employee');
		$data['last_id']=0;	
		$result=$this->db->select('*')->from('employee')->order_by('emp_id',"desc")->limit(1)->get()->result();
		if (count($result) > 0)	$data['last_id'] = $result[0]->emp_id;
		$this->load->view('admin/employee',$data);
	}
	
	function employee_crud($param1='', $param2='')
	{	if($param1=='new')
		{	$join_date=$this->input->post('join_date');
			$first_name=ucwords($this->input->post('first_name'));
			$last_name=ucwords($this->input->post('last_name'));
			$email_id=$this->input->post('email');
			$gender=$this->input->post('gender');
			$birth_date=$this->input->post('birth_date');
			$phone=$this->input->post('phone');
			$address=$this->input->post('address');
			$password=$this->input->post('password');
			$status=$this->input->post('status');
			
			$database_data = array('join_date' => $join_date, 'first_name' => $first_name, 'last_name' => $last_name, 'mobile' => $phone, 'email_id' => $email_id, 'address' => $address,  'birth_date' => $birth_date,  'gender' => $gender, 'password' => $password, 'status' => $status);
			if($this->db->insert('employee', $database_data)===TRUE)		// using direct parameter
			{
			?>
			<script> alert("Employee Added Successfully"); </script>
			<?php
			redirect('admin/employer','refresh');
			}	
		}
		
		if($param1=='do_update')
		{	$query['employee_edit'] = $this->db->get_where('employee' , array('emp_id' => $param2) )->result();
			$this->load->view('admin/employee_update',$query);
		}
		
				
		if($param1=='delete')
		{	
			echo '<script> alert(" Record Deleted Successfully"); </script>';
			redirect('admin/employer','refresh');
				
		}
	}
	
	// Cloth Controller ==>
	function cloth_type()
	{	if ($this->session->userdata('admin_login') == 0) redirect('login/logout');
		$this->session->set_userdata('menu','master');
		$this->session->set_userdata('submenu','cloths');
		$data['cloth'] = $this->db->get('cloths');
		$data['last_id']=0;	
		$result=$this->db->select('*')->from('cloths')->order_by('id',"desc")->limit(1)->get()->result();
		if (count($result) > 0)	$data['last_id'] = $result[0]->id;
		$this->load->view('admin/cloth',$data);
	}
	
	function cloth_crud($param1='', $param2='')
	{	if($param1=='create')
		{	$cloth_type=$this->input->post('cloth_name');
			$cloth_code=$this->input->post('cloth_code');
			$data = array('cloth_type' => $cloth_type, 'cloth_code' => $cloth_code );
			if($this->db->insert('cloths', $data)===TRUE)		// using direct parameter
			{
			?>
			<script> alert(" Record Added Successfully"); </script>
			<?php
			redirect('admin/cloth_type','refresh');
			}	
		}
		
		if($param1=='do_update')
		{	$query['cloths_edit'] = $this->db->get_where('cloths' , array('id' => $param2) )->result();
			$this->load->view('admin/cloths_update',$query);
		}
		
		
		if($param1=='delete')
		{	echo '<script> alert(" Record Deleted Successfully"); </script>';
			redirect('admin/cloth_type','refresh');
				
		}
	}
	
	// Expeses Type Controller ==>
	
	function expenses_type()
	{	if ($this->session->userdata('admin_login') == 0) redirect('login/logout');
		$this->session->set_userdata('menu','master');
		$this->session->set_userdata('submenu','expensestype');
		$data['expenstype'] = $this->db->get('expense_type');
		$data['last_id']=0;	
		$result=$this->db->select('*')->from('expense_type')->order_by('exps_id',"desc")->limit(1)->get()->result();
		if (count($result) > 0)	$data['last_id'] = $result[0]->exps_id;
		$this->load->view('admin/expenses_type',$data);
	}
	
	function expenses_crud($param1='', $param2='')
	{	if($param1=='create')
		{	$expse_type=$this->input->post('expse_type');
			$expse_code=$this->input->post('expse_code');
			$data = array('exps_type' => $expse_type, 'exps_code' => $expse_code );
			if($this->db->insert('expense_type', $data)===TRUE)		// using direct parameter
			{
			?>
			<script> alert(" Record Added Successfully"); </script>
			<?php
			redirect('admin/expenses_type','refresh');
			}	
		}
		
		if($param1=='do_update')
		{	$query['exps_edit'] = $this->db->get_where('expense_type' , array('exps_id' => $param2) )->result();
			$this->load->view('admin/exps_type_update',$query);
		}
		
		
		if($param1=='delete')
		{	echo '<script> alert(" Record Deleted Successfully"); </script>';
			redirect('admin/expenses_type','refresh');
				
		}
	}

	// Services Controller ==>
	function laundry_services()
	{	if ($this->session->userdata('admin_login') == 0) redirect('login/logout');
		$this->session->set_userdata('menu','master');
		$this->session->set_userdata('submenu','services');
		$data['service'] = $this->db->get('services');
		$data['last_id']=0;	
		$result=$this->db->select('*')->from('services')->order_by('id',"desc")->limit(1)->get()->result();
		if (count($result) > 0)	$data['last_id'] = $result[0]->id;
		$this->load->view('admin/services',$data);
	}
	
	function service_crud($param1='', $param2='')
	{	if($param1=='create')
		{	$service_name=$this->input->post('service_name');
			$service_code=$this->input->post('service_code');
			$data = array('service_name' => $service_name, 'service_code' => $service_code );
			if($this->db->insert('services', $data)===TRUE)		// using direct parameter
			{
			?>
			<script> alert(" Record Added Successfully"); </script>
			<?php
			redirect('admin/laundry_services','refresh');
			}	
		}
		
		if($param1=='do_update')
		{	$Serviice['service_edit'] = $this->db->get_where('services' , array('id' => $param2) )->result();
			$this->load->view('admin/service_update',$Serviice);
		}
		
				
		if($param1=='delete')
		{	echo '<script> alert(" Record Deleted Successfully"); </script>';
			redirect('admin/laundry_services','refresh');
				
		}
	}
	
	
	// Assing Cloth Service Prices --->
	
	function cloth_prices()
	{	if ($this->session->userdata('admin_login') == 0) redirect('login/logout');
		$this->session->set_userdata('menu','master');
		$this->session->set_userdata('submenu','pricelist');
		
		$this->load->view('admin/price_list');
	}
	
	// Exepnsese List ----------->
	
	function expenses()
	{	if ($this->session->userdata('admin_login') == 0) redirect('login/logout');
		$this->session->set_userdata('menu','job_order');
		$this->session->set_userdata('submenu','expenses');
		$data['expensetype'] = $this->db->get('expense_type');
		$data['expenses'] = $this->db->get('expenses');
		$data['last_id']=0;	
		$result=$this->db->select('*')->from('expenses')->order_by('exp_id',"desc")->limit(1)->get()->result();
		if (count($result) > 0)	$data['last_id'] = $result[0]->exp_id;
		$this->load->view('admin/expenses_list',$data);
	}
	
	function expense_crud($param1='', $param2='')
	{	if($param1=='create')
		{	$ExpDate=$this->input->post('exp_date');
			$PayeeName=$this->input->post('payee_name');
			$ExpType=$this->input->post('exp_type');
			$ExpAmt=$this->input->post('exp_amt');
			$ExpAmtPaidBy=$this->input->post('exp_amt_paid_by');
			$ExpChequeNo=$this->input->post('exp_cheque_no');
			$ExpChequeDate=$this->input->post('exp_cheque_date');
			$ExpRemark=$this->input->post('exp_remark');
			
			$data = array('exps_date' => $ExpDate, 'exp_payee_name' => $PayeeName, 'exp_type' => $ExpType, 'exp_amt' => $ExpAmt, 'exp_paidby' => $ExpAmtPaidBy, 'exp_chequeno' => $ExpChequeNo, 'exp_cheque_date' => $ExpChequeDate, 'exp_remarks' => $ExpRemark );
			if($this->db->insert('expenses', $data)===TRUE)		// using direct parameter
			{
			?>
			<script> alert(" Record Added Successfully"); </script>
			<?php
			redirect('admin/expenses','refresh');
			}	
		}
		
		if($param1=='do_update')
		{	
			$query['expensetype'] = $this->db->get('expense_type');
			$query['expenses_edit'] = $this->db->get_where('expenses' , array('exp_id' => $param2) )->result();
			$this->load->view('admin/expenses_edit',$query);
		}
		
		
		
		if($param1=='delete')
		{	echo '<script> alert(" Record Deleted Successfully"); </script>';
			redirect('admin/expenses','refresh');
				
		}
	}
	
	
	// Admin Profile Controller --->
	
	function profile()
	{	if ($this->session->userdata('admin_login') == 0) redirect('login/logout');
		$this->session->set_userdata('menu','settings');
		$this->session->set_userdata('submenu','adminprofile');
		$data['admindata'] = $this->db->get('admin');
		$this->load->view('admin/admin_profile',$data);
		
	}
	
	function edit_profile($id="")
	{	
		$data['admindata'] = $this->db->get('admin');
		$this->load->view('admin/edit_profile',$data);
		
	}
}	
	
	
	
	
	
	
	
		

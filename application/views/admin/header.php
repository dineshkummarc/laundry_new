<?php
$active_menu=$this->session->userdata('menu');
$active_submenu=$this->session->userdata('submenu');
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Laundry Management Application</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		
		
		<!-- page specific plugin styles -->
		
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.min.css" />
		
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" />
		
		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />
		
		
		
		

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		
		<script src="<?php echo base_url();?>assets/js/ace-extra.min.js"></script>
		

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url();?>assets/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<!-- Order Model -->
		
	<script type="text/javascript">
		 
		 
	function DateOrderModal(url)
	{
		// SHOWING AJAX PRELOADER IMAGE
		jQuery('#modal_order_date .modal-body').html('<div style="text-align:center;margin-top:50px;"><img src="<?php echo base_url(); ?>/assets/preloader.gif" /></div>');
		
		// LOADING THE AJAX MODAL
		jQuery('#modal_order_date').modal('show', {backdrop: 'true'});
		
		// SHOW AJAX RESPONSE ON REQUEST SUCCESS
		$.ajax({
			url: url,
			success: function(response)
			{
				jQuery('#modal_order_date .modal-body').html(response);
			}
		});
	}
	</script>
	
			


		
	<body class="no-skin">
				<!-- (Ajax Modal)-->
			<div class="modal fade" id="modal_order_date">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header" style="background:#fbeed5;" >
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><?php echo "Add Item "; ?></h4>
						</div>
						
						<div class="modal-body" style="height:500px; overflow:auto;">
						
							
							
						</div>
					   <!-- 
						<div class="modal-footer" style="background:#fbeed5;">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
						-->
					</div>
				</div>
			</div>
			
				<!------------------>	
		
	
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-truck"></i>
							Laundry Management
						</small>
					</a>
				</div>

				</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						
							<a class="btn btn-success" href="<?php echo base_url();?>index.php/admin/customer_orders/invoice_list"> 
								<i class="ace-icon fa fa-list-ol" title="Orders" style="color:white;"></i>
							</a>	
						

						
							<a class="btn btn-info" href="<?php echo base_url();?>index.php/admin/customers"> 
							<i class="ace-icon fa fa-users" title="Customers" style="color:white;"></i>
							</a>
						
					
							<a class="btn btn-warning" href="<?php echo base_url();?>index.php/admin/cloth_prices"> 
							<i class="ace-icon fa fa-inr" title="Price_List" style="color:white;"></i>
							</a>
					

						
							<a class="btn btn-danger" href="<?php echo base_url();?>index.php/admin/orderreport/date_view"> 
							<i class="ace-icon fa fa-file-o" title="Reports" style="color:white;"></i>
							</a>
						
						

						
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="<?php if($active_menu=='dashboard') echo "active"; ?>">
						<a href="<?php echo base_url();?>index.php/welcome">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php if($active_menu=='master') echo "active open"; ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Master
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							<li class="<?php if($active_submenu=='customers') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/customers">
									<i class="menu-icon fa fa-caret-right"></i>
									Customer
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if($active_submenu=='employee') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/employer">
									<i class="menu-icon fa fa-caret-right"></i>
									Employee
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if($active_submenu=='cloths') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/cloth_type">
									<i class="menu-icon fa fa-caret-right"></i>
									Cloth Type
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="<?php if($active_submenu=='services') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/laundry_services">
									<i class="menu-icon fa fa-caret-right"></i>
									Laundry Services
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if($active_submenu=='pricelist') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/cloth_prices">
									<i class="menu-icon fa fa-caret-right"></i>
									Price List
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="<?php if($active_submenu=='expensestype') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/expenses_type">
									<i class="menu-icon fa fa-caret-right"></i>
									Expenses Type
								</a>

								<b class="arrow"></b>
							</li>
							
							
							</ul>
					</li>

					<li class="<?php if($active_menu=='job_order') echo "active open"; ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Job Order </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<!--
							<li class="<?php if($active_submenu=='neworder') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/customer_orders/neworder">
									<i class="menu-icon fa fa-caret-right"></i>
									New Orders
								</a>

								<b class="arrow"></b>
							</li> -->
							
							<li class="<?php if($active_submenu=='invoicelist') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/cloth_prices">
									<i class="menu-icon fa fa-caret-right"></i>
									Orders List
								</a>

								<b class="arrow"></b>
							</li>
							

							<li class="<?php if($active_submenu=='expenses') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/expenses">
									<i class="menu-icon fa fa-caret-right"></i>
									Expenses
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="<?php if($active_menu=='reports') echo "active open"; ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Reports </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if($active_submenu=='daterep') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/cloth_prices">
									<i class="menu-icon fa fa-caret-right"></i>
									Datewise Orders
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if($active_submenu=='monthrep') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/cloth_prices">
									<i class="menu-icon fa fa-caret-right"></i>
									Monthly Orders 
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>

					
					<li class="<?php if($active_menu=='settings') echo "active open"; ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text"> Settings </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url();?>index.php/admin/cloth_prices">
									<i class="menu-icon fa fa-caret-right"></i>
									System Settings
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Bulk Email, SMS
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="<?php if($active_submenu=='adminprofile') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/profile">
									<i class="menu-icon fa fa-caret-right"></i>
									Admin Profile
								</a>

								<b class="arrow"></b>
							</li>

							

						</ul>
						
					</li>
					
					<li>
					<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Group and Roles </span>

							<b class="arrow fa fa-angle-down"></b>
							</a>
							
					<ul class="submenu">
							
						
							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Groups
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="<?php if($active_submenu=='adminprofile') echo "active"; ?>">
								<a href="<?php echo base_url();?>index.php/admin/cloth_prices">
									<i class="menu-icon fa fa-caret-right"></i>
									Role / Permission
								</a>

								<b class="arrow"></b>
							</li>

							

						</ul>
					</li>	
					
					<li class="">
						<a href="<?php echo base_url();?>index.php/login/logout">
							<i class="menu-icon glyphicon glyphicon-log-out"></i>
							<span class="menu-text"> Log Out </span>
						</a>

						<b class="arrow"></b>
					</li>

					

					</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			

  
		
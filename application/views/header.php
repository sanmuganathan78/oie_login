<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>UCARA</title>

	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />	
	<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fontawesome/font-awesome.min.css">

	<!-- custom css  -->
	<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />

</head>
<body class="theme-dark">
	<header class="header navbar navbar-fixed-top" role="banner">
		<div class="container">
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
			</ul>
			<a class="navbar-brand" href="">
				<img src="" alt="" />
				<strong style="font-size:14px;">UCARA</strong>
			</a>
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>
			</a>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-male"></i>
						<span class="username"></span>
						<i class="icon-caret-down small"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url();?>login/logout"><i class="icon-key"></i> Log Out</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</header> <!-- /.header -->
	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<div class="sidebar-search-results">
					<i class="icon-remove close"></i>
					<div class="title">
						Documents
					</div>
					<ul class="notifications">
						<li>
							<a href="javascript:void(0);">
								<div class="col-left">
									<span class="label label-info"><i class="icon-file-text"></i></span>
								</div>
								<div class="col-right with-margin">
									<span class="message"><strong>John Daoe</strong> received $1.527,32</span>
									<span class="time">finances.xls</span>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0);">
								<div class="col-left">
									<span class="label label-success"><i class="icon-file-text"></i></span>
								</div>
								<div class="col-right with-margin">
									<span class="message">My name is <strong>John Doe</strong> ...</span>
									<span class="time">briefing.docx</span>
								</div>
							</a>
						</li>
					</ul>
					<div class="title">
						Persons
					</div>
					<ul class="notifications">
						<li>
							<a href="javascript:void(0);">
								<div class="col-left">
									<span class="label label-danger"><i class="icon-female"></i></span>
								</div>
								<div class="col-right with-margin">
									<span class="message">Jane <strong>Doe</strong></span>
									<span class="time">21 years old</span>
								</div>
							</a>
						</li>
					</ul>
				</div> <!-- /.sidebar-search-results -->
				<ul id="nav">
					<li class="current">
						<a href="<?php echo base_url();?>dashboard">
							<i class="icon-dashboard"></i>
							Dashboard
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>customer">
							<i class="icon-user"></i>
							customer
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>appoinment">
							<i class="icon-user"></i>
							Add
							Appointment
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>item">
							<i class="icon-edit"></i>
							Item
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>invoice">
							<i class="icon-table"></i>
							Sales Invoice
						</a>
					</li>

					<li>
						<a href="<?php echo base_url();?>manual_invoice">
							<i class="icon-table"></i>
							Manual Invoice
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>sales_return">
							<i class="icon-table"></i>
							Sales Return
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>stock">
							<i class="icon-shopping-cart"></i>
							Stock
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>purchase">
							<i class="icon-bar-chart"></i>
							Purchase
						</a>
					</li>

					<li>
						<a href="<?php echo base_url();?>offer">
							<i class="icon-bar-chart"></i>
							Offer
						</a>
					</li>

					<!-- <li>
						<a href="javascript:void(0);">
							<i class="icon-cog"></i>
							Setting
						</a>
					</li> -->
						<ul class="sub-menu">
							<li>
								<a href="<?php echo base_url();?>profile">
									<i class="icon-angle-right"></i>
									Company Profile
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>vat">
									<i class="icon-angle-right"></i>
									Vat master
								</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>category">
									<i class="icon-angle-right"></i>
									Category
								</a>
							</li>

							<li>
								<li>
									<a href="<?php echo base_url();?>salesperson">
										<i class="icon-angle-right"></i>
										Sales Person
									</a>
								</li>
							</li>

							<li>
								<li>
									<a href="<?php echo base_url();?>user">
										<i class="icon-angle-right"></i>
										Create User's
									</a>
								</li>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);">
							<i class="icon-list-alt"></i>
							reports
						</a>
						<ul class="sub-menu">
						<li>
								<a href="<?php echo base_url();?>customer/view">
									<i class="icon-angle-right"></i>
									Customer Reports
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>daily_sales">
									<i class="icon-angle-right"></i>
									Daily Sales
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>invoice/view">
									<i class="icon-angle-right"></i>
									Invoice Reports
								</a>
							</li>
								<li>
								<a href="<?php echo base_url();?>purchase/view">
									<i class="icon-angle-right"></i>
									Purchase Reports
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>invoice/staff_view">
									<i class="icon-angle-right"></i>
									Sales staff
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>customer/view_birthday">
									<i class="icon-angle-right"></i>
									Birth Day 
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>customer/view_anniversaryday">
									<i class="icon-angle-right"></i>
									Anniversary  Day 
								</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>manual_invoice/view">
									<i class="icon-angle-right"></i>
									Manual Invoice Reports 
								</a>
							</li>
						</ul>
						<li>
						<a href="javascript:void(0);">
							<i class="icon-cog"></i>
							Setting
						</a>
					</li>
						<li>
							<a href="<?php echo base_url();?>login/logout">
								<i class="icon-off "></i>
								Logout
							</a>
						</li>
					</li>

				</ul>
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<div id="content">
			<div class="container">


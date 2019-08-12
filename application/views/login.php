<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>UCARA</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/login.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
	<style>
		.loginfooter a {
			color: #ccc;
		}
	</style>
</head>



<!-- Notification  -->



<!-- notification ends  -->


<style type="text/css">
	.login_alert
	{
		position: absolute;
		right: 11px;
		width: 36%;
		top: 35px;
		border-radius: 4px;
		font-size: 14px;
		height: 43px;
		padding: 8px;
	}
</style>

<body class="login" style="background-image:url(assets/img/loginback.png);">

	<?php 

	$msg = $this->session->flashdata('msg1');

	if((isset($msg)) && (!empty($msg))) 
	{ 

		echo '<div class="form-control btn btn-danger btn-notification login_alert"  >
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		'.$msg.'
	</div>';
	}


?>



<div class="container"  style="margin-bottom:160px;">
	<div class="col-md-7">
		<div class="logo">
			<strong>UCARA</strong>
		</div>
		<div class="box">
			<div class="content">
				<form class="form-vertical login-form" action="<?php echo base_url();?>login/validate" method="post">
					<h3 class="form-title">Sign In to your Account</h3>
					
					<div class="form-group">
						<div class="input-icon">
							<i class="icon-user"></i>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus data-rule-required="true" data-msg-required="Please enter your username." / >
							<span id="username_valid"></span>
						</div>
					</div>
					<div class="form-group">
						<div class="input-icon">
							<i class="icon-lock"></i>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password" data-rule-required="true" data-msg-required="Please enter your password." />
							<span id="password_valid"></span>
						</div>
					</div>
					<div class="form-actions">
						<label class="checkbox pull-left"><input type="checkbox" class="uniform" name="remember"> Remember me</label>
						<button type="submit" class="submit btn btn-primary pull-right" id="submit" >
							Sign In <i class="icon-angle-right"></i>
						</button>
					</div>
				</form>
			</div> <!-- /.content -->
		</div>
	</div>
	<div class="col-md-5">
	</div>
</div>
<div class="container-fluid loginfooter">
	<div class="col-md-6">
		<p style="font-weight: bold;margin-top: 8px;">For any queries contact &nbsp;&nbsp;<a href="http://idreamdevelopers.com/contact/" target="_blank">Idreamdevelopers</a></p>
	</div>
	<div class="col-md-6">
		<p class="pull-right" style="margin-top: 8px;font-weight: bold;">UCARA Billing Software</p>
	</div>
</div>





</body>
</html>

<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/libs/lodash.compat.min.js"></script>
<script type="text/javascript" src="plugins/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="plugins/validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/login.js"></script>



<script>
	$(document).ready(function(){
		"use strict";
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#submit').click(function(){
			var username=$('#username');
			var password=$('#password');
			if(username.val()=='')
			{
				username.focus();
				$('#username_valid').html('<span><font color="red">Please Enter The Name</span>');
				username.keyup(function(){
					$('#username_valid').html('');
				});
				return false;
			}
			if(password.val()=='')
			{
				password.focus();
				$('#password_valid').html('<span><font color="red">Please Enter The Password');
				password.keyup(function(){
					$('#password_valid').html('');
				});
				return false;
			}
		});
	});
</script>


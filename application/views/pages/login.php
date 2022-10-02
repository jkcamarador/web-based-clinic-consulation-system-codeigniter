<!DOCTYPE html>
<html styles='position: fixed;'>
<head>
	<title>UMAK Clinic Consultation</title>
	<link rel='stylesheet' href="<?php echo base_url('assets/css/logregstyle.css')?>">
</head>

<body>
	<section class="login">
		<div class="login_box">
			<div class="left">
				<div class="top_link"><a href="<?php echo base_url('ClinicController/index');?>">Return home</a></div>
				<div class="contact">
					<form action="<?php echo base_url('ClinicController/verifyAccount');?>" method='post'>
						<h3>SIGN IN</h3>
						<input class="form-input" type="text" name="username_login" placeholder="Input Student/Faculty Id" required>
						<input class="form-input" type="password" name="password_login" placeholder="Input Password " required>
						<button class="submit" name='submit_login'>Login</button><br>
						<a href="<?php echo base_url('ClinicController/register');?>">Don't have an account? Sign up</a>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="right-text">
					<h2>UNIVERSITY OF MAKATI</h2>
					<h5>WEB BASED CLINIC CONSULTATION</h5>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
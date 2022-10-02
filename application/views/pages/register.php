<!DOCTYPE html>
<html>
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
					<form action="<?php echo base_url('ClinicController/addAccount');?>" method='post'>
						<h3>SIGN UP</h3>
						<input class="form-input" type="text" name="username_regist" placeholder="Input Student/Faculty Id" required maxlength="15" minlength="3">
						<input class="form-input" type="password" name="password_regist" placeholder="Input Password" required maxlength="15" minlength="3">
						<input class="form-input" type="password" name="password_regist_re" placeholder="Confirm Password" required>

						<div class="radio">
							<input type="radio" name="class" value="Student" checked> Student
							<input type="radio" name="class" value="Faculty"> Faculty
						</div>

						<button class="submit" name='submit_regist'>Register</button><br>
						<a href="<?php echo base_url('ClinicController/login');?>">Already have an account? Log in</a>
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
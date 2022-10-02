<?php 
	$obj = new ClinicModel();
	$username = $record->username;
	$lname = $record->LastName;
	$fname = $record->FirstName;
	$mname = $record->MiddleName;
	$college = $record->College;
	$course = $record->Course;
	$yearlvl = $record->YearLevel;
	$gender = $record->Gender;
	$bday = $record->Bday;

	if($fname == ''){
		$welcome_name = $username;
	} else {
		$welcome_name = $fname;
	}
?>

<!DOCTYPE html>
<html style="top: 0; z-index: 1;">
<head>
	<title>UMAK Clinic Consultation</title>
	<link rel='stylesheet' href="<?php echo base_url('assets/css/styles.css')?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="userinfobody">
	<div class="header1">
		<img src="<?php echo base_url('assets/css/images/umak_logo.png'); ?>" alt="UMAK Logo" width="50">
		<a class="logo" style="font-size: 22px;">Welcome <?php echo $welcome_name;?></a>
		<div class="header-right">
			<a><button type="button" class="icon-button" id="myBtn">
				<span class="material-icons">notifications</span>
				<?php 

				$notifnum = $obj->getUserNotificationsNumber($username);
				if ($notifnum > 0 ){
				?>
				<span class="icon-button__badge"><?php echo $obj->getUserNotificationsNumber($username); ?></span>
				<?php 
				}
				?>
			</button></a>
			<a href="<?php echo base_url('ClinicController/gotoUserHome/'.$record->username);?>">Appointment</a>
			<a class="active" href="">Personal Info</a>
			<a href="<?php echo base_url('ClinicController/logout');?>">Logout</a>
		</div>
	</div>

	<div class="form-container">

		<h4><b>Your Personal Information</b></h4>
        <p style="color:#b3b3b3;">On this page you can view and edit your personal information.</p><br>
		
		<form action="<?php echo base_url('ClinicController/editInfoStud/'.$record->username);?>" method='post'>

			<label for="studid">Student ID:</label><br>
			<input class="form-control" type="text" id="studid" disabled="disabled" value="<?php echo $username; ?>" placeholder="e.g. K11722123"><br>
		
			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="fname">First Name:</label><br>
					<input class="form-control" type="text" id="fname" name="fname" required maxlength="50" value="<?php echo $fname; ?>" placeholder="e.g. Juan"><br>
				</div>
				
				<div style="width: 100%;">
					<label for="lname">Last Name:</label><br>
					<input class="form-control" type="text" id="lname" name="lname" required maxlength="50" value="<?php echo $lname; ?>" placeholder="e.g. Dela Cruz"><br>
				</div>			
			</div>

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="mname">Middle Name:</label><br>
					<input class="form-control" type="text" id="mname" name="mname" required maxlength="50" value="<?php echo $mname; ?>" placeholder="e.g. Garcia"><br>
				</div>
				
				<div style="width: 100%;">
					<label for="yearlvl">Year Level:</label><br>
					<select class="form-control" id="yearlvl" name="yearlvl" required> 
						<?php
						if ($yearlvl == '1' || $yearlvl ==''){
							echo "<option selected value='1'>1</option>";
							echo "<option value='2'>2</option>";
							echo "<option value='3'>3</option>";
							echo "<option value='4'>4</option>";
							echo "<option value='5'>5</option>";
						}else if ($yearlvl == '2'){
							echo "<option value='1'>1</option>";
							echo "<option selected value='2'>2</option>";
							echo "<option value='3'>3</option>";
							echo "<option value='4'>4</option>";
							echo "<option value='5'>5</option>";

						}else if ($yearlvl == '3'){
							echo "<option value='1'>1</option>";
							echo "<option value='2'>2</option>";
							echo "<option selected value='3'>3</option>";
							echo "<option value='4'>4</option>";
							echo "<option value='5'>5</option>";
						}else if ($yearlvl == '4'){
							echo "<option value='1'>1</option>";
							echo "<option value='2'>2</option>";
							echo "<option value='3'>3</option>";
							echo "<option selected value='4'>4</option>";
							echo "<option value='5'>5</option>";
						}else if ($yearlvl == '5'){
							echo "<option value='1'>1</option>";
							echo "<option value='2'>2</option>";
							echo "<option value='3'>3</option>";
							echo "<option value='4'>4</option>";
							echo "<option selected value='5'>5</option>";
						}
						?>
					</select>
				</div>			
			</div>

			<label for="college">College:</label><br>
			<input class="form-control" type="text" id="college" name="college" required maxlength="50" value="<?php echo $college; ?>" placeholder="e.g. COAHS"><br>

			<label for="course">Course:</label><br>
			<input class="form-control" type="text" id="course" name="course" required maxlength="50" value="<?php echo $course; ?>" placeholder="e.g. BSCDS"><br>

			<div class="form-control-container">
				<div style="width: 100%;">
					<?php
						echo '<label for="gender">Gender:</label><br>';
						echo '<div class="form-control">';				
							if ($gender=='Male'){
								echo '<input style="margin-top: 14px;" id="gender" type="radio" name="gender" value="Male" checked> Male';
								echo '<input style="margin-left: 10px;"id="gender" type="radio" name="gender" value="Female"> Female';
							} else {
								echo '<input style="margin-top: 14px;" id="gender" type="radio" name="gender" value="Male"> Male   ';
								echo '<input style="margin-left: 10px;"id="gender" type="radio" name="gender" value="Female" checked> Female';
							}
						echo '</div>';	
					?>
				</div>
				
				<div style="width: 100%;">
					<label for="bday">Birthday:</label><br>
					<input class="form-control" id="bday" type="date" required name="bday" value="<?php echo $bday; ?>">
					<br>
				</div>			
			</div>

			<button class="submit" name='submit'>Submit Changes</button>
			
		</form>
	</div>

	<div id="myModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<br>
			<h5 style="color:#052665"><b>Notifications</b></h5>
			
			<?php 
				$records = $obj->getUserNotifications($username);
				if($records){
					foreach($records as $record){
						if ($record->isread == 0) {
			?>
							<div class="notif-container unread"> 
								<img src="<?php echo base_url('assets/css/images/declined_icon.png'); ?>" alt="Declined" width="80">
								<div>
									<p style="display:inline"><b><?php echo $record->reason;?></b></p><br>
									<?php
									 	$date = str_replace('-"', '/', $record->date);  
    									$newDate = date("m/d/Y", strtotime($date));  
    								?>
									<p style="display:inline; font-size:14px"><?php echo $newDate;?></p>
								</div>
							</div>	
			<?php 
						} else {
			?>		
							<div class="notif-container"> 
								<img src="<?php echo base_url('assets/css/images/declined_icon.png'); ?>" alt="Declined" width="80">
								<div>
									<p style="display:inline"><b><?php echo $record->reason;?></b></p><br>
									<?php
									 	$date = str_replace('-"', '/', $record->date);  
    									$newDate = date("m/d/Y", strtotime($date));  
    								?>
									<p style="display:inline; font-size:14px"><?php echo $newDate;?></p>
								</div>
							</div>				
			<?php 
						}
					}
				} else {
			?>
					<center>
						<br><br>
						<img src="<?php echo base_url("assets/css/images/no_notif.png"); ?>" alt="Declined" width="200">
						<br><br><br>
						<h6><b>No notifications yet</b></h6>
						<p>When you get notifications, they'll show up here</p><br>
					</center>
			<?php 
				}
			?>
			
		</div>
	</div>
<script>
	// notification modal
	var modal = document.getElementById("myModal");
	var btn = document.getElementById("myBtn");
	var span = document.getElementsByClassName("close")[0];

	btn.onclick = function() {
		modal.style.display = "block";
	}
	  
	span.onclick = function() {
		modal.style.display = "none";
		window.location.href = "<?php echo site_url('ClinicController/updateNotif/' . $username);?>";
	}

	window.onclick = function(event) {
		if (event.target == modal) {
		modal.style.display = "none";
		window.location.href = "<?php echo site_url('ClinicController/updateNotif/'. $username);?>";
		}
	}
</script>
</body>
</html>
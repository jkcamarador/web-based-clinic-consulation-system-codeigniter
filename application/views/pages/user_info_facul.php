<?php 
	$obj = new ClinicModel();
	$username = $record->username;
	$lname = $record->LastName;
	$fname = $record->FirstName;
	$mname = $record->MiddleName;
	$dept = $record->Department;
	$gender = $record->Gender;
	$bday = $record->Bday;

	if($fname == ''){
		$welcome_name = $username;
	} else {
		$welcome_name = $fname;
	}
?>

<!DOCTYPE html>
<html>
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
			<a class="active" href="<?php echo base_url('ClinicControsller/info_facul/'.$record->username);?>">Personal Info</a>
			<a href="<?php echo base_url('ClinicController/logout');?>">Logout</a>
		</div>
	</div>

	<div class="form-container">
		<h4><b>Your Personal Information</b></h4>
        <p style="color:#b3b3b3;">On this page you can view and edit your personal information.</p><br>
		
		<form action="<?php echo base_url('ClinicController/editInfoFacul/'.$record->username);?>" method='post'>

			<label for="studid">Faculty ID:</label><br>
			<input class="form-control" type="text" id="studid" disabled value="<?php echo $username; ?>" placeholder="ID Number"><br>
		
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
					<label for="dept">Department:</label><br>
					<input class="form-control" type="text" id="dept" name="dept" required maxlength="50" value="<?php echo $dept; ?>" placeholder="e.g. COAHS"><br>
				</div>		
	      	</div>

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
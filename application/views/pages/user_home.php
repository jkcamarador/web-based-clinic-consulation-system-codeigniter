<?php
	$obj = new ClinicModel();
	$username = $record->username;
	$class = $record->class;
	$welcome_name = '';

	if($class == 'Student'){
		$recorded = $obj->searchUser('info_stud', 'username', $username);
		$username = $recorded->username;
		$lname = $recorded->LastName;
		$fname = $recorded->FirstName;
		$mname = $recorded->MiddleName;
		$gender = $recorded->Gender;
		$bday = $recorded->Bday;
		$college = $recorded->College;
		$course = $recorded->Course;
		$yearlvl = $recorded->YearLevel;
	    $userpage = "ClinicController/info_stud/";
	    $id_label = "Student ID";
	}else{
		$recorded = $obj->searchUser('info_facul', 'username', $username);
		$username = $recorded->username;
		$lname = $recorded->LastName;
		$fname = $recorded->FirstName;
		$mname = $recorded->MiddleName;
		$gender = $recorded->Gender;
		$bday = $recorded->Bday;
		$dept = $recorded->Department;
	    $userpage = "ClinicController/info_facul/";
	    $id_label = "Faculty ID";
	}

	if($fname == ''){
		$welcome_name = $username;
		$lname = 'NA';
	} else {
		$welcome_name = $fname;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>UMAK Clinic Consultation</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href="<?php echo base_url('assets/css/styles.css')?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="userinfobody">
	<div class="header1">
		<img src="<?php echo base_url('assets/css/images/umak_logo.png'); ?>" alt="UMAK Logo" width="50">
		<a class="logo">Welcome <?php echo $welcome_name;?></a>

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
			<a class="active" href="<?php echo base_url('ClinicController/gotoUserHome/'.$record->username);?>">Appointment</a>
			<a href="<?php echo base_url($userpage.$record->username);?>">Personal Info</a>
			<a href="<?php echo base_url('ClinicController/logout');?>">Logout</a>
		</div>
	</div>

	<div class="form-container">
		<h4><b>Book an Appointment</b></h4>
        <p style="color:#b3b3b3;">On this page you can book for an appointment.</p><br>
		
		<form action="<?php echo base_url('ClinicController/addAppointment/'.$lname);?>" method='post'>
			<input type = "hidden" name = "user" value = <?php echo $username; ?>>
			<label for="studid">Student ID:</label><br>
			<input class="form-control" type="text" id="studid" disabled value="<?php echo $username; ?>" placeholder="NA"><br>
		
			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="fname">First Name:</label><br>
					<input class="form-control" type="text" id="fname" disabled value="<?php echo $fname; ?>" placeholder="NA"><br>
				</div>
				
				<div style="width: 100%;">
					<label for="lname">Last Name:</label><br>
					<input class="form-control" type="text" id="lname" disabled value="<?php echo $lname; ?>" placeholder="NA"><br>
				</div>			
			</div>

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="mname">Middle Name:</label><br>
					<input class="form-control" type="text" id="mname" disabled value="<?php echo $mname; ?>" placeholder="NA"><br>
				</div>

				
				<div style="width: 100%;">
					<?php 
						if($userpage == "ClinicController/info_stud/"){
							echo "<label for='yearlvl'>Year Level:</label><br>";
							echo "<input class='form-control' type='text' id='yearlvl' disabled value='$yearlvl' placeholder='NA'><br>";
						}else{
							echo "<label for='dept'>Department:</label><br>";
							echo "<input class='form-control' type='text' id='dept' disabled value='$dept' placeholder'NA'><br>";
						}
					?>
				</div>	
					
			</div>

			<?php 
				if($userpage == "ClinicController/info_stud/"){
					echo "<label for='college'>College:</label><br>";
					echo "<input class='form-control' type='text' id='college' disabled value='$college' placeholder='NA'><br>";

					echo "<label for='course'>Course:</label><br>";
					echo "<input class='form-control' type='text' id='course' disabled value='$course' placeholder='NA'><br>";
				}
			?>

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="gender">Gender:</label><br>
					<input class="form-control" type="text" id="gender" disabled value="<?php echo $gender; ?>" placeholder="NA"><br>
				</div>
				
				<div style="width: 100%;">
					<label for="bday">Birthday:</label><br>
					<input class="form-control" id="bday" type="date" disabled value="<?php echo $bday; ?>">
					<br>
				</div>			
			</div>	


			<label for="date_appoint">Select Date of Appointment:</label><br>
			<input class="form-control" id="date_appoint" type="date" required name="date_appoint">
			<br>

			<label for="guardian">Guardian Name:</label><br>
			<input class="form-control" type="text" id="guardian" name="guardian" required maxlength="50" placeholder="e.g. Jose Dela Cruz"><br>

			<label for="contact_no">Contact Number:</label><br>
			<input class="form-control" type="text" id="contact_no" name="contact_no" required maxlength="50" placeholder="+639000000000"><br>

			<label for="email">Email:</label><br>
			<input class="form-control" type="text" id="email" name="email" required maxlength="50" placeholder="e.g. jdelacruz.k11722123@umak.edu.ph"><br>

			<button class="submit" name='book'>Book Appointment</button>
		</form>
	</div>

	<div style="background-color: #353a41; bottom: 0;" >
		<div class="table-container"  style="margin-bottom: 0;">
		<h4 style="color:white; margin-top: 15px;"><b>Appointment History</b></h4>
        <p style="color:#b3b3b3;">View and manage your appointment here.</p><br>

	        <div class="table-responsive">
				<table class="table table-dark">
					<thead style="font-weight: bold; color:#82a5e8">
						<tr>
							<td>Date Recorded</td>
							<td>Date Requested</td>
							<td>Guardian</td>
							<td>Contact Number</td>
							<td>Email Address</td>
							<td><?php echo $id_label ?></td>
							<td>Status</td>
							<td>Action</td>
						</tr>
					</thead>

					<tbody>
						<?php 
							$records = $obj->getAllAppointments_user($username);
							if($records){
								foreach($records as $record){
						?>
						<tr>
							<td><?php echo $record->date_created;?></td>
							<td><?php echo $record->date_appoint;?></td>
							<td><?php echo $record->guardian;?></td>
							<td><?php echo $record->contact_num;?></td>
							<td><?php echo $record->email;?></td>
							<td><?php echo $record->username ;?></td>

							<?php 
							if ($record->status == 'Approved'){
							?>
								<td style="color: #06FF00;"><b><?php echo $record->status;?></b></td>
							<?php 
							} else {
							?>
								<td style="color: #FF8D29;"><b><?php echo $record->status;?></b></td>
							<?php 
							}
							?>
							
							<td>
								<?php 
								if($record->status == 'On-going'){
								?>
									


									<a href="<?php echo base_url('ClinicController/deleteAppointment/'.$record->username.'/false');?>" 
										onclick="return confirm ('Are you sure you want to cancel this Appointment?');"><button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button></a>
								<?php 
								}
								?>
							</td>

						</tr>
						<?php 
							}
						}
						?>

						<?php 
							$records = $obj->getAllConsultations_user($username);
							if($records){
								foreach($records as $record){
						?>
						<tr>
							<td><?php echo $record->date_created;?></td>
							<td><?php echo $record->date;?></td>
							<td><?php echo $record->guardian;?></td>
							<td><?php echo $record->contact_num;?></td>
							<td><?php echo $record->email;?></td>
							<td><?php echo $record->username ;?></td>
							<td style="color: #2FA4FF;"><b>Success</b></td>
							<td>
								<a href="<?php echo base_url('ClinicController/printConsultation/'.$record->id);?>" target="_blank"><button style="background-color: #052665; border-color: #052665;" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i></button></a>	
							</td>
						</tr>
						<?php 
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
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
								<?php 
								if ($record->status == 0){
								?>
									<img src="<?php echo base_url('assets/css/images/declined_icon.png'); ?>" alt="Declined" width="55">
								<?php 
								} else {
								?>
									<img src="<?php echo base_url('assets/css/images/approve_icon.png'); ?>" alt="Declined" width="55">
								<?php 
								}
								?>
								
								<div>
									<p style="display:inline;"><b><?php echo $record->reason;?></b></p><br>
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
								<?php 
								if ($record->status == 0){
								?>
									<img src="<?php echo base_url('assets/css/images/declined_icon.png'); ?>" alt="Declined" width="55">
								<?php 
								} else {
								?>
									<img src="<?php echo base_url('assets/css/images/approve_icon.png'); ?>" alt="Declined" width="55">
								<?php 
								}
								?>

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
						<img src="<?php echo base_url("assets/css/images/no_notif.png"); ?>" alt="No Notification" width="200">
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
	var todayDate = new Date();
	var month = todayDate.getMonth() + 1; 
	var year = todayDate.getUTCFullYear() - 0; 
	var tdate = todayDate.getDate() + 1; 
	if(month < 10){
		month = "0" + month 
	}
	if(tdate < 10){
		tdate = "0" + tdate;
	}
	var maxDate = year + "-" + month + "-" + tdate;
	document.getElementById("date_appoint").setAttribute("min", maxDate);
	//console.log(maxDate);

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



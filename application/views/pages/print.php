<?php 
	$date_create = $record->date_created;
	$date_appoint = $record->date;

	$username = $record->username;
	$lname = $record->LastName;
	$fname = $record->FirstName;
	$mname = $record->MiddleName;
	$gender = $record->Gender;
	$bday = $record->Bday;
	$guardian = $record->guardian;
	$contact_num = $record->contact_num;
	$email = $record->email;

	$med_history = $record->med_history;
	$weight = $record->weight;
	$height = $record->height;
	$bmi = $record->bmi;
	$temp = $record->temp;
	$pulse = $record->pulse;
	$respiration = $record->respiration;
	$blood_pressure = $record->blood_pressure;
	$chief_complaint = $record->chief_complaint;
	$diagnosis = $record->diagnosis;
	$treatment = $record->treatment;
	$doctor = $record->doctor;
?>
<html>
	<head>
		<style>	
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
 
		@page {
			size: auto;
			margin: 0;
		}
		</style>
		<title>UMAK Clinic Consultation</title>
		<link rel='stylesheet' href="<?php echo base_url('assets/css/printstyle.css')?>">
	</head>
<body class="printbody">
	<div class="form-container-consult">

		<center>
		<div class="header-container">
			<img src="<?php echo base_url('assets/css/images/umak_logo.png'); ?>" alt="UMAK Logo" width="100">
			<h5><b>University of Makati</b> <br> Web Based Clinic Consultation </h5>
		</div>
		</center>
		
		<br><br>
		<p style="font-size: 18px"><b>Consultation Form</b></p>
		
		<form action="<?php echo base_url('ClinicController/insert_Consultation/'.$username);?>" method='post'>

<!-- start here Personal Information-->
			<hr>
			<p style="color:#7f7f7f;">Personal information:</p><br>
			
			<label for="studid">Patient ID:</label><br>
			<input class="form-control" type="text" id="studid" disabled value="<?php echo $username; ?>" ><br>
		
			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="fname">First Name:</label><br>
					<input class="form-control" type="text" id="fname" disabled value="<?php echo $fname; ?>" ><br>
				</div>
				
				<div style="width: 100%;">
					<label for="lname">Last Name:</label><br>
					<input class="form-control" type="text" id="lname" disabled value="<?php echo $lname; ?>" ><br>
				</div>	
				<div style="width: 100%;">
					<label for="mname">Middle Name:</label><br>
					<input class="form-control" type="text" id="mname" disabled value="<?php echo $mname; ?>"><br>
				</div>
		
			</div>

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="gender">Gender:</label><br>
					<input class="form-control" type="text" id="gender" disabled value="<?php echo $gender; ?>">
				</div>
				
				<div style="width: 100%;">
					<label for="bday">Birthday:</label><br>
					<input class="form-control" id="bday" type="date" disabled value="<?php echo $bday; ?>">
				</div>			
			</div>

<!-- start here appointment details-->
			<hr>
			<p style="color:#7f7f7f;">Appointment details:</p><br>


			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="course">Date Created:</label><br>
					<input class="form-control" type="text" id="course" disabled value="<?php echo $date_create; ?>"><br>
				</div>
				
				<div style="width: 100%;">
					<label for="course">Date Appointed:</label><br>
					<input class="form-control" type="text" id="course" disabled value="<?php echo $date_appoint; ?>"><br>
				</div>			
			</div>

			<label for="course">Guardian:</label><br>
			<input class="form-control" type="text" id="course" disabled value="<?php echo $guardian; ?>"><br>

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="course">Contact Number:</label><br>
					<input class="form-control" type="text" id="course" disabled value="<?php echo $contact_num; ?>"><br>
				</div>
				
				<div style="width: 100%;">
					<label for="course">Email Address:</label><br>
					<input class="form-control" type="text" id="course" disabled value="<?php echo $email; ?>"><br>
				</div>			
			</div>

<!-- start here input details-->
			<p style="page-break-after :always;"></p>
			<center>
			<div class="header-container" style="margin-top: 40px;">
				<img src="<?php echo base_url('assets/css/images/umak_logo.png'); ?>" alt="UMAK" Logo width="100">
				<h5><b>University of Makati</b> <br> Web Based Clinic Consultation </h5>
			</div>
			</center>
			
			<br><br>

			<p style="font-size: 18px"><b>Consultation Form</b></p>
			<hr>
			<p style="color:#7f7f7f;">Consultation details:</p><br>
			<label for="medhist">Medical History: </label><br>
			<p class="text-container" id="temp"><?php echo $med_history ?></p>

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="weight">Weight (kg): </label>
					<p class="text-container" id="temp"><?php echo $weight ?></p>
				</div>

				<div style="width: 100%;">
					<label for="height">Height (cm): </label><br>
					<p class="text-container" id="temp"><?php echo $height ?></p>
				</div>	

				<div style="width: 100%;">
					<label for="bmi">BMI: </label><br>
					<p class="text-container" id="temp"><?php echo $bmi ?></p>
				</div>	
			</div>	

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="temp">Temperature: </label><br>
					<p class="text-container" id="temp"><?php echo $temp ?></p>
				</div>

				<div style="width: 100%;">
					<label for="pulse">Pulse: </label><br>
					<p class="text-container" id="pulse"><?php echo $pulse ?></p>
				</div>	

				<div style="width: 100%;">
					<label for="respiration">Respiration: </label><br>
					<p class="text-container" id="respiration"><?php echo $respiration ?></p>
				</div>	

				<div style="width: 100%;">
					<label for="bp">Blood Pressure: </label><br>
					<p class="text-container" id="bp"><?php echo $blood_pressure ?></p>	
				</div>	
			</div>		

			<label for="complaint">Chief Complaint: </label>
			<p class="text-container" id="complaint"><?php echo $chief_complaint ?></p>	

			<label for="diag">Diagnosis: </label><br>
			<p class="text-container" id="diag"><?php echo $diagnosis ?></p>

			<label for="treatment">Treatment: </label><br>
			<p class="text-container" id="treatment"><?php echo $treatment ?></p>

			<label for="doc">Doctor / Nurse / Assistant: </label><br>
			<p class="text-container" id="doc"><?php echo $doctor ?></p>
		</form>
	</div>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
	window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
	});
</script>
</body>
</html>
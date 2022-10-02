<?php 
	$username = $record3->username;
	$lname = $record3->LastName;
	$fname = $record3->FirstName;
	$mname = $record3->MiddleName;
	$gender = $record3->Gender;
	$bday = $record3->Bday;
	$id_label = '';

	if($record->class == "Student"){
		$college = $record3->College;
		$course = $record3->Course;
		$yearlvl = $record3->YearLevel;
		$id_label = 'Student ID:';
	}else{
		$dept = $record3->Department;
		$id_label = 'Faculty ID:';
	}

	$date_create = $record2->date_created;
	$date_appoint = $record2->date_appoint;
	$guardian = $record2->guardian;
	$contact_num = $record2->contact_num;
	$email = $record2->email;
?>

<!DOCTYPE html>
<html style="top: 0; z-index: 1;">
<head>
	<title>UMAK Clinic Consultation</title>
	<link rel='stylesheet' href="<?php echo base_url('assets/css/styles.css')?>">
</head>

<body class="userinfobody">

	<div class="form-container-consult">
		<h3>Consultation Form</h3>
		
		<form action="<?php echo base_url('ClinicController/insert_Consultation/'.$username);?>" method='post'>

			<input type="hidden" name="fname" value="<?php echo $fname; ?>" >
			<input type="hidden" name="lname" value="<?php echo $lname; ?>" >
			<input type="hidden" name="mname" value="<?php echo $mname; ?>" >
			<input type="hidden" name="gender" value="<?php echo $gender; ?>" >
			<input type="hidden" name="bday" value="<?php echo $bday; ?>" >
			<input type="hidden" name="date_create" value="<?php echo $date_create; ?>" >		
			<input type="hidden" name="guardian" value="<?php echo $guardian; ?>" >
			<input type="hidden" name="contact_num" value="<?php echo $contact_num; ?>" >
			<input type="hidden" name="email" value="<?php echo $email; ?>" >
			<input type="hidden" name="date_appoint" value="<?php echo $date_appoint; ?>" >

<!-- start here Personal Information-->
			<hr>
			<p style="color:#7f7f7f;">Personal information:</p><br>
			
			<label for="studid"><?php echo $id_label; ?></label><br>
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

			<?php 
				if($record->class == "Student"){
			?>		
					<div class="form-control-container">
						<div style="width: 100%;">
							<label for="course">Course:</label><br>
							<input class="form-control" type="text" id="course" disabled value="<?php echo $course; ?>"><br>
						</div>

						<div style="width: 100%;">
							<label for="yearlvl">Year Level:</label><br>
							<input class="form-control" type="text" id="yearlvl" disabled value="<?php echo $yearlvl; ?>"><br>
						</div>	

						<div style="width: 100%;">
							<label for="college">College:</label><br>
							<input class="form-control" type="text" id="college" disabled value="<?php echo $college; ?>"><br>
						</div>	
					</div>	
			<?php 
				}else{
			?>
					<label for='dept'>Department:</label><br>
					<input class='form-control' type='text' id='dept' disabled value="<?php echo $dept; ?>"><br>
			<?php
				}
			?>

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="gender">Gender:</label><br>
					<input class="form-control" type="text" id="gender" disabled value="<?php echo $gender; ?>">
				</div>
				
				<div style="width: 100%;">
					<label for="bday">Birthday:</label><br>
					<input class="form-control" id="bday" type="date" disabled value="<?php echo $bday; ?>">
					<br>
				</div>			
			</div>

<!-- start here appointment details-->
			<hr>
			<p style="color:#7f7f7f;">Appointment details:</p><br>


			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="date_create">Date Created:</label><br>
					<input class="form-control" type="text" id="date_create" disabled value="<?php echo $date_create; ?>"><br>
				</div>
				
				<div style="width: 100%;">
					<label for="date_appoint">Date Appointed:</label><br>
					<input class="form-control" type="text" id="date_appoint" disabled value="<?php echo $date_appoint; ?>"><br>
				</div>			
			</div>

			<label for="guardian">Guardian:</label><br>
			<input class="form-control" type="text" id="guardian" disabled value="<?php echo $guardian; ?>"><br>

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="contact_num">Contact Number:</label><br>
					<input class="form-control" type="text" id="contact_num" disabled value="<?php echo $contact_num; ?>"><br>
				</div>
				
				<div style="width: 100%;">
					<label for="email">Email Address:</label><br>
					<input class="form-control" type="text" id="email" disabled value="<?php echo $email; ?>"><br>
				</div>			
			</div>

<!-- start here input details-->
			<hr>
			<p style="color:#7f7f7f;">Consultation details:</p><br>
			<!--
			<label for="medhist">Medical History: </label><br>
			<input class="form-control" type="text" id="medhist" required name="medhist" placeholder=""><br>
			-->
			<label for="medhist">Medical History: </label><br>
			<div class="text-container">
				<div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Allergy (Food/Meds)" id="medhist1">
						<label class="form-check-label" for="medhist1">Allergy (Food/Meds)</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Mumps (Beke)" id="medhist2">
						<label class="form-check-label" for="medhist2">Mumps (Beke)</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Measles (Tigdas)" id="medhist3">
						<label class="form-check-label" for="medhist3">Measles (Tigdas)</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Tuberculosis" id="medhist4">
						<label class="form-check-label" for="medhist4">Tuberculosis</label>
					</div>
				</div>

				<div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Chicken Pox (Bulutong)" id="medhist5">
						<label class="form-check-label" for="medhist5">Chicken Pox (Bulutong)</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Epilepsy (Pangingisay)" id="medhist6">
						<label class="form-check-label" for="medhist6">Epilepsy (Pangingisay)</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Typhoid Fever (Tipus)" id="medhist7">
						<label class="form-check-label" for="medhist7">Typhoid Fever (Tipus)</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Malaria" id="medhist8">
						<label class="form-check-label" for="medhist8">Malaria</label>
					</div>
				</div>

				<div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Hepa A" id="medhist9">
						<label class="form-check-label" for="medhist9">Hepa A</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Hepa B" id="medhist10">
						<label class="form-check-label" for="medhist10">Hepa B</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Liver Disease" id="medhist11">
						<label class="form-check-label" for="medhist11">Liver Disease</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Kidney Disease" id="medhist12">
						<label class="form-check-label" for="medhist12">Kidney Disease</label>
					</div>
				</div>

				<div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Hyper Tension" id="medhist13">
						<label class="form-check-label" for="medhist13">Hyper Tension</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Diabetes Mellitus" id="medhist14">
						<label class="form-check-label" for="medhist14">Diabetes Mellitus</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Bronchial Asthma (Hika)" id="medhist15">
						<label class="form-check-label" for="medhist15">Bronchial Asthma (Hika)</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Heart Disease" id="medhist16">
						<label class="form-check-label" for="medhist16">Heart Disease</label>
					</div>
				</div>

				<div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Dengue Fever" id="medhist17">
						<label class="form-check-label" for="medhist17">Dengue Fever</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Arthritis" id="medhist18">
						<label class="form-check-label" for="medhist18">Arthritis</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="medhist[]" value="Pneumonia" id="medhist19">
						<label class="form-check-label" for="medhist19">Pneumonia</label>
					</div>
				</div>
			</div>	

			<br>

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="weight">Weight (kg): </label><br>
					<input class="form-control" type="text" id="weight" required name="weight" placeholder=""><br>
				</div>

				<div style="width: 100%;">
					<label for="height">Height (cm): </label><br>
					<input class="form-control" type="text" id="height" required name="height" placeholder=""><br>
				</div>	

				<div style="width: 100%;">
					<label for="temp">Body Temperature (Celcius): </label><br>
					<input class="form-control" type="text" id="temp" required name="temp" placeholder=""><br>
				</div>
			</div>	

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="pulse">Pulse Rate (Beats per minute): </label><br>
					<input class="form-control" type="text" id="pulse" required name="pulse" placeholder=""><br>
				</div>	

				<div style="width: 100%;">
					<label for="respiration">Respiration Rate (Breaths per minute): </label><br>
					<input class="form-control" type="text" id="respiration" required name="respiration" placeholder=""><br>
				</div>	

				<div style="width: 100%;">
					<label for="bp">Blood Pressure (mmHg): </label><br>
					<input class="form-control" type="text" id="bp" required name="bp" placeholder=""><br>	
				</div>	
			</div>		

			<label for="complaint1">Chief Complaint: </label><br>

			<div class="text-container">
				<div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Fever" id="complaint1">
						<label class="form-check-label" for="complaint1">Fever</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Cough" id="complaint2">
						<label class="form-check-label" for="complaint2">Cough</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Sore Throat" id="complaint3">
						<label class="form-check-label" for="complaint3">Sore Throat</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Head Ache" id="complaint4">
						<label class="form-check-label" for="complaint4">Head Ache</label>
					</div>
				</div>

				<div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Tooth Ache" id="complaint5">
						<label class="form-check-label" for="complaint5">Tooth Ache</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Fatigue" id="complaint6">
						<label class="form-check-label" for="complaint6">Fatigue</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Nausea" id="complaint7">
						<label class="form-check-label" for="complaint7">Nausea</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Body Ache" id="complaint8">
						<label class="form-check-label" for="complaint8">Body Ache</label>
					</div>
				</div>

				<div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Chest Pain" id="complaint9">
						<label class="form-check-label" for="complaint9">Chest Pain</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Abdominal Pain" id="complaint10">
						<label class="form-check-label" for="complaint10">Abdominal Pain</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Heartburn" id="complaint11">
						<label class="form-check-label" for="complaint11">Heartburn</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Swelling" id="complaint12">
						<label class="form-check-label" for="complaint12">Swelling</label>
					</div>
				</div>

					<div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Dizziness" id="complaint13">
						<label class="form-check-label" for="complaint13">Dizziness</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Bleeding" id="complaint14">
						<label class="form-check-label" for="complaint14">Bleeding</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Rashes" id="complaint15">
						<label class="form-check-label" for="complaint15">Rashes</label>
					</div>

					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="complaint[]" value="Insomia" id="complaint16">
						<label class="form-check-label" for="complaint16">Insomia</label>
					</div>
				</div>

			</div>

			<br>

			<div class="form-control-container">
				<div style="width: 100%;">
					<label for="diag">Diagnosis: </label><br>
					<input class="form-control" type="text" id="diag" required name="diag" placeholder=""><br>
				</div>
				
				<div style="width: 100%;">
					<label for="treatment">Treatment: </label><br>
					<input class="form-control" type="text" id="treatment" required name="treatment" placeholder=""><br>
				</div>			
			</div>

			<label for="doc">Doctor / Nurse / Assistant: </label><br>
			<input class="form-control" type="text" id="doc" required name="doc" placeholder=""><br>

			<button class="submit" name='submit'>Submit</button>
		</form>

		<a style="text-decoration: none;" href="<?php echo base_url('ClinicController/gotoHomeAdmin_approved');?>" 
			onclick="return confirm ('Are you sure you want to cancel this consultation?');"><button class="submit" style="margin-top: 15px;">Cancel</button></a>
	</div>

</body>
</html>
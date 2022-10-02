<!DOCTYPE html>
<html>
<head>
	<title>UMAK Clinic Consultation</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.1.0/css/fixedColumns.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href="<?php echo base_url('assets/css/styles.css')?>">
</head>

<body class="userinfobody">
	<div class="header1">
		<img src="<?php echo base_url('assets/css/images/umak_logo.png'); ?>" alt="UMAK Logo" width="50">
		<a class="logo" style="font-size: 22px;">Welcome Admin</a>
		<div class="header-right">
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin');?>">Pending</a>
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin_approved');?>">Approved</a>
			<a class="active" href="">History</a>
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin_dashboard');?>">Dashboard</a>
			<a href="<?php echo base_url('ClinicController/logout');?>">Logout</a>
		</div>
	</div>

	<div class="table-container" style="margin-top: 90px; width: 75%;">
		<h4><b>View Successful Consultations</b></h4>
        <p style="color:#b3b3b3;">Manage appointment by printing it.</p><br>

        <div class="table-admin-container table-responsive">
			<table id="table" class = "table table-striped table-hover nowrap" style="width: 100%;">
				<thead style="font-weight: bold; background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">
					<tr>
						<td>Appointment Created</td>
						<td>Consultation Date</td>
						<td>Student/Faculty ID</td>
						<td>Last Name</td>
						<td>First Name</td>
						<td>Middle Name</td>
						<td>Gender</td>
						<td>Birthday</td>
						<td>Guardian</td>
						<td>Contact No.</td>
						<td>Email</td>
						<td>Medical History</td>
						<td>Weight</td>
						<td>Height</td>
						<td>Bmi</td>
						<td>Temperature</td>
						<td>Pulse</td>
						<td>Respiration</td>
						<td>Blood Pressure</td>
						<td>Chief Complaint</td>
						<td>Diagnosis</td>
						<td>Treatment</td>
						<td>Doctor / Nurse / Assistant</td>
						<td style="background-color:#c2e9fb;">Action</td>
					</tr>
				</thead>

				<tbody>
					<?php 
						if($records){
							foreach($records as $record){
					?>
					<tr>
						<td><?php echo $record->date_created;?></td>
						<td><?php echo $record->date;?></td>
						<td><?php echo $record->username ;?></td>
						<td><?php echo $record->LastName;?></td>
						<td><?php echo $record->FirstName;?></td>
						<td><?php echo $record->MiddleName;?></td>
						<td><?php echo $record->Gender;?></td>
						<td><?php echo $record->Bday;?></td>
						<td><?php echo $record->guardian;?></td>
						<td><?php echo $record->contact_num;?></td>
						<td><?php echo $record->email;?></td>
						<td><?php echo $record->med_history;?></td>
						<td><?php echo $record->weight;?></td>
						<td><?php echo $record->height;?></td>
						<td><?php echo $record->bmi;?></td>
						<td><?php echo $record->temp;?></td>
						<td><?php echo $record->pulse ;?></td>
						<td><?php echo $record->respiration;?></td>
						<td><?php echo $record->blood_pressure;?></td>
						<td><?php echo $record->chief_complaint ;?></td>
						<td><?php echo $record->diagnosis;?></td>
						<td><?php echo $record->treatment;?></td>
						<td><?php echo $record->doctor;?></td>
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
<script type="text/javascript">
	$(document).ready(function() {
    var table = $('#table').DataTable( {
        scrollY:        "auto",
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:   {
            left: 0,
            right: 1
        }
    } );
} );
</script>
</body>
</html>
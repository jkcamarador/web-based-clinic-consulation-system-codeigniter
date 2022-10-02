<!DOCTYPE html>
<html>
<head>
	<title>UMAK Clinic Consultation</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' href="<?php echo base_url('assets/css/styles.css')?>">
</head>

<body class="userinfobody">
	<div class="header1">
		<img src="<?php echo base_url('assets/css/images/umak_logo.png'); ?>" alt="UMAK Logo" width="50">
		<a class="logo" style="font-size: 22px;">Welcome Admin</a>
		<div class="header-right">
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin');?>">Pending</a>
			<a class="active" href="">Approved</a>
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin_history');?>">History</a>
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin_dashboard');?>">Dashboard</a>
			<a href="<?php echo base_url('ClinicController/logout');?>">Logout</a>
		</div>
	</div>

	<div class="table-container" style="margin-top: 90px; width: 75%;">
		<h4><b>Manage Approved Appointments</b></h4>
        <p style="color:#b3b3b3;">Manage appointment by diagnosing the patient.</p><br>

        <div class="table-admin-container table-responsive">
			<table id="table" class = "table table-striped table-hover" style="width: 100%;">
				<thead style="font-weight: bold; background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">
					<tr>
						<td>Date Recorded</td>
						<td>Date Requested</td>
						<td>Guardian</td>
						<td>Contact Number</td>
						<td>Email Address</td>
						<td>Student/Faculty ID</td>
						<td>Action</td>
					</tr>
				</thead>

				<tbody>
					<?php 
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
						<td>
							<a href="<?php echo base_url('ClinicController/consultation/'.$record->username);?>"><button style="background-color: #052665; border-color: #052665;" class="btn btn-primary"><i class="fa fa-user-md" aria-hidden="true"></i></button></a>
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
	$(document).ready(function () {
    	$('#table').DataTable();
	});
</script>
</body>
</html>


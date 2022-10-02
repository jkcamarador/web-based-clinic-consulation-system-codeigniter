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
			<a class="active" href="">Pending</a>
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin_approved');?>">Approved</a>
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin_history');?>">History</a>
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin_dashboard');?>">Dashboard</a>
			<a href="<?php echo base_url('ClinicController/logout');?>">Logout</a>
		</div>
	</div>

	<div class="table-container" style="margin-top: 90px; width: 75%;">
		<h4><b>Manage Pending Appointments</b></h4>
        <p style="color:#b3b3b3;">Manage appointment by approving or declining it.</p><br>

		<div class="table-admin-container table-responsive">
		<table id="table" class = "table table-striped table-hover" style="width: 100%;">
			<thead style="font-weight: bold; background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%); ">
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
						<a href="<?php echo base_url('ClinicController/updateAppointmentStatus/'.$record->username);?>"><button style="width: 40px;" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button></a>			

						<button style="width: 40px;" id="<?php echo $record->username; ?>" onclick="getClickID(this.id)" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
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

	<div id="myModal" class="modal">
	  <div class="modal-content">
	    <span class="close">&times;</span>
	    <br>
	    <h5 style="color:#052665; "><b>Decline an Appointment</b></h5>
	    <form action="<?php echo base_url('ClinicController/deleteAppointment/'.$record->username.'/true');?>" method="post">
	    	<?php 
			if($records){	
			?>
				<input type="hidden" name="user" id="mydata">
	    	<?php 
			}
			?>
			<label for="reason">State the reason:</label>
	    	<input class="form-control" type="text" id="reason" name="reason" required maxlength="2000" placeholder=""><br>			
			<button onclick="return confirm ('Are you sure you want to decline this record?');" class="submit" name='book'>Submit</button>
		</form>
	  </div>
	</div>
<script>
	$(document).ready(function () {
	  	$('#table').DataTable();
	});

	var modal = document.getElementById("myModal");
	var span = document.getElementsByClassName("close")[0];

	span.onclick = function() {
	  modal.style.display = "none";
	}

	window.onclick = function(event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	  }
	}

	function getClickID(clickID) {
		var id = clickID;
		modal.style.display = "block";
		$("#mydata").val(id);
	}
</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>UMAK Clinic Consultation</title>
	<link rel='stylesheet' href="<?php echo base_url('assets/css/styles.css')?>">
</head>

<body class="userinfobody">
	<div class="header1">
		<img src="<?php echo base_url('assets/css/images/umak_logo.png'); ?>" alt="UMAK Logo" width="50">
		<a class="logo" style="font-size: 22px;">Welcome Admin</a>
		<div class="header-right">
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin');?>">Pending</a>
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin_approved');?>">Approved</a>
			<a href="<?php echo base_url('ClinicController/gotoHomeAdmin_history');?>">History</a>
			<a class="active" href="">Dashboard</a>
			<a href="<?php echo base_url('ClinicController/logout');?>">Logout</a>
		</div>
	</div>

	<div class="table-container" style="margin-top: 90px;">
		<h4><b>Dashboard</b></h4>
	    <p style="color:#b3b3b3;">Demographic profile of the patients.</p><br>

		<div style="display:flex; gap:30px;">
			<div id="piechart" class="chart"></div>
			<div id="barchart" class="chart"></div>
		</div>
	</div>

	<div class="footer">
		<div>
			<h4 style="color:#f9ee8e"><b>UNIVERSITY OF MAKATI</b></h4>
			<h5>Web Based Clinic Consultation</h5>
		    <p style="color:#b3b3b3;">J.P. Rizal Ext, Makati, 1215 Metro Manila</p>
		</div>		

		<div class="vl"></div>

		<div>
			<center>
			<h5>Number of successful <br> consultation: </h5>
			<h1 style="color:#f9ee8e"><b><?php echo $noOfMale+$noOfFemale; ?></b></h1>
			</center>
		</div>

		<div>
			<h5>Database Management</h5>
		    <p style="color:#b3b3b3;">Backup or restore the database of the system. <br> Last backed up: <?php echo $lastbackup->date; ?></p>
		    <p> </p>

		    <div style="display:flex; gap:30px">
				<a href="<?php echo base_url('ClinicController/backupSqlDatabase');?>"><button class="submit">Backup</button></a>
				<a href="<?php echo base_url('ClinicController/restoreSqlDatabase');?>"><button class="submit">Restore</button></a>
			</div>
		</div>
	</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['Gender', 'Hours per Day'],
		['Male', <?php echo $noOfMale; ?>],
		['Female', <?php echo $noOfFemale; ?>],
		]);

		var options = {'title':'Gender'};

		var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		chart.draw(data, options);
	}

	google.charts.load('current', {'packages':['bar']});
	google.charts.setOnLoadCallback(drawStuff);

	function drawStuff() {
		var data = new google.visualization.arrayToDataTable([
		['Class', 'Count'],
		["Student", <?php echo $noOfStud; ?>],
		["Faculty", <?php echo $noOfFacul; ?>]
		]);

		var options = {
		title: 'Class',
		bars: 'horizontal',
		axes: {
		x: {
		0: { side: 'top', label: 'Count'} // Top x-axis.
		}
		},
		bar: { groupWidth: "90%" }
		};

		var chart = new google.charts.Bar(document.getElementById('barchart'));
		chart.draw(data, options);
	}

	$(window).resize(function(){
	drawChart();
	drawStuff();
	});
</script>
</body>
</html>
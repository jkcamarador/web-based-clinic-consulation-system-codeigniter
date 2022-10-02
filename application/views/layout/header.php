<!DOCTYPE html>
<html>
	<head>
		<title>UMAK Clinic Consultation</title>
		<link rel='stylesheet' type='text/css' href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
		<link rel='stylesheet' type='text/css' href="<?php echo base_url('assets/css/bootstrap-theme.css')?>">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container" style="top: 12px; position: fixed; z-index: 99; left: 50%; transform: translate(-50%, 0);" >
			<?php
				if($this->session->flashdata('success_msg')){
			?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?php echo $this->session->flashdata('success_msg')?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } ?>

			<?php
				if($this->session->flashdata('error_msg')){
			?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert" >
				<?php echo $this->session->flashdata('error_msg')?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } ?>
		</div>
		<script type="text/javascript">
			$(".alert").delay(2500).slideUp(200, function() {
    			$(this).alert('close');
			});
		</script>
	<body>
</html>
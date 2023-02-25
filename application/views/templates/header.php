<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Slice POS v1.0</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo/pizzaposlogo-01.png">

	<!-- page css -->
	<link href="<?php echo base_url() ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

	<!-- Core css -->
	<link href="<?php echo base_url() ?>assets/css/app.min.css" rel="stylesheet">

	<link href="<?php echo base_url() ?>assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">

	<style>
		/* Hide scrollbar for Chrome, Safari and Opera */
		.table-responsive::-webkit-scrollbar {
			display: none;
		}

		/* Hide scrollbar for IE, Edge and Firefox */
		.table-responsive {
			-ms-overflow-style: none;  /* IE and Edge */
			scrollbar-width: none;  /* Firefox */
		}

		.card{
			background-color: #fff;
			border-radius: 12px;
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			overflow: hidden;
			box-shadow: 0 0 0.5px 0 rgb(0 0 0 / 14%), 0 1px 1px 0 rgb(0 0 0 / 24%);/*shadows can be removed for styling.*/
		}

		.containero {
			display: grid;
		}

		.contento, .overlayo {
			grid-area: 1 / 1;
			background-color: rgba(14, 14, 14, 0.18);
			border-radius: 15px;
		}

		/*
		.btn-primary {
			background-color: #ff3f24 !important;
			border-color: #f44336 !important;
		}
		*/
	</style>

</head>

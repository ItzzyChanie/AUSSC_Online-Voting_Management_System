<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
// Set timezone to Philippines (Asia/Manila)
date_default_timezone_set('Asia/Manila');
?>

<head>
  <link href="https://fonts.googleapis.com/css?family=Poppins:700,400&display=swap" rel="stylesheet">

  <style>
    .box.box-solid {
      background: #fffbe9 !important;
      border-radius: 16px;
      box-shadow: 0 2px 12px rgba(211,47,47,0.08);
      border: 1px solid #e0d6c3;
      margin-bottom: 32px;
      padding: 18px 24px;
    }
    .box-header.with-border {
      background: #fbeaea !important;
      color: #d32f2f !important;
      border-radius: 12px 12px 0 0;
      padding: 12px 24px;
      font-family: 'Poppins', Arial, sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
    }
    .box-title {
      font-family: 'Poppins', Arial, sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
    }
	.btn-platform, .btn-submit, .btn-reset {
		font-family: 'Poppins', Arial, sans-serif !important;
		font-weight: 600;
		font-size: 13px !important;
	}
	.btn-reset {
		background-color: #d32f2f !important;
		color: white !important;
	}
	.btn-submit {
		background-color: #157347 !important;
		color: white !important;
	}
  /* Responsive styling */
	@media (max-width: 768px) {
		.navbar-header {
		display: flex;
		align-items: center;
		}

		.navbar-header img {
		height: 32px;
		width: auto;
		margin-right: 8px;
		}

		.navbar-header .navbar-brand,
		.navbar-brand b {
		font-size: 14px !important;
		white-space: nowrap;
		}

		.page-header.title {
		font-size: 20px !important;
		text-align: center !important;
		}

		.navbar-custom-menu .user-header img {
		width: 30px !important;
		height: 30px !important;
		}

		.navbar-custom-menu .user-header p {
		display: none;
		}
		.navbar-custom-menu .user-footer {
		display: none;
		}

		.navbar-custom-menu .dropdown-toggle::after {
		display: inline-block;
		content: "\f0d7";
		font-family: FontAwesome;
		font-size: 18px;
		margin-left: 5px;
		}

		.mobile-logout {
		display: block;
		background-color: #fff;
		padding: 10px;
		border-top: 1px solid #ccc;
		text-align: left;
		}

		.mobile-logout a {
		display: block;
		color: #333;
		padding: 5px 0;
		}

		.box-body ul {
		padding-left: 0;
		list-style: none;
		}

		.box-body ul li {
		display: flex;
		align-items: center;
		margin-bottom: 12px;
		flex-wrap: wrap;
		}

		.box-body ul li input[type="radio"] {
		margin-right: 10px;
		flex-shrink: 0;
		}

		.box-body ul li img {
		width: 60px !important;
		height: 60px !important;
		border-radius: 8px;
		margin-right: 6px;
		flex-shrink: 0;
		}

		.box-body ul li .cname {
		font-size: 13px !important;
		font-weight: 600;
		max-width: 140px;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		margin-right: auto;
		display: inline-block;
		vertical-align: middle;
		}

		.box-body ul li .btn-platform,
		.box-body ul li .btn-reset {
		font-size: 0 !important; 
		padding: 6px 8px;
		border-radius: 8px;
		margin-left: 6px;
		}

		.box-body ul li .btn-platform {
		background-color: #4682B4 !important;
		color: white !important;
		}
		.box-body ul li .btn-platform i {
		font-size: 14px;
		color: white !important;
		}
		.box-body ul li .btn-reset i {
		font-size: 14px;
		}

		.box-body p .btn-reset {
		font-size: 0 !important;
		padding: 6px 8px;
		margin-left: 6px;
		}
		.box-body p .btn-reset i {
		font-size: 14px;
		}
	}
	.box-body ul li {
	display: flex;
	align-items: center;
	margin-bottom: 12px;
	}

	.box-body ul li input[type="radio"] {
	margin-right: 4px;
	}

	.box-body ul li button {
	margin-right: 8px;
	}

	.candidate-info {
	display: flex;
	align-items: center;
	}

	.candidate-info img {
	width: 60px !important;
	height: 60px !important;
	border-radius: 8px;
	margin-right: 8px;
	}

	.candidate-info .cname {
	font-size: 14px !important;
	font-weight: 600;
	white-space: nowrap;
	}
	.candidate-row {
	display: flex;
	align-items: center;
	}

	.candidate-row input[type="radio"] {
	margin-right: 6px;
	}

	.candidate-row button {
	position: relative;
	left: 7px;
	}

	.candidate-info {
	display: flex;
	align-items: center;
	}

	.candidate-info img {
	width: 60px !important;
	height: 60px !important;
	border-radius: 8px;
	margin-right: 8px;
	}

	.candidate-info .cname {
	font-size: 14px !important;
	font-weight: 600;
	white-space: nowrap;
	}
</style>
</head>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper" style="background-color: #F1E9D2 ">
	    <div class="container" style="background-color: #F1E9D2 ">

	      <!-- Main content -->
	      <section class="content">
	      	<?php
				// Get election title from config.ini (if still used)
				$parse = parse_ini_file('admin/config.ini', FALSE, INI_SCANNER_RAW);
				$title = $parse['election_title'];

				// Get schedule from database
				$sched_sql = "SELECT start_datetime, end_datetime FROM election_schedule LIMIT 1";
				$sched_query = $conn->query($sched_sql);

				if ($sched_query && $sched_query->num_rows > 0) {
					$sched_row = $sched_query->fetch_assoc();
					$start_date = $sched_row['start_datetime'];
					$end_date = $sched_row['end_datetime'];
				} 

				else {
					$start_date = null;
					$end_date = null;
				}

				$now = date('Y-m-d H:i:s');
	      	?>

	      	<h1 class="page-header text-center title"><b><?php echo strtoupper($title); ?></b></h1>
	        <div class="row">
	        	<div class="col-sm-10 col-sm-offset-1">
	        		<?php
				        if (isset($_SESSION['error'])) {
				        	?>

				        	<div class="alert alert-danger alert-dismissible">
				        		<button 
								type="button" 
								class="close" 
								data-dismiss="alert" 
								aria-hidden="true">&times;</button>

					        	<ul>
					        		<?php
					        			foreach ($_SESSION['error'] as $error) {
					        				echo "<li>".$error."</li>";
					        			}
					        		?>
					        	</ul>

					        </div>
				        	<?php
				         	unset($_SESSION['error']);

				        }
				        if (isset($_SESSION['success'])) {
				          	echo "
				            	<div class='alert alert-success alert-dismissible'>
				              		<button 
									type='button' 
									class='close' 
									data-dismiss='alert' 
									aria-hidden='true'>&times;</button>

				              		<h4><i class='icon fa fa-check'></i> Success!</h4>
				              	".$_SESSION['success']."
				            	</div>
				          	";
				          	unset($_SESSION['success']);
				        }

				    ?>
 
				    <div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
		        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        	<span class="message"></span>
			        </div>

				    <?php
				    	// Voting schedule check
						if (!$start_date || !$end_date) {
							echo "<div class='alert alert-warning text-center'>
							<b>Voting schedule has not been set by the admin.</b></div>";
						} 

						else if 
							(strtotime($now) < strtotime($start_date) || 
							strtotime($now) > strtotime($end_date)) {
									
							echo 
							"<div class='alert alert-info text-center'>
							<b>Voting is not open at this time.<br>Voting period: "
							.date('M d, Y h:i A', 
							strtotime($start_date))." to "
							.date('M d, Y h:i A', 
							strtotime($end_date))."</b></div>";
						} 

						else {
							$sql = "SELECT * FROM votes WHERE voters_id = '".$voter['id']."'";
							$vquery = $conn->query($sql);
							if ($vquery->num_rows > 0){
				    		?>

				    		<div class="text-center" 
								style="color:black; 
								font-size: 35px; 
								font-family:'Montserrat', Arial, sans-serif;" >

					    		<h3>You have already voted for this election.</h3>

								<button 
								type="button" 
								data-toggle="modal" 
								data-target="#view" 
								class="btn btn-curve btn-primary btn-lg" 
								style="background-color: #d32f2f;
								color:white; 
								font-size: 22px; 
								font-family:'Montserrat', Arial, sans-serif;">View Ballot</button>
					    	</div>
				    		<?php
				    	}
				    	else {
				    		?>
			    			<!-- Voting Ballot -->
						    <form method="POST" id="ballotForm" action="submit_ballot.php">
				        		<?php
				        			include 'includes/slugify.php';

				        			$candidate = '';
				        			$sql = "SELECT * FROM positions ORDER BY priority ASC";
									$query = $conn->query($sql);

									while
									($row = $query->fetch_assoc()) {
										$sql = "SELECT * FROM candidates WHERE position_id='".$row['id']."'";
										$cquery = $conn->query($sql);

										while
										($crow = $cquery->fetch_assoc()) {
											$slug = slugify($row['description']);
											$checked = '';

											if (isset($_SESSION['post'][$slug])) {
												$value = $_SESSION['post'][$slug];

												if (is_array($value)) {
													foreach($value as $val){
														if ($val == $crow['id']) {
															$checked = 'checked';
														}
													}
												}
												else {
													if ($value == $crow['id']) {
														$checked = 'checked';
													}
												}
											}
											// Force all candidate selection inputs to be radio buttons
											$input = '<input type="radio" class="flat-red '.$slug.'" name="'.slugify(
											$row['description']).'" value="'.$crow['id'].'" '.$checked.'>';
											
											$image = (!empty($crow['photo'])) ? 'images/'.$crow['photo'] : 'images/profile.jpg';

											$candidate .= '
											<li>
												<div class="candidate-row">
												'.$input.'

												<button type="button" class="btn btn-primary btn-sm btn-curve clist platform btn-platform" 
													style="background-color: #4682B4;
													color:white; 
													font-size: 13px; 
													font-family:Poppins, Arial, sans-serif;
													margin-left: 5px;" 
													data-platform="'.$crow['platform'].'" 
													data-fullname="'.$crow['firstname'].' '.$crow['lastname'].'">
													<i class="fa fa-search"></i>
												</button>

												<div class="candidate-info">
													<img src="'.$image.'" height="100px" width="100px" class="clist">
													<div style="display: flex; flex-direction: column;">
														<span class="partylist clist" style="font-size:12px; color:#4682B4; font-weight:600;">
															[ '.$crow['partylist'].' Party List ]
														</span>
														<span class="cname clist">'.$crow['firstname'].' '.$crow['lastname'].'</span>
													</div>
												</div>
												</div>
											</li>
											';
										}

										$instruct = ($row['max_vote'] > 1) ? 'You may select up to '.$row['max_vote'].' candidates' : 'Select only one candidate';

										echo '
											<div class="row">
												<div class="col-xs-12">

													<div class="box box-solid" 
													style="background-color: #d8d1bd" id="'.$row['id'].'">

														<div class="box-header with-border" 
														style="background-color: #d8d1bd">
														<h3 class="box-title"><b>'.$row['description'].'</b></h3>
														</div>

														<div class="box-body" >
															<p>'.$instruct.'
																<span class="pull-right">
																	<button type="button" class="btn btn-reset btn-sm btn-curve reset" 
																	style="background-color:#d32f2f;
																	color:white; 
																	font-size: 13px; 
																	font-family:Poppins, Arial, sans-serif;"  
																	data-desc="'.slugify($row['description']).'">
																	<i class="fa fa-refresh"></i> Reset</button>
																</span>
															</p>

															<div id="candidate_list">
																<ul>
																	'.$candidate.'
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										';

										$candidate = '';

									}	

				        		?>
				        		<div class="text-center">
									<button 
									type="submit" 
									class="btn btn-submit btn-curve" 
									style='background-color: #157347 ;
									color:white; 
									font-size: 13px; 
									font-family:Poppins, Arial, sans-serif;' 
									name="vote">
									<i class="fa fa-check-square-o"></i> Submit</button>
					        	</div>
				        	</form>
				        	<!-- End Voting Ballot -->
				    		<?php
				    	}
				    	}
	        		?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/ballot_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<script>
$(function() {
	$('.content').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});

	$(document).on('click', '.reset', function(e) {
		e.preventDefault();
		var desc = $(this).data('desc');
		$('.'+desc).iCheck('uncheck');
	});

	$(document).on('click', '.platform', function(e) {
		e.preventDefault();
		$('#platform').modal('show');
		var platform = $(this).data('platform');
		var fullname = $(this).data('fullname');
		$('.candidate').html(fullname);
		$('#plat_view').html(platform);
	});

	function allPositionsFilled() {
		var allFilled = true;
		$('.box.box-solid').each(function() {
			var checked = $(this).find('input[type=radio]:checked').length;
			if(checked === 0){
				allFilled = false;
			}
		});
		return allFilled;
	}
});
</script>
</body>
</html>
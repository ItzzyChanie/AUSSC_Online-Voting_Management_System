<?php
session_start();
include 'includes/conn.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$student_id = $_POST['student_id'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM voters WHERE student_id = '$student_id'";
		$query = $conn->query($sql);
		if ($query->num_rows < 1) {
				$error = 'Cannot find voter with the Student ID';
		} else {
				$row = $query->fetch_assoc();
		if ($password == $row['password']) {
			$_SESSION['voter'] = $row['id'];
			header('Location: home.php');
			exit();
				} else {
						$error = 'Incorrect password';
				}
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Voter Login</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700,400&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body {
			position: relative;
			min-height: 100vh;
			font-family: 'Montserrat', Arial, sans-serif;
			background: url('images/Background.png') no-repeat center center fixed;
			background-size: cover;
		}
		.main-logo {
			width: 40px;
			height: 40px;
			background: #d32f2f;
			border-radius: 8px;
			display: inline-block;
			margin-right: 10px;
		}
		.nav-link.active {
			font-weight: bold;
			border-bottom: 2px solid #d32f2f;
		}
		.btn-red {
			background: #d32f2f;
			color: #fff;
			font-weight: bold;
			font-size: 1.2rem;
			border-radius: 8px;
			box-shadow: 2px 2px 6px #bdbdbd;
			border: none;
		}
		.btn-red:hover {
			background: #b71c1c;
			color: #fff;
		}

		.shadow-input {
			box-shadow: 2px 2px 6px #bdbdbd;
			border-radius: 8px;
			border: none;
			background: #fbeaea;
		}
		.welcome-title {
			font-size: 2.8rem;
			font-weight: 700;
			color: #d32f2f;
			margin-bottom: 0.5rem;
		}
		.welcome-sub {
			font-size: 2.8rem;
			font-weight: 700;
			color: #d32f2f;
			margin-bottom: 1.5rem;
		}
		.explore-btn {
			background: #d32f2f;
			color: #ffffffff;
			font-weight: bold;
			border-radius: 8px;
			box-shadow: 2px 2px 6px #bdbdbd;
			border: none;
			padding: 0.7rem 2rem;
			font-size: 1.1rem;
		}
		.explore-btn:hover {
			background: #b71c1c;
			color: #fff;
		}
		.social-btn:last-child { margin-right: 0; }
		.login-form label { font-weight: 500; }
		.login-form .form-check-label { font-weight: 400; }
		.forgot-link { font-weight: 600; color: #222; text-decoration: none; }
		.forgot-link:hover { color: #d32f2f; }
		@media (max-width: 900px) {
			.main-row { flex-direction: column; }
			.left-col, .right-col { width: 100%; }
			.right-col { margin-top: 2rem; }
		}
	</style>
	</style>
</head>
<body>
    
	<div style="width:100%; position:relative; padding:24px 0 0 0;">
		<img src="images/AUSSC_logo.png" alt="AUSSC Logo" style="position:absolute; top:10px; left:62px; height:89px; max-width:100%; z-index:2;">
		<ul class="d-flex" style="gap:2.5rem; list-style:none; margin:0; padding:0; justify-content:center; align-items:center;">
			<li><a class="nav-link" href="#" style="padding-left:1rem; padding-right:1rem; font-weight:500;">Home</a></li>
			<li><a class="nav-link" href="#" style="padding-left:1rem; padding-right:1rem; font-weight:500;">About</a></li>
			<li><a class="nav-link" href="#" style="padding-left:1rem; padding-right:1rem; font-weight:500;">Executives</a></li>
			<li><a class="nav-link active" href="#" style="padding-left:1rem; padding-right:1rem; font-weight:700; border-bottom:2px solid #d32f2f;">Sign in</a></li>
		</ul>
	</div>
	<div class="container-fluid mt-5">
		<div class="d-flex main-row" style="min-height: 80vh;">
			<div class="left-col d-flex flex-column justify-content-center align-items-start" style="flex:1; padding-left: 5vw;">
		<div class="welcome-title w-100" style="line-height:1.1; text-align:left;">Welcome to AUSSC<br><span style="font-size:3rem; color:#d32f2f; font-weight:800;">Online Voting System</span></div>
			<div class="mb-4" style="color:#222; font-size:1rem;">Think wise and Cast your vote now in AUSSC Online Voting System</div>
				<a href="running_candidates.php" class="explore-btn mb-5" style="text-decoration: none;">View Running Candidates</a>
				<div style="display: flex; align-items: center; gap: 12px;">
					<img src="images/au logo.png" alt="Au Logo" style="width:50px; max-width:50px;">
					<img src="images/osa_logo.png" alt="OSA Logo" style="width:55px; max-width:55px;">
					<img src="images/OSA.png" alt="OSA Logo" style="width:100px; max-width:100px;">
				</div>
			</div>
			<div class="right-col d-flex flex-column justify-content-center align-items-center" style="position:relative; padding-right: 5.5vw;">
					<form class="login-form" style="max-width:520px; min-width:400px; background: rgba(255,255,255,0.4); padding: 12px 32px; border-radius: 16px; min-height: 320px;" method="POST" action="">
						<div style="position:relative; padding-left:70px; ">
							<img src="images/AUSSC_logo.png" alt="AUSSC Logo" style="height:200px; position:relative;  ">
						</div>
					<?php if (!empty($error)): ?>
						<div class="alert alert-danger text-center mb-3"> <?php echo $error; ?> </div>
					<?php endif; ?>
					<div class="mb-3">
						<input type="text" class="form-control shadow-input" placeholder="Student ID" name="student_id" required>
					</div>
					<div class="mb-3">
						<input type="password" class="form-control shadow-input" placeholder="Password" name="password" required>
					</div>
					<div class="d-flex justify-content-between align-items-center mb-4">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="remember" name="remember">
							<label class="form-check-label" for="remember">Remember me</label>
						</div>
						<a href="#" class="forgot-link">Forgot Password?</a>
					</div>
					<button type="submit" class="btn btn-red w-100 mb-3" name="login">SIGN IN</button>
					  <!-- Social login removed -->
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
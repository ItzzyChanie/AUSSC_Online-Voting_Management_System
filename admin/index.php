
<?php
session_start();
if (isset($_SESSION['admin'])) {
	header('location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login | Online Voting System</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700,400&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<style>
		html, body {
			font-family: 'Montserrat', Arial, sans-serif;
			background: url('../images/Background.png') no-repeat center center fixed;
			background-size: cover;
			min-height: 100vh;
			overflow: hidden;
		}
		.main-logo {
			width: 40px;
			height: 40px;
			background: #d32f2f;
			border-radius: 8px;
			display: inline-block;
			margin-right: 10px;
		}
		.navbar-custom {
			background: rgba(255,255,255,0.85);
			box-shadow: 0 2px 8px #bdbdbd;
			padding: 0.5rem 0;
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
		.login-title {
			font-size: 3rem;
			font-weight: 900;
			color: #d32f2f;
			margin-bottom: 0.5rem;
			line-height: 1.1;
			text-align: center;
		}
		.login-sub {
			font-size: 1.3rem;
			color: #222;
			margin-bottom: 1.5rem;
			text-align: center;
			position: relative;
			bottom: 8px;
		}
		.logo-row {
			display: flex;
			justify-content: center;
			align-items: center;
			gap: 18px;
			position: relative;
			bottom: 10px;
		}
		@media (max-width: 900px) {
			.main-row { flex-direction: column; }
			.left-col, .right-col { width: 100%; }
			.right-col { margin-top: 2rem; }
		}
	</style>
</head>

<body>
	<!-- Navbar with AUSSC logo at top left and centered menu -->
	<div class="d-flex align-items-center w-100" style="margin-top: 25px; position:relative;">
		<div style="position:absolute; left:62px; top:0; height:60px; display:flex; align-items:center;">
			<img src="../images/AUSSC_logo.png" alt="AUSSC Logo" style="height:88px; width:auto;">
		</div>
		<div class="flex-grow-1 d-flex justify-content-center">
			<ul class="d-flex" style="gap:2.5rem; list-style:none; margin:0; padding:0;">
				<li><a class="nav-link" href="../home.php" style="padding-left:1rem; padding-right:1rem; font-weight:500;">Home</a></li>
				<li><a class="nav-link" href="#" style="padding-left:1rem; padding-right:1rem; font-weight:500;">About</a></li>
				<li><a class="nav-link" href="#" style="padding-left:1rem; padding-right:1rem; font-weight:500;">Executives</a></li>
				<li><a class="nav-link active" href="#" style="padding-left:1rem; padding-right:1rem; font-weight:700; border-bottom:2px solid #d32f2f;">Sign in</a></li>
			</ul>
		</div>
	</div>

	<div class="container-fluid mt-5">
		<div class="d-flex main-row" style="min-height: 80vh; justify-content:center; align-items:center;">
			<div class="left-col d-flex flex-column justify-content-center align-items-center" style="flex:1;">
				<div class="login-title">Welcome to AUSSC<br>Online Voting System<br>Admin</div>
				<div class="login-sub">Sign in to start your admin session</div>
				<div class="logo-row">
					<img src="../images/au logo.png" alt="Au Logo" style="width:50px; max-width:50px;">
					<img src="../images/osa_logo.png" alt="OSA Logo" style="width:55px; max-width:55px;">
					<img src="../images/osa.png" alt="OSA Logo" style="width:100px; max-width:100px;">
				</div>
			</div>

			<div class="right-col d-flex flex-column justify-content-center align-items-center" style="flex:1;">
				<form class="login-form w-100" style="max-width:420px; min-width:320px; background: rgba(255,255,255,0.4); padding: 24px 32px; border-radius: 16px; min-height: 320px;" method="POST" action="login.php">
					<div style="text-align:center; margin-bottom:1rem;">
						<img src="../images/AUSSC_logo.png" alt="AUSSC Logo" style="height:210px;">
					</div>

					<?php
					if(isset($_SESSION['error'])){
						echo "<div class='alert alert-danger text-center mb-3'>".$_SESSION['error']."</div>";
						unset($_SESSION['error']);
					}
					?>

					<div class="mb-3">
						<input type="text" class="form-control shadow-input" name="username" placeholder="Username" required>
					</div>
					
					<div class="mb-3">
						<input type="password" class="form-control shadow-input" name="password" placeholder="Password" required>
					</div>
					<button type="submit" class="btn btn-red w-100 mb-3" name="login">SIGN IN</button>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
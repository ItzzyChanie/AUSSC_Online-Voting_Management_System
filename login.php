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
	} 
	else {
		$row = $query->fetch_assoc();

		// Use password_verify for hashed password
		if (password_verify($password, $row['password'])) {
			$_SESSION['voter'] = $row['id'];
			header('Location: home.php');
			exit();
		} 
		else {
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
		background: url('images/white-blue.jpg') no-repeat center center fixed;
		background-size: cover;
	}
	body::before {
		content: "";
		position: fixed;
		top: 0; left: 0; right: 0; bottom: 0;
		background: inherit;
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		z-index: -1;
		pointer-events: none;
	}
	.main-logo {
		width: 40px;
		height: 40px;
		background: #1b22edff;
		border-radius: 8px;
		display: inline-block;
		margin-right: 10px;
	}
	.nav-link,
	.desktop-nav.nav-center li a {
		color: #1b22edff !important;
	}
	.nav-link.active,
	.desktop-nav.nav-center li a.active {
		font-weight: bold;
		border-bottom: 2px solid #1b22edff;
		color: #1b22edff !important;
	}
	.btn-red {
		background: #1b22edff;
		color: #fff;
		font-weight: bold;
		font-size: 1.2rem;
		border-radius: 8px;
		box-shadow: 2px 2px 6px #201f1fff;
		border: none;
	}
	.btn-red:hover {
		background: #041e79ff;
		color: #fff;
	}

	.shadow-input {
		box-shadow: 2px 2px 6px #201f1fff;
		border-radius: 8px;
		border: none;
		background: #fff;
	}
	.welcome-title {
		font-size: 2.8rem;
		font-weight: 700;
		color: #1b22edff;
		margin-bottom: 0.5rem;
	}
	.welcome-sub {
		font-size: 2.8rem;
		font-weight: 700;
		color: #ffffffff;
		margin-bottom: 1.5rem;
	}
	.explore-btn {
		background: #1b22edff;
		color: #ffff;
		font-weight: bold;
		border-radius: 8px;
		box-shadow: 2px 2px 6px #545353ff;
		border: none;
		padding: 0.7rem 2rem;
		font-size: 1.1rem;
	}
	.explore-btn:hover {
		background: #0a2873ff;
		color: #fff;
	}
	.social-btn:last-child { margin-right: 0; }
	.login-form label { font-weight: 500; }
	.login-form .form-check-label { font-weight: 400; }
	.forgot-link { font-weight: 600; color: #222; text-decoration: none; }
	.forgot-link:hover { color: #2f42d3ff; }

	@media (max-width: 900px) {
		.main-row { flex-direction: column; }
		.left-col, .right-col { width: 100%; }
		.right-col { margin-top: 2rem; }
	}

	@media (max-width: 600px) {
	body {
		padding: 0;
	}
	.left-col {
		display: none !important;
	}
	.mobile-center-content {
		display: flex !important;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		margin-bottom: 1.5rem;
	}
	.mobile-center-content .explore-btn {
		margin-bottom: 1.2rem;
	}
	.login-form {
		min-width: unset !important;
		max-width: 100% !important;
		width: 100%;
		margin: 0 30px 50px 30px;
	}
	.right-col {
		padding: 0 !important;
		width: 100%;
		margin: 0;
		justify-content: flex-start !important;
	}
	.desktop-nav {
		display: none !important;
	}
	.mobile-nav {
		display: flex !important;
	}
	.header-row {
		background: none !important;
		box-shadow: none !important;
	}
	.login-form img[alt="AUSSC Logo"] {
		display: block;
		margin: 0 auto 1rem auto;
		height: 140px !important;
		position: static !important;
		padding-right: 62px !important;
	}
	.login-form .form-check-label,
	.login-form .forgot-link {
		font-size: 0.85rem;
	}
}

	@media (min-width: 601px) {
		.mobile-nav {
			display: none !important;
		}
		.mobile-center-content {
			display: none !important;
		}
	}

	.burger {
		width: 34px;
		height: 34px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		cursor: pointer;
		z-index: 20;
	}
	.burger span {
		display: block;
		width: 26px;
		height: 4px;
		background: #2f42d3ff;
		margin: 4px 0;
		border-radius: 2px;
		transition: all 0.3s;
	}

	.mobile-menu-panel {
		position: fixed;
		top: 0;
		right: 0;
		width: 220px;
		height: 100vh;
		background: #0c12a7ff;
		box-shadow: -2px 0 10px rgba(0,0,0,0.08);
		display: none;
		flex-direction: column;
		padding: 2.5rem 1.5rem 1rem 1.5rem;
		z-index: 100;
		animation: slideIn 0.2s;
	}
	@keyframes slideIn {
		from { right: -220px; }
		to { right: 0; }
	}
	.mobile-menu-panel.show {
		display: flex;
	}
	.mobile-menu-panel a {
		font-size: 1.1rem;
		color: #ffffffff !important; /* blue for mobile */
		font-weight: 600;
		margin-bottom: 1.2rem;
		text-decoration: none;
	}
	@media (min-width: 601px) {
		.mobile-menu-panel a {
			color: #fff !important; /* white for desktop */
		}
	}
	.mobile-menu-panel .close-btn {
		position: absolute;
		top: 1.1rem;
		right: 1.1rem;
		font-size: 2rem;
		color: #2f42d3ff;
		background: none;
		border: none;
		cursor: pointer;
	}

	.header-logo {
		height: 100px; 
		max-width: 100%;
		
		position: relative;
		left: 47px;
		bottom: 40px;
	}

	@media (min-width: 768px) {
	.header-row {
		display: flex;
		justify-content: space-between;
		align-items: flex-start;
		padding: 1.5rem 2rem;
		flex-direction: row !important;
		position: relative;
	}

	.logo-container {
		position: relative;
		left: 20px;
		top: 0;
		margin-right: auto;
	}

	.header-logo {
		height: 150px;
		margin-bottom: 0;
	}

	.desktop-nav.nav-center {
		position: absolute;
		top: 25px;
		left: 50%;
		transform: translateX(-50%);
		display: flex !important;
		justify-content: center;
		align-items: center;
		gap: 2.5rem;
	}

	.desktop-nav.nav-center li a {
		padding: 0 1rem;
		font-weight: 500;
		text-decoration: none;
		color: #2f42d3ff;
	}

	.desktop-nav.nav-center li a.active {
		font-weight: 700;
		border-bottom: 2px solid #08157aff;
	}
	}

	.logo-container {
		position: relative;
		z-index: 2;
	}

	.nav-center {
		gap: 2.5rem;
		list-style: none;
		margin: 0 auto;
		padding: 0;
		position: relative;
		top: 0;
		z-index: 1;
	}

	.nav-center li a {
		padding: 0 1rem;
		font-weight: 500;
	}

	.nav-center li a.active {
		font-weight: 700;
		border-bottom: 2px solid #2f42d3ff;
	}

	@media (max-width: 767px) {
		.header-row {
			flex-direction: row;
			justify-content: space-between;
			align-items: center;
			padding: 0.75rem 1rem !important;
		}

		.logo-container {
			position: relative;
			left: 0;
			top: 0;
			margin-left: 0;
		}

		.header-logo {
			height: 100px;
			left: 0;
			bottom: 0;
			top: 2px;
		}

		.mobile-nav {
			position: relative;
			top: 0;
			right: 0;
		}
	}
	.logo-text-mobile {
		display: none;
	}
	@media (max-width: 600px) {
		.logo-container {
			display: flex;
			align-items: center;
		}
		.logo-text-mobile {
			display: inline-block;
			margin-left: -8px;
			font-size: 1rem;
			font-weight: 600;
			color: #fff; 
		}
		.burger span {
			background: #06046cd8;
		}
	}
</style>

</head>
<body>
	<!-- Responsive header row -->
		<div class="header-row d-flex align-items-center position-relative" style="width:100%; padding:24px 0;">
	<!-- Logo to top-left -->
	<div class="logo-container d-flex align-items-center">
		<img class="header-logo" src="images/au_comelec.png" alt="AUSSC Logo">
		<span class="logo-text-mobile">AUSSC - VMS</span>
	</div>

	<!-- Centered nav (desktop only) -->
	<ul class="d-flex desktop-nav nav-center">
		<li><a class="nav-link" href="#">Result</a></li>
		<li><a class="nav-link" href="#">About</a></li>
		<li><a class="nav-link" href="#">Executives</a></li>
		<li><a class="nav-link active" href="#">Sign in</a></li>
	</ul>

	<!-- Mobile burger -->
	<div class="mobile-nav">
		<div class="burger" id="burgerMenu" aria-label="Open menu" tabindex="0">
		<span></span>
		<span></span>
		<span></span>
		</div>
	</div>
	</div>

	<!-- Mobile menu panel -->
	<div class="mobile-menu-panel" id="mobileMenuPanel">
		<button class="close-btn" id="closeMobileMenu" aria-label="Close menu">&times;</button>
		<a href="#">Result</a>
		<a href="#">About</a>
		<a href="#">Executives</a>
		<a href="#" class="active" style="font-weight:700; border-bottom:2px solid #e2e23eff;">Sign in</a>
	</div>
	
	<div class="container-fluid mt-5">
		<div class="d-flex main-row" style="position: relative; bottom: 70px;">

			<!-- Desktop/tablet left col -->
			<div class="left-col d-flex flex-column justify-content-center align-items-start" style="flex:1; padding-left: 5vw;">
				<div class="welcome-title w-100" style="line-height:1.1; text-align:left;">Welcome to AUSSC<br><span style="font-size:3rem; color:#1b22edff; font-weight:800;">Voting Management System</span></div>
				<div class="mb-4" style="color:#000; font-size:1rem;">Think wise and Cast your vote now in AUSSC - Voting Management System</div>
				<a href="running_candidates.php" class="explore-btn mb-5" style="text-decoration: none;">View Running Candidates</a>
				<div style="display: flex; align-items: center; gap: 5px; position: relative; bottom: 30px;">
					<img src="images/au logo.png" alt="Au Logo" style="width:50px; max-width:50px;">
					<img src="images/osa_logo.png" alt="OSA Logo" style="width:55px; max-width:55px;">
					<img src="images/OSA.png" alt="OSA Logo" style="width:100px; max-width:100px;">
				</div>
			</div>

			<!-- Mobile center content (hidden on desktop) -->
			<div class="mobile-center-content" style="display:none; width:100%;">
				<a href="running_candidates.php" class="explore-btn mb-3" style="text-decoration: none;">View Running Candidates</a>
				<div style="display: flex; align-items: center; gap: 1px; margin-bottom: 1px; margin-top: 1px;">
					<img src="images/au logo.png" alt="Au Logo" style="width:50px; max-width:50px;">
					<img src="images/osa_logo.png" alt="OSA Logo" style="width:55px; max-width:55px;">
					<img src="images/OSA.png" alt="OSA Logo" style="width:100px; max-width:100px;">
				</div>
			</div>

			<!-- Login form column -->
			<div class="right-col d-flex flex-column justify-content-center align-items-center" style="position:relative; padding-right: 5.5vw;">
				<form class="login-form" style="max-width:520px; min-width:400px; border: 2px solid blue; background: rgba(252, 253, 254, 0.44); padding: 12px 32px; border-radius: 16px; min-height: 320px;" method="POST" action="">
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
				</form>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

	<script>
		// Burger menu toggle for mobile
		const burger = document.getElementById('burgerMenu');
		const mobileMenu = document.getElementById('mobileMenuPanel');
		const closeBtn = document.getElementById('closeMobileMenu');

		if (burger && mobileMenu && closeBtn) {
			burger.addEventListener('click', function() {
				mobileMenu.classList.add('show');
				document.body.style.overflow = 'hidden';
			});

			closeBtn.addEventListener('click', function() {
				mobileMenu.classList.remove('show');
				document.body.style.overflow = '';
			});

			// Close menu on link click (for SPA feel)
			mobileMenu.querySelectorAll('a').forEach(function(link) {
				link.addEventListener('click', function() {
					mobileMenu.classList.remove('show');
					document.body.style.overflow = '';
				});
			});
		}
	</script>
</body>
</html>
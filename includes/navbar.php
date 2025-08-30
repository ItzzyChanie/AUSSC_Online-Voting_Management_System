<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Poppins:700,400&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      padding-top: 60px;
    }
    .fixed-navbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 9999;
      height: 60px;
    }
    .navbar-left {
      display: flex;
      align-items: center;
      gap: 10px;
      padding-left: 10px;
    }
    .navbar-left img {
      height: 50px;
      width: auto;
      vertical-align: middle;
      padding-top: 5px;
    }
    .navbar-left .navbar-brand {
      color: white;
      font-size: 22px;
      font-family: 'Poppins', Arial, sans-serif;
      line-height: 1;
      background-color: transparent;
      padding-top: 20px;
    }
    .navbar-right {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 50px;
      padding-right: 30px;
      padding-top: 10px;
    }
    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .navbar-right img {
      height: 40px;
      width: 40px;
      border-radius: 50%;
      object-fit: cover;
    }
    .navbar-right span {
      color: white;
      font-size: 22px;
      font-family: 'Poppins', Arial, sans-serif;
      line-height: 1;
    }
    .navbar-right a {
      color: white;
      font-size: 22px;
      font-family: 'Poppins', Arial, sans-serif;
      text-decoration: none;
    }
    /* Add padding to body to prevent content being hidden under navbar */
    .navbar-spacer {
      height: 70px;
      width: 100%;
      display: block;
    }
  </style>
</head>

<body>
  <header class="main-header fixed-navbar" style="background-color:#d32f2f; border-bottom:none;">
    <nav class="navbar navbar-static-top" style="background-color:#d32f2f; box-shadow:none; border-bottom:none;">
      <div class="container-fluid" style="background-color:#d32f2f; border-bottom:none;">
        <div class="row w-100 align-items-center" style="margin:0; border-bottom:none;">
          <!-- Left side -->
          <div class="col-xs-4 navbar-left">
            <img src="images/AUSSC_logo.png" alt="AUSSC Logo">
            <a href="#" class="navbar-brand"><b>AUSSC E-VOTING SYSTEM</b></a>
          </div>
          <!-- Right side -->
          <div class="col-xs-8 navbar-right">
            <div class="user-info">
              <img src="<?php echo (!empty($voter['photo'])) ? 'images/'.$voter['photo'] : 'images/profile.jpg' ?>" alt="User Image">
              <span><b><?php echo $voter['firstname'].' '.$voter['lastname']; ?></b></span>
            </div>
            <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
</body>
</html>

<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="custom-fonts.css">

<header class="main-header" 
        style="background-color:#d32f2f; 
        position:fixed; 
        top:0; left:0; 
        width:100%; 
        z-index:1050;" >

  <!-- Logo -->
  <a href="#" class="logo " style="background-color: #d32f2f">

    <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini" style="background-color: #d32f2f"><b>AU</b>ES</span>

  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg " 
        style="background-color:#d32f2f; 
        color:white; 
        font-size: 22px; 
        display: flex; 
        align-items: center;">

    <marquee behavior="scroll" direction="left" style="display: flex; align-items: center;">
    <img src="/votesystem/images/AUSSC_logo.png" alt="AUSSC Logo" style="height:45px; position: relative; top: -3px;">
      AUSSC Online Voting System
    </marquee>
  </span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top " style="background-color: #d32f2f;">

    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only ">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu" style="color:white; font-size: 17px;">
      <ul class="nav navbar-nav" style="background-color: #d32f2f; color:white; font-size: 17px;" >

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu  " style="color:white;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #d32f2f; color:white; font-size: 17px;" >
            <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $user['firstname'].' '.$user['lastname']; ?></span>
          </a>
          
          <ul class="dropdown-menu" style="background-color: #b71c1c; color:white; font-size: 17px;">

            <!-- User image -->
            <li class="user-header" style="background-color:#b71c1c; color:white; font-size: 17px;">
              <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $user['firstname'].' '.$user['lastname']; ?>
                <small>Member since <?php echo date('M. Y', strtotime($user['created_on'])); ?></small>
              </p>
            </li>

            <li class="user-footer" 
                style="background-color: #d32f2f; 
                color:white; 
                font-size: 17px;" >

              <div class="pull-left " 
                  style="background-color: #d32f2f; 
                  color:white; 
                  font-size: 17px;">

                <a href="#profile" 
                  data-toggle="modal" 
                  class="btn btn-default btn-curve" 
                  style="background-color: #d2d5d8" 
                  id="admin_profile">Update</a>
              </div>
              
              <div class="pull-right" style="background-color:#d32f2f; color:black; font-size: 17px;">
                <a href="logout.php" class="btn btn-default btn-curve" style="background-color: #d2d5d8" >  Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>
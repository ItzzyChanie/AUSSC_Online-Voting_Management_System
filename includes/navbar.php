<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:700,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

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
      position: relative;
    }
    .navbar-left img {
      height: 60px;
      width: auto;
      vertical-align: middle;
      transition: all 0.3s ease;
      position: relative;
      transform: scale(1.4);
    }
    .navbar-left .navbar-brand {
      color: white;
      font-size: 22px;
      font-family: 'Poppins', Arial, sans-serif;
      line-height: 1;
      background-color: transparent;
      transition: all 0.3s ease;
    }

    .navbar-right {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 10px;
      padding-right: 20px;
      padding-top: 10px;
      position: relative;
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
      transition: all 0.3s ease;
    }
    .navbar-right span {
      color: white;
      font-size: 22px;
      font-family: 'Poppins', Arial, sans-serif;
      line-height: 1;
      display: inline-block;
    }
    .navbar-right a.logout-link {
      color: white;
      font-size: 22px;
      font-family: 'Poppins', Arial, sans-serif;
      text-decoration: none;
      display: inline-block;
    }
    .dropdown-toggle {
      cursor: pointer;
      display: none;
      color: white;
    }
    .mobile-dropdown {
      display: none;
      position: absolute;
      top: 60px;
      right: 10px;
      background-color: white;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px 15px;
      min-width: 160px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      z-index: 10000;
    }
    .mobile-dropdown a {
      display: block;
      color: #333;
      padding: 5px 0;
      font-size: 14px;
      text-decoration: none;
    }
    .mobile-dropdown a:hover {
      text-decoration: underline;
    }
    .brand-full {
      display: inline;
    }
    .brand-short {
      display: none;
    }
    @media (max-width: 768px) {
      .navbar-left {
        flex-direction: row;
        align-items: flex-end;
        gap: 5px;
        padding-left: 0;
      }
      .navbar-left img {
        height: 60px;
        position: relative;
        bottom: 3px;
        transform: scale(1.3);
        margin-right: 12px;
      }
      .navbar-left .navbar-brand {
        font-size: 13px;
        padding: 0;
        margin: 0;
        line-height: 1.5;
        position: relative;
        right: 10px;
        top: 9px;
      }
      .navbar-right {
        padding-right: 10px;
        padding-top: 13px;
      }
      .navbar-right span {
        display: none !important;
      }
      .navbar-right a.logout-link {
        display: none !important;
      }
      .dropdown-toggle {
        display: inline-block !important;
        font-size: 20px;
      }
      .navbar-right img {
        height: 30px;
        width: 30px;
      }
      .brand-full {
        display: none;
      }
      .brand-short {
        display: inline;
      }
    }
  </style>
</head>

<body>
  <header class="main-header fixed-navbar" style="background-color:#3137ebe2; border-bottom:none;">
    <nav class="navbar navbar-static-top" style="background-color:#3137ebe2; box-shadow:none; border-bottom:none;">
      <div class="container-fluid" style="background-color:#3137ebe2; border-bottom:none;">
        <div class="row w-100 align-items-center" style="margin:0; border-bottom:none;">
          <!-- Left side -->
          <div class="col-xs-6 navbar-left">
            <img src="images/au_comelec.png" alt="AUSSC Logo">
            <a href="#" class="navbar-brand">
              <b>
                <span class="brand-full">AUSSC - VOTING MANAGEMENT SYSTEM</span>
                <span class="brand-short">AUSSC - VMS</span>
              </b>
            </a>
          </div>

          <!-- Right side -->
          <div class="col-xs-6 navbar-right">
            <div class="user-info">
              <img src="<?php echo (!empty($voter['photo'])) ? 'images/'.$voter['photo'] : 'images/profile.jpg' ?>" alt="User Image">
              <span><b><?php echo $voter['firstname'].' '.$voter['lastname']; ?></b></span>

              <!-- Dropdown icon for mobile -->
              <i class="fa fa-chevron-down dropdown-toggle" id="dropdownToggle"></i>
            </div>

            <!-- Logout for desktop -->
            <a href="logout.php" class="logout-link"><i class="fa fa-sign-out"></i> Logout</a>

            <!-- Mobile dropdown -->
            <div class="mobile-dropdown" id="mobileDropdown">
              <a href="#"><?php echo $voter['firstname'].' '.$voter['lastname']; ?></a>
              <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const toggle = document.getElementById('dropdownToggle');
      const dropdown = document.getElementById('mobileDropdown');

      if (toggle) {
        toggle.addEventListener('click', function (e) {
          e.stopPropagation();
          dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        });

        // Hide dropdown when clicking outside
        document.addEventListener('click', function (e) {
          if (!e.target.closest('.navbar-right')) {
            dropdown.style.display = 'none';
          }
        });
      }
    });
  </script>
</body>
</html>

<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#fff ;color:black ; font-size: 17px; font-family:Times ">

    <!-- Content Header (Page header) -->
    <section class="content-header" style= "color:black ; font-size: 17px; font-family:Times;">
    </section>
    
    <!-- Move breadcrumb slightly lower, but still at the top of content-wrapper -->
    <div style="position: relative; top: 40px; display: flex; align-items: center;">

      <span 
        style="margin-right: 20px; 
        margin-left: 18px; 
        font-weight: bold; 
        color: black; 
        font-size: 18px; 
        font-family: 'Poppins';"> VOTES LIST
        </span>

      <ol class="breadcrumb" 
          style="color: black; 
          font-size: 17px; 
          font-family:'Poppins'; 
          margin-bottom: 0; 
          position: relative; 
          left: 71%;">

        <li><a href="home.php"><i class="fa fa-dashboard" ></i> Home</a></li>
        <li class="active" style="color:black ; font-size: 17px; font-family:'Poppins'" >Dashboard</li>
      </ol>
    </div>

    <!-- Main content -->
    <section class="content">
      <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }

        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      
      <div class="row" style="position: relative; top: 25px;">
        <div class="col-xs-12">
          <div class="box"style="background-color: #c4c9cec2">
            <div class="box-header with-border"style="background-color: #b9b7b7c8">
              <a href="#reset" 
                data-toggle="modal" 
                class="btn btn-danger btn-sm btn-curve"  
                style="background-color: #ff8e88;
                color: black; 
                font-size: 12px; 
                font-family:'Poppins'">
                <i class="fa fa-refresh"></i> Reset
              </a>
            </div>

            <div class="box-body">
              <table id="example1" class="table" style="font-family: 'Poppins', sans-serif;">
                <thead style="font-family: 'Poppins', sans-serif;">
                  <th class="hidden"></th>
                  <th>POSITION</th>
                  <th>CANDIDATE</th>
                  <th>VOTER</th>
                  <th>Level</th>
                  <th>Course</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, 
                            candidates.firstname AS canfirst, 
                            candidates.lastname AS canlast, 
                            voters.firstname AS votfirst, 
                            voters.lastname AS votlast,
                            voters.student_level AS votlevel,
                            voters.course AS votcourse
                            FROM votes 
                            LEFT JOIN positions 
                            ON positions.id=votes.position_id 
                            LEFT JOIN candidates 
                            ON candidates.id=votes.candidate_id 
                            LEFT JOIN voters 
                            ON voters.id=votes.voters_id 
                            ORDER BY positions.priority ASC";

                    $query = $conn->query($sql);

                    while ($row = $query->fetch_assoc()) {
                      echo "
                        <tr style='color:black ; font-size: 15px; font-family: Poppins, sans-serif;'>
                          <td class='hidden'></td>
                          <td>".$row['description']."</td>
                          <td>".$row['canfirst'].' '.$row['canlast']."</td>
                          <td>".$row['votfirst'].' '.$row['votlast']."</td>
                          <td>".(isset($row['votlevel']) ? $row['votlevel'] : '')."</td>
                          <td>".(isset($row['votcourse']) ? $row['votcourse'] : '')."</td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/votes_modal.php'; ?>
</div>

  <style>
    /* DataTables UI font override for Poppins */
    .dataTables_length label,
    .dataTables_filter label,
    .dataTables_info,
    .dataTables_paginate,
    .dataTables_paginate a,
    .dataTables_paginate span,
    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
      font-family: 'Poppins', sans-serif !important;
    }
  </style>
  
  <?php include 'includes/scripts.php'; ?>
</body>
</html>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#fff; font-family: 'Poppins', sans-serif;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Move breadcrumb slightly lower, but still at the top of content-wrapper -->
    <div style="position: relative; top: 35px; display: flex; align-items: center;">
      <span 
        style="margin-right: 20px; 
              margin-left: 18px; 
              margin-top: 10px; 
              font-weight: bold; 
              color: black; 
              font-size: 18px; 
              font-family: 'Poppins', sans-serif;">
              VOTERS LIST</span>

      <ol class="breadcrumb" 
          style="color: black; 
          font-size: 17px; 
          font-family: 'Poppins', sans-serif; 
          position: relative; 
          top: 5px; 
          left: 70%; 
          margin-bottom: 0;">

        <li><a href="home.php"><i class="fa fa-dashboard" ></i> Home</a></li>
        <li class="active" style="color:black ; font-size: 17px; font-family: 'Poppins', sans-serif;" >Dashboard</li>
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

      <div class="row" style="position: relative; top: 5px;">
        <div class="col-xs-12" >
          <div class="box" style="background-color: #c4c9cec2; margin-top: 20px; font-family: 'Poppins', sans-serif;">
            <div class="box-header with-border" style="background-color: #b9b7b7c8; font-family: 'Poppins', sans-serif;">
              <a href="#addnew" 
                data-toggle="modal" 
                class="btn btn-primary btn-sm btn-curve " 
                style="background-color: #4682B4;
                color: black; 
                font-size: 12px; 
                font-family: 'Poppins', sans-serif;">
                <i class="fa fa-plus"></i> New
              </a>
            </div>

            <div class="box-body" style="font-family: 'Poppins', sans-serif;">
              <table id="example1" class="table" style="font-family: 'Poppins', sans-serif;">
                <thead style="font-family: 'Poppins', sans-serif;">
                  <th>Lastname</th>
                  <th>Firstname</th>
                  <th>Level</th>
                  <th>Course</th>
                  <th>Photo</th>
                  <th>Student ID</th>

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
                    <th>Tools</th>
                </thead>

                <tbody>
                  <?php
                    $sql = "SELECT * FROM voters";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                      echo "
                        <tr style='color:black ; font-size: 15px; font-family: Poppins, sans-serif;'>
                          <td style='font-family: Poppins, sans-serif;'>".$row['lastname']."</td>
                          <td style='font-family: Poppins, sans-serif;'>".$row['firstname']."</td>
                          <td style='font-family: Poppins, sans-serif;'>".(isset($row['student_level']) ? $row['student_level'] : '')."</td>
                          <td style='font-family: Poppins, sans-serif;'>".(isset($row['course']) ? $row['course'] : '')."</td>
                          <td style='font-family: Poppins, sans-serif;'>
                            <img src='".$image."' width='30px' height='30px'>
                            <a href='#edit_photo' data-toggle='modal' class='pull-right photo' data-id='".$row['id']."'><span class='fa fa-edit'></span></a>
                          </td>
                          <td style='font-family: Poppins, sans-serif;'>".$row['student_id']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-curve enhanced-edit-btn' 
                                    style='background: #198754; 
                                    color: #fff; 
                                    font-size: 13px; 
                                    font-family: Poppins, sans-serif; 
                                    border: none; 
                                    border-radius: 6px; 
                                    padding: 6px 18px; 
                                    box-shadow: none; 
                                    transition: background 0.2s, color 0.2s;' data-id='".$row['id']."' >
                                    <i class='fa fa-edit'></i> Edit</button>

                            <button class='btn btn-danger btn-sm delete btn-curve enhanced-delete-btn' 
                                    style='background: #dc3545; 
                                    color: #fff; 
                                    font-size: 13px; 
                                    font-family: Poppins, sans-serif; 
                                    border: none; 
                                    border-radius: 6px; 
                                    padding: 6px 18px; 
                                    box-shadow: none; 
                                    transition: background 0.2s, color 0.2s;' data-id='".$row['id']."'>
                                    <i class='fa fa-trash'></i> Delete</button>

                          <style>
                            .enhanced-edit-btn:hover {
                              background: #157347 !important;
                              color: #fff !important;
                            }
                            .enhanced-delete-btn:hover {
                              background: #bb2d3b !important;
                              color: #fff !important;
                            }
                          </style>
                          </td>
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
  <?php include 'includes/voters_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<script>
$(function() {
  $(document).on('click', '.edit', function(e) {
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e) {
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id) {
  $.ajax({
    type: 'POST',
    url: 'voters_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response) {
      $('.id').val(response.id);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_password').val(response.password);
      $('.fullname').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
</body>
</html>

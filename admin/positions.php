<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  // ...existing code...

  <div class="content-wrapper" style="background-color:#fff; font-family: 'Poppins', sans-serif; ">

    <div 
    style="position: relative; 
          top:35px; 
          margin-left: 18px; 
          display: flex; 
          align-items: center;">

      <span 
      style="margin-right: 20px; 
            font-weight: bold; 
            color: black; 
            font-size: 18px; 
            font-family: 'Poppins';">POSITIONS</span>

      <ol class="breadcrumb" style="color:black ; font-size: 17px; font-family:'Poppins'; margin-bottom: 0; margin-left: 72%">
        <li><a href="home.php"><i class="fa fa-dashboard" ></i> Home</a></li>
        <li class="active" style="color:black ; font-size: 17px; font-family:'Poppins'" >Dashboard</li>
      </ol>
    </div>

    <!-- Success and error alerts below header, above main content -->
    <div style="margin: 18px; margin-bottom: 0;">
    <?php
      if (isset($_SESSION['success'])) {
        echo "
          <div class='alert alert-success alert-dismissible' style='margin-top: 34px;'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-check'></i> Success!</h4>
            ".$_SESSION['success']."
          </div>
        ";
        unset($_SESSION['success']);
      }
      
      if (isset($_SESSION['error'])) {
        echo "
          <div class='alert alert-danger alert-dismissible' style='margin-top: 34px;'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-warning'></i> Error!</h4>
            ".$_SESSION['error']."
          </div>
        ";
        unset($_SESSION['error']);
      }
    ?>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12"  >
          <div class="box"style="background-color: #c4c9cec2; position: relative; top: 3px" >
            <div class="box-header with-border" style="background-color: #b9b7b7c8">
              <a href="#addnew" 
                data-toggle="modal" 
                class="btn btn-primary btn-sm btn-curve  " 
                style="background-color: #4682B4;
                color: black; 
                font-size: 12px; 
                font-family: 'Poppins', sans-serif;">
                <i class="fa fa-plus "></i> New</a>
            </div>

            <div class="box-body" >
              <table id="example1" class="table ">
                <thead>
                  <th class="hidden"></th>
                  <th>Description</th>
                  <th>Maximum Vote</th>
                  <th>Tools</th>
                </thead>

                <tbody>
                  <?php
                    $sql = "SELECT * FROM positions ORDER BY priority ASC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr style='color:black ; font-size: 15px; font-family:Times'>
                          <td class='hidden'></td>
                          <td style='font-family: Poppins, sans-serif;'>".$row['description']."</td>
                          <td style='font-family: Poppins, sans-serif;'>".$row['max_vote']."</td>
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
                                    transition: background 0.2s, color 0.2s;' data-id='".$row['id']."'>
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
  <?php include 'includes/positions_modal.php'; ?>
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

});

function getRow(id) {
  $.ajax({
    type: 'POST',
    url: 'positions_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response) {
      $('.id').val(response.id);
      $('#edit_description').val(response.description);
      $('#edit_max_vote').val(response.max_vote);
      $('.description').html(response.description);
    }
  });
}
</script>
</body>
<?php include 'includes/menubar.php'; ?>
</html>

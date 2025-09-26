<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- Platform Modal -->
<div class="modal fade" id="platformModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document" 
      style="max-width: 500px; 
      width: 100%; 
      display: flex; 
      align-items: center; 
      justify-content: center; 
      min-height: 60vh;">

  <div class="modal-content" 
      style="border-radius: 16px; 
      box-shadow: 0 8px 32px rgba(0,0,0,0.18); 
      background: #f8f9fa; 
      width: 500px; 
      height: 200px; 
      display: flex; 
      flex-direction: column;">

      <div class="modal-header" 
          style="background: #3137ebe2; 
          color: #fff; 
          border-top-left-radius: 16px; 
          border-top-right-radius: 16px; 
          display: flex; 
          align-items: center; 
          justify-content: space-between;">

  <h5 class="modal-title" 
      style="font-weight: 600; 
      margin-bottom: 0; 
      color: #fff;">
      Candidate Platform
    </h5>

  <button 
      type="button" 
      class="close" 
      data-dismiss="modal" 
      style="color: #fff; 
      opacity: 1; 
      font-size: 28px; 
      margin-left:auto;">
      &times;</button>
      </div>

      <div class="modal-body" style="padding: 24px; min-height: 120px;">
        <!-- Platform info will be loaded here -->
      </div>

      <div class="modal-footer" 
          style="justify-content: center; 
          background: #f0f0f0; 
          border-bottom-left-radius: 16px; 
          border-bottom-right-radius: 16px;">

        <button 
            type="button" 
            class="btn btn-primary" 
            data-dismiss="modal" 
            style="border-radius: 8px; 
            padding: 8px 32px; 
            font-weight:500;">
            Close</button>
      </div>
    </div>
  </div>
</div>

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#fff; margin-top: -30px; ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <div style="position: relative; 
                  top:70px; 
                  margin-left: 18px; 
                  display: flex; 
                  align-items: center;">
                  
      <span style="margin-right: 20px; 
                  font-weight: bold; 
                  color: black; 
                  font-size: 18px; 
                  font-family: 'Poppins';">BALLOT POSITION</span>

      <ol class="breadcrumb" 
          style="color: black; 
          font-size: 17px; 
          font-family:'Poppins'; 
          margin-bottom: 0; 
          margin-left: 67%">

        <li><a href="home.php"><i class="fa fa-dashboard" ></i> Home</a></li>
        <li class="active" style="color:black ; font-size: 17px; font-family:'Poppins'" >Dashboard</li>
      </ol>
    </div>
    </section>
    <!-- Main content -->
    <section class="content" style="margin-top: 58px;">

      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
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

      <div class="row" >
        <div class="col-xs-10 col-xs-offset-1"  id="content">
        </div>
      </div>
      
    </section>

    
  </div>
    
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function() {
  fetch();

  $(document).on('click', '.platform-btn', function(e) {
    e.preventDefault();
    var cid = $(this).data('cid');
    $('#platformModal').modal('show');
    $.ajax({
      type: 'POST',
      url: 'candidate_platform.php',
      data: {id: cid},
      success: function(data){
        $('#platformModal .modal-body').html(data);
      }
    });
  });

  $(document).on('click', '.reset', function(e) {
    e.preventDefault();
    var desc = $(this).data('desc');
    $('.'+desc).iCheck('uncheck');
  });

  $(document).on('click', '.moveup', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#'+id).animate({
      'marginTop' : "-300px"
    });

    $.ajax({
      type: 'POST',
      url: 'ballot_up.php',
      data:{id:id},
      dataType: 'json',
      success: function(response) {
        if(!response.error){
          fetch();
        }
      }
    });
  });

  $(document).on('click', '.movedown', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#'+id).animate({
      'marginTop' : "+300px"
    });

    $.ajax({
      type: 'POST',
      url: 'ballot_down.php',
      data:{id:id},
      dataType: 'json',
      success: function(response) {
        if(!response.error){
          fetch();
        }
      }
    });
  });

});

function fetch() {
  $.ajax({
    type: 'POST',
    url: 'ballot_fetch.php',
    dataType: 'json',
    success: function(response){
      $('#content').html(response).iCheck({checkboxClass: 'icheckbox_flat-green',radioClass: 'iradio_flat-green'});
    }
  });
}
</script>
</body>
</html>

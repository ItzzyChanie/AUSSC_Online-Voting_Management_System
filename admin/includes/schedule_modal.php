<?php
// schedule_modal.php
include 'includes/session.php';
?>

<div class="modal fade" 
    id="scheduleModal" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="scheduleLabel">

  <div class="modal-dialog" role="document">

  <div class="modal-content" 
      style="background-color: #f8f9fa; 
      color: #222; 
      font-size: 15px; 
      font-family: 'Poppins', sans-serif; 
      border-radius: 16px; 
      box-shadow: 0 8px 32px rgba(0,0,0,0.18);">

      <form method="POST" action="save_schedule.php">

        <div class="modal-header" 
            style="background: #3137ebe2; 
            color: #fff; 
            border-top-left-radius: 16px; 
            border-top-right-radius: 16px; 
            display: flex; 
            align-items: center; 
            justify-content: flex-start;">

          <h4 class="modal-title" 
              id="scheduleLabel" 
              style="font-weight: 400; 
              margin-bottom: 0; 
              color: #fff; 
              font-family: 'Poppins', sans-serif; 
              flex: 1; 
              text-align: left;">
              Set Election Schedule
          </h4>

          <button 
              type="button" 
              class="close" 
              data-dismiss="modal" 
              style="color: #fff; 
              opacity: 1; 
              font-size: 28px; 
              margin-left:8px;">
              &times;</button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="start_date">Start Date & Time</label>
            <input type="datetime-local" name="start_date" id="start_date" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="end_date">End Date & Time</label>
            <input type="datetime-local" name="end_date" id="end_date" class="form-control" required>
          </div>
        </div>

        <div class="modal-footer">
          <button 
              type="submit" 
              name="save" 
              class="btn btn-success btn-curve" 
              style="background-color: #157347; 
              color: #fff; 
              font-size: 13px; 
              font-family: 'Poppins', sans-serif; 
              border-radius: 6px; 
              padding: 7px 22px; 
              font-weight: 500; 
              border: none; 
              box-shadow: none; 
              transition: background 0.2s, color 0.2s;">
              Save</button>

          <button 
              type="button" 
              class="btn btn-default btn-curve pull-left" 
              style="background-color: #f0f0f0; 
              color: #222; 
              font-size: 12px; 
              font-family: 'Poppins', sans-serif; 
              border-radius: 8px;" 
              data-dismiss="modal">
              Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'votingPeriod_modal.php'; ?>

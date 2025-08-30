<?php
require_once '../includes/conn.php';

date_default_timezone_set('Asia/Manila');
$sched_sql = "SELECT start_datetime, end_datetime FROM election_schedule LIMIT 1";
$sched_query = $conn->query($sched_sql);
$schedule_set = ($sched_query && $sched_query->num_rows > 0);

if ($schedule_set) {
    $sched_row = $sched_query->fetch_assoc();
    $start_date = $sched_row['start_datetime'];
    $end_date = $sched_row['end_datetime'];
} 

else {
    $start_date = null;
    $end_date = null;
}
?>

<style>
/* Center Bootstrap 3 modal vertically for voting period modal only */
#votingPeriodModal .modal-dialog {
  margin-top: 25vh;
}
</style>

<div class="modal fade" id="votingPeriodModal" tabindex="-1" role="dialog" aria-labelledby="votingPeriodLabel">
  <div class="modal-dialog" role="document">

    <div class="modal-content" 
        style="background-color: #f8f9fa; 
        color: #222; 
        font-size: 15px; 
        font-family: 'Poppins', sans-serif; 
        border-radius: 16px; 
        box-shadow: 0 8px 32px rgba(0,0,0,0.18);">

      <div class="modal-header" 
          style="background: #d32f2f; 
          color: #fff; 
          border-top-left-radius: 16px; 
          border-top-right-radius: 16px; 
          display: flex; 
          align-items: center; 
          justify-content: space-between;">

        <h4 class="modal-title" 
            id="votingPeriodLabel" 
            style="font-weight: 400; 
            margin-bottom: 0; 
            color: #fff; 
            font-family: 'Poppins', sans-serif; 
            margin-left: 0;">
            Voting Period
          </h4>

        <button 
            type="button" 
            class="close" 
            data-dismiss="modal" 
            style="color: #fff; 
            opacity: 1; 
            font-size: 28px; 
            margin-right:0; 
            margin-left:auto;">
            &times;</button>
      </div>
      
      <div class="modal-body">
        <?php if (!$schedule_set): ?>
          <div class="alert alert-warning text-center" style="font-size:16px;">
            Set a schedule for Voting period first.
          </div>
        <?php else: ?>

          <div style="font-size:16px;">
            <b>Voting Opens:</b> <?php echo date('M d, Y h:i A', strtotime($start_date)); ?><br>
            <b>Voting Closes:</b> <?php echo date('M d, Y h:i A', strtotime($end_date)); ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="modal-footer" style="display: flex; justify-content: space-between; align-items: center;">

        <button 
            type="button" 
            class="btn btn-default btn-curve" 
            style="background-color: #f0f0f0; 
            color: #222; 
            font-size: 12px; 
            font-family: 'Poppins', sans-serif; 
            border-radius: 8px; 
            margin-right: auto;" 
            data-dismiss="modal">Close
          </button>

        <?php if($schedule_set): ?>
          <form method="POST" action="close_voting_period.php" style="display:inline;" id="closeVotingForm">
            <button 
                type="button" 
                name="close_voting" 
                class="btn btn-danger btn-curve" 
                id="closeVotingBtn" 
                style="background-color: #d32f2f; 
                color: #fff; 
                font-size: 13px; 
                font-family: 'Poppins', sans-serif; 
                border-radius: 6px; 
                padding: 7px 22px; 
                font-weight: 500; 
                border: none; 
                box-shadow: none;">
                Close the voting period
              </button>
    
            <button type="submit" name="close_voting" id="realCloseVotingSubmit" style="display:none;"></button>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmCloseVotingModal" tabindex="-1" role="dialog" aria-labelledby="confirmCloseVotingLabel">
  <div class="modal-dialog" role="document">

    <div class="modal-content" 
        style="background-color: #fff; 
        color: #222; 
        font-size: 15px; 
        font-family: 'Poppins', sans-serif; 
        border-radius: 12px;">

      <div class="modal-header" 
          style="background: #d32f2f; 
          color: #fff; 
          border-top-left-radius: 12px; 
          border-top-right-radius: 12px; 
          display: flex; 
          align-items: center; 
          justify-content: space-between;">

        <h4 class="modal-title" 
            id="confirmCloseVotingLabel" 
            style="font-weight: 400;
            margin-bottom: 0; 
            color: #fff; 
            margin-left: 0;">
            Confirm Close Voting
          </h4>

        <button 
            type="button" 
            class="close" 
            data-dismiss="modal" 
            style="color: #fff; 
            opacity: 1; 
            font-size: 28px; 
            margin-right: 0; 
            margin-left: auto;">
            &times;</button>
      </div>

      <div class="modal-body text-center">
        Are you sure you want to close the voting period now?
      </div>

      <div class="modal-footer" 
          style="display: flex; 
          justify-content: space-between; 
          align-items: center;">

        <button 
            type="button" 
            class="btn btn-default btn-curve" 
            data-dismiss="modal" 
            style="background-color: #f0f0f0; 
            color: #222; 
            margin-right: auto;">
            Cancel
          </button>

        <button 
            type="button" 
            class="btn btn-danger btn-curve" 
            id="confirmCloseVotingBtn" 
            style="background-color: #d32f2f; 
            color: #fff;">
            Yes, Close Now
          </button>
      </div>
    </div>
  </div>
</div>

<script>
// Confirmation for closing voting period using modal
document.addEventListener('DOMContentLoaded', function() {
  var closeBtn = document.getElementById('closeVotingBtn');
  var confirmModal = $('#confirmCloseVotingModal');
  var confirmBtn = document.getElementById('confirmCloseVotingBtn');
  var realSubmitBtn = document.getElementById('realCloseVotingSubmit');

  if (closeBtn) {
    closeBtn.addEventListener('click', function(e){
      e.preventDefault();
      confirmModal.modal('show');
    });
  }

  if (confirmBtn) {
    confirmBtn.addEventListener('click', function() {
      confirmModal.modal('hide');
      if(realSubmitBtn){
        realSubmitBtn.click();
      }
    });
  }
});
</script>

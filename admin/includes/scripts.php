<!-- Election Schedule Modal JS -->
<link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<script src="/bower_components/jquery/jquery.min.js"></script>
<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

<script>
$(function() {
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true
  });

  $('.timepicker').timepicker({
    showMeridian: false,
    minuteStep: 1,
    defaultTime: false
  });

  $('#scheduleForm').on('submit', function(e) {
    e.preventDefault();
    $('#scheduleError').text('');

    // Get values
    var start_date = $('#start_date').val();
    var start_time = $('#start_time').val();
    var end_date = $('#end_date').val();
    var end_time = $('#end_time').val();

    // Combine date and time
    var start_dt = new Date(start_date + ' ' + start_time);
    var end_dt = new Date(end_date + ' ' + end_time);

    // Validation
    if (isNaN(start_dt.getTime()) || isNaN(end_dt.getTime())) {
      $('#scheduleError').text('Please enter valid date and time.');
      return;
    }
    if (end_dt <= start_dt) {
      $('#scheduleError').text('End date/time must be later than start date/time.');
      return;
    }

    // AJAX submit
    $.ajax({
      url: 'save_schedule.php',
      type: 'POST',
      data: {
        start_datetime: start_date + ' ' + start_time,
        end_datetime: end_date + ' ' + end_time
      },
      success: function(response) {
        var res = JSON.parse(response);
        if (res.success) {
          $('#scheduleModal').modal('hide');
          location.reload(); // Refresh to show updated schedule
        } else {
          $('#scheduleError').text(res.message);
        }
      },
      error: function() {
        $('#scheduleError').text('Error saving schedule.');
      }
    });
  });
});

</script>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>

<!-- Moment JS -->
<script src="../bower_components/moment/moment.js"></script>

<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- ChartJS -->
<script src="../bower_components/chart.js/Chart.js"></script>

<!-- ChartJS Horizontal Bar -->
<script src="../bower_components/chart.js/Chart.HorizontalBar.js"></script>

<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<!-- Active Script -->
<script>
$(function(){
	/** add active class and stay opened when selected */
	var url = window.location;

	// for sidebar menu entirely but not cover treeview
	$('ul.sidebar-menu a').filter(function() {
	    return this.href == url;
	}).parent().addClass('active');

	// for treeview
	$('ul.treeview-menu a').filter(function() {
	    return this.href == url;
	}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});
</script>
<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<!-- Date and Timepicker -->
<script>
$(function() {
  //Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  }) 
});
</script>



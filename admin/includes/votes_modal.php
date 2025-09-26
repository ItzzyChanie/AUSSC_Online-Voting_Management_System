<!-- Reset -->
<div class="modal fade" id="reset">
    <div class="modal-dialog">

        <div class="modal-content" 
            style="background-color: #f8f9fa; 
            color: #222; 
            font-size: 15px; 
            font-family: 'Poppins', sans-serif; 
            border-radius: 16px; 
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);">

            <div class="modal-header" 
                style="background: #3137ebe2; 
                color: #fff; 
                border-top-left-radius: 16px; 
                border-top-right-radius: 16px; 
                display: flex; 
                align-items: center; 
                justify-content: flex-start;">

              <h4 class="modal-title" 
                style="font-weight: 400; 
                margin-bottom: 0; 
                color: #fff; 
                font-family: 'Poppins', sans-serif; 
                flex: 1; 
                text-align:left;">
                Reseting...
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
              <div class="text-center">
                  <p>RESET VOTES</p>
                  <h4>This will delete all votes and counting will back to 0.</h4>
              </div>
            </div>

            <div class="modal-footer">
                <button 
                    type="button" 
                    class="btn btn-default btn-curve pull-left" 
                    style="background-color: #f0f0f0; 
                    color: #222; 
                    font-size: 12px; 
                    font-family: 'Poppins', sans-serif; 
                    border-radius: 8px;" 
                    data-dismiss="modal">
                    <i class="fa fa-close"></i> Close</button>

                <a href="votes_reset.php" 
                    class="btn btn-danger btn-curve" 
                    style="background-color: #bb2d3b; 
                    color: #fff; 
                    font-size: 13px; 
                    font-family: 'Poppins', sans-serif; 
                    border-radius: 6px; 
                    padding: 7px 22px; 
                    font-weight: 500; 
                    border: none; 
                    box-shadow: none; 
                    transition: background 0.2s, color 0.2s;" >
                    <i class="fa fa-refresh"></i> Reset</a>
            </div>
        </div>
    </div>
</div>
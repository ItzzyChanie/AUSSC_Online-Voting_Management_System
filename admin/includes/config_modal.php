<!-- Config -->
<div class="modal fade" id="config">
    <div class="modal-dialog">

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
                justify-content: flex-start;">

              <h4 class="modal-title" 
                  style="font-weight:400; 
                  margin-bottom:0; 
                  color:#fff; 
                  font-family: 'Poppins', sans-serif; 
                  flex:1; 
                  text-align:left;">
                  Configure
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
                
                <?php
                  $parse = parse_ini_file('config.ini', FALSE, INI_SCANNER_RAW);
                  $title = $parse['election_title'];
                ?>

                <form class="form-horizontal" method="POST" action="config_save.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>">
                  
                <div class="form-group" 
                    style="display: flex; 
                    flex-direction: column; 
                    align-items: center; 
                    justify-content: center;">

                    <label for="title" 
                          style="font-family: 'Poppins', sans-serif; 
                          font-size: 16px; 
                          margin-bottom: 8px; 
                          text-align: center;">
                          Title
                          </label>

                    <input 
                        type="text" c
                        lass="form-control" 
                        style="width: 60%; 
                        text-align: center; 
                        font-family: 'Poppins', sans-serif;" 
                        id="title" 
                        name="title" 
                        value="<?php echo $title; ?>">
                  </div>
              </div>
            </div>

            <div class="modal-footer">
                <button type="button" 
                        class="btn btn-default btn-curve pull-left" 
                        style="background-color: #f0f0f0; 
                        color: #222; 
                        font-size: 12px; 
                        font-family: 'Poppins', sans-serif; 
                        border-radius: 8px;" 
                        data-dismiss="modal">
                        <i class="fa fa-close"></i> Close</button>

                <button type="submit" 
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
                        transition: background 0.2s, color 0.2s;" 
                        name="save">Save</button>
              </form>
            </div>
        </div>
    </div>
</div>
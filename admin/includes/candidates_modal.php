<!-- Description -->
<div class="modal fade" id="platform">
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
              <span class="fullname"></span>
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
                <p id="desc"></p>
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
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="addnew">
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
                  text-align:left;">Add New Candidate</h4>

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
              <form class="form-horizontal" method="POST" action="candidates_add.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="position" class="col-sm-3 control-label">Position</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="position" name="position" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM positions";
                          $query = $conn->query($sql);

                          while
                          ($row = $query->fetch_assoc()) {
                            echo "
                              <option value='".$row['id']."'>".$row['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="partylist" class="col-sm-3 control-label">Party List</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="partylist" name="partylist">
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM partylist";
                          $query = $conn->query($sql);

                          while ($row = $query->fetch_assoc()) {
                            echo "
                              <option value='".$row['description']."'>".$row['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>

                <div class="form-group">
                    <label for="platform" class="col-sm-3 control-label">Platform</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="platform" name="platform" rows="7"></textarea>
                    </div>
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

                <button 
                type="submit" 
                class="btn btn-primary btn-curve" 
                style="background-color: #157347; 
                color: #fff; 
                font-size: 13px; 
                font-family: 'Poppins', sans-serif; 
                border-radius: 6px; 
                padding: 7px 22px; 
                font-weight: 500; 
                border: none; 
                box-shadow: none; 
                transition: background 0.2s, color 0.2s;" name="add">Save</button>

              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
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
                   Edit Candidate</h4>

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
              <form class="form-horizontal" method="POST" action="candidates_edit.php">
                <input type="hidden" class="id" name="id">

                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_position" class="col-sm-3 control-label">Position</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="edit_position" name="position" required>
                        <option value="" selected id="posselect"></option>

                        <?php
                          $sql = "SELECT * FROM positions";
                          $query = $conn->query($sql);

                          while
                          ($row = $query->fetch_assoc()) {
                            echo "
                              <option value='".$row['id']."'>".$row['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_partylist" class="col-sm-3 control-label">Party List</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="edit_partylist" name="partylist">
                        <option value="" selected id="posselect"></option>

                        <?php
                          $sql = "SELECT * FROM partylist";
                          $query = $conn->query($sql);

                          while ($row = $query->fetch_assoc()) {
                            echo "
                              <option value='".$row['description']."'>".$row['description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_platform" class="col-sm-3 control-label">Platform</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_platform" name="platform" rows="7"></textarea>
                    </div>
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
                  <i class="fa fa-close"></i> Close
                </button>

                <button 
                  type="submit" 
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
                  name="edit">Update
                </button>

              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
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
                  Delete Candidate
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
              <form class="form-horizontal" method="POST" action="candidates_delete.php">
                <input type="hidden" class="id" name="id">

                <div class="text-center">
                    <p>DELETE CANDIDATE</p>
                    <h2 class="bold fullname"></h2>
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
                  <i class="fa fa-close"></i> Close
                </button>

                <button 
                    type="submit" 
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
                    transition: background 0.2s, color 0.2s;" 
                    name="delete">Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
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
                  <span class="fullname"></span>
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
              <form class="form-horizontal" method="POST" action="candidates_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">

                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
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

                <button 
                    type="submit" 
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
                    name="upload">Update</button>
              </form>
            </div>
        </div>
    </div>
</div>




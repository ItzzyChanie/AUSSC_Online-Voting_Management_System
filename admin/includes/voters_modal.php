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
                  style="font-weight: 400; 
                   margin-bottom: 0; 
                   color: #fff; 
                   font-family: 'Poppins', sans-serif; 
                   flex: 1; 
                   text-align: left;">
                   Add New Voter
                </h4>

              <button 
                  type="button" 
                  class="close" 
                  data-dismiss="modal" 
                  style="color: #fff; 
                  opacity: 1; 
                  font-size: 28px; 
                  margin-left: 8px;">
                  &times;</button>
            </div>

            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_add.php" enctype="multipart/form-data">
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
                      <label for="student_id" class="col-sm-3 control-label">Student ID</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="student_id" name="student_id" required>
                      </div>
                  </div>

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
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
                    transition: background 0.2s, color 0.2s;" 
                    name="add">
                    Save</button>
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
                  style="font-weight: 400; 
                  margin-bottom: 0; 
                  color: #fff; 
                  font-family: 'Poppins', sans-serif; 
                  flex: 1; 
                  text-align: left;">
                  Edit Voter
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
              <form class="form-horizontal" method="POST" action="voters_edit.php">
                <input type="hidden" class="id" name="id">

                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname">
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname">
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_password" name="password">
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
                    name="edit">
                    Update</button>
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
                  style="font-weight: 400; 
                  margin-bottom: 0; 
                  color: #fff; 
                  font-family: 'Poppins', sans-serif; 
                  flex: 1; 
                  text-align:left;">
                  Deleting Voter
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
              <form class="form-horizontal" method="POST" action="voters_delete.php">
                <input type="hidden" class="id" name="id">

                <div class="text-center">
                    <p>DELETE VOTER</p>
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
                    <i class="fa fa-close"></i> Close</button>

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
                  style="font-weight: 400; 
                  margin-bottom: 0; 
                  color: #fff; 
                  font-family: 'Poppins', sans-serif; 
                  flex: 1; 
                  text-align: left;">
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
              <form class="form-horizontal" method="POST" action="voters_photo.php" enctype="multipart/form-data">
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


     
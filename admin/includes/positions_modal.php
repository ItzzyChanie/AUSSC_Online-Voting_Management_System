<!-- Add -->
<div class="modal fade" id="addnew" >
    <div class="modal-dialog" >

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
                  text-align: left;">
                  Add New Position
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
              <form class="form-horizontal" method="POST" action="positions_add.php">

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="max_vote" class="col-sm-3 control-label">Maximum Candidate</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="max_vote" name="max_vote" required>
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
                style="background: #3137ebe2; 
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
                  Edit Position
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
              <form class="form-horizontal" method="POST" action="positions_edit.php">
                <input type="hidden" class="id" name="id">

                <div class="form-group">
                    <label for="edit_description" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_description" name="description">
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_max_vote" class="col-sm-3 control-label">Maximum Candidate</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_max_vote" name="max_vote">
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
                    name="edit">Update</button>
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
                  text-align: left;">
                  Delete Position
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
              <form class="form-horizontal" method="POST" action="positions_delete.php">
                <input type="hidden" class="id" name="id">

                <div class="text-center">
                    <p>DELETE POSITION</p>
                    <h2 class="bold description"></h2>
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

                <button type="submit" 
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
                        name="delete">Delete
                  </button>
              </form>
            </div>
        </div>
    </div>
</div>



     
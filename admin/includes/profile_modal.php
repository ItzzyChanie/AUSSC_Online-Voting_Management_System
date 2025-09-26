<!-- Add -->
<div class="modal fade" id="profile">
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
                Admin Profile
              </h4>

             <button type="button" class="close" data-dismiss="modal" style="color: #fff; opacity: 1; font-size: 28px; margin-left:8px;">&times;</button>
           </div>

          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">Username</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                  	</div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                    </div>
                </div>

                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                  	</div>
                </div>

                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                  	</div>
                </div>

                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>

                    <div class="col-sm-9">
                      <input 
                      type="password" 
                      class="form-control" 
                      id="curr_password" 
                      name="curr_password" 
                      placeholder="input current password to save changes" required>
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
                  name="save">
                  <i class="fa fa-check-square-o"></i> Save</button>
               </form>
             </div>
        </div>
    </div>
</div>
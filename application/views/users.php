<!DOCTYPE html>
<html lang="en">
<?php print_r($header); ?>
<body id="page-top" class="sidebar-toggled">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php print_r($sidebar); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php print_r($topbar); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="">
                    	<div class="float-left"><h4>Users Mangement</h4></div>
                        <div class="float-right">
                        	<input type="button" id="create" value="Create new" class="btn btn-sm btn-warning">
                        </div>
                    </div>
                    <div class="table-responsive">
                    	<table class="text-center table-striped" width="100%" border="1" id="dataTable">
                    		<thead class="bg-success text-light">
                    			<tr>
                    				<th>SNo.</th>
                    				<th>First Name</th>
                    				<th>Last Name</th>
                    				<th>Contact No.</th>
                    				<th>Email</th>
                    				<th>User Type</th>
                            		<th>Active</th>
                            		<th class="text-center">
                            			<table border="" class="text-center" width="100%">
                            				<tr>
                            					<td colspan="3" class="text-center">Permission</td>
                            				</tr>
                            				<tr>
                            					<td style="width: 33%;">User Entry</td>
                            					<td style="width: 33%;">Plot Entry</td>
                            					<td style="width: 33%;">Booking</td>
                            				</tr>
                            			</table>
                            		</th>
                    				<th>Action</th>
                    			</tr>
                    		</thead>
                    		<tbody>
                				<?php $c= 0; foreach($users as $user){?>
                					<tr>
                						<td><?php echo ++$c; ?></td>
                						<td><?php echo $user['fname']; ?></td>
                						<td><?php echo $user['lname']; ?></td>
                						<td><?php echo $user['contact_no']; ?></td>
                						<td><?php echo $user['email']; ?></td>
                						<td><?php echo $user['user_type']; ?></td>	
                            <td>
                                <input type="checkbox" class="active" data-id="<?php echo $user['id']; ?>" class="check" 
                                  <?php if($user['active'] == 1){ echo 'checked'; }?>
                                />
                            </td>
                            <td class="text-center">
                            	<table border="" class="text-center" width="100%">
                            		<tr>
                            			<td>
                            				<input type="checkbox" class="permission" data-permission="user_entry" data-uid="<?php echo $user['id']; ?>" title="User Entry"
                                        	<?php if(isset($user['permission'])){ if($user['permission']['user_entry']){
                                        	    echo "checked";
                                        	}} ?> />
                            			</td>
                            			<td>
                            				<input type="checkbox" class="permission" data-permission="plot_entry" data-uid="<?php echo $user['id']; ?>" title="Plot Entry"
                                        	<?php if(isset($user['permission'])){ if($user['permission']['plot_entry']){
                                        	    echo "checked";
                                        	}} ?> />
                            			</td>
                            			<td>
                            				<input type="checkbox" class="permission" data-permission="booking" data-uid="<?php echo $user['id']; ?>" title="Booking"
                                        	<?php if(isset($user['permission'])){ if($user['permission']['booking']){
                                        	    echo "checked";
                                        	}} ?> />
                            			</td>
                            		</tr>
                            	</table>
                            </td>
        						<td>
        							<a href="javascript:void(0);" class="user_edit" data-id="<?php echo $user['id']; ?>">
        								<i class="fas fa-pencil-alt"></i>
        							</a>
        							<a href="javascript:void(0);" class="user_del" data-id="<?php echo $user['id']; ?>">
        								<i class="fas fa-trash-alt"></i>
        							</a>
        						</td>
        					</tr>
        				<?php }?>
            		</tbody>
            	</table>
            </div>
        </div>
                <!-- /.container-fluid -->

   	</div>
            <!-- End of Main Content -->
                       </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<form>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Fname</label>
                <div class="col-sm-9">
                  <input type="hidden" id="userid" value="" />
                  <input type="text" class="form-control" id="fname" value="" placeholder="first name">
                  <div class="text-danger" style="display:none;" id="fname_error"></div>
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Sname</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="sname" value="" placeholder="second name">
                  <div class="text-danger" style="display:none;" id="sname_error"></div>
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="email" value="" placeholder="Email">
                  <div class="text-danger" style="display:none;" id="email_error"></div>
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Contact No</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="contact" value="" placeholder="contact no">
                  <div class="text-danger" style="display:none;" id="contact_error"></div>
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Role</label>
                <div class="col-sm-9">
                  <select id="role" class="form-control">
                      <option value="">Select role</option>
                      <option value="admin">ADMIN</option>
                      <option value="broker">BROKER</option>
                  </select>
                  <div class="text-danger" style="display:none;" id="role_error"></div>
                </div>
              </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="modal_create" class="btn btn-primary"style="display:inline;">Create</button>
        <button type="button" id="modal_update" class="btn btn-warning" style="display:none;">Update</button>  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>



<?php print_r($footer); ?>

<script>
  var baseUrl = $('#modal_create').val();
	$(document).on('click','#create',function(){
		$('#createModal').modal({
			show : true,
			backdrop : 'static'
		});
	});

  $(document).on('click','#modal_create',function(){
    var form_valid = true;

    if($('#fname').val() == ''){
      $('#fname_error').html('Enter first name').show();
      form_valid = false;
    } else {
      $('#fname_error').html('').hide();
    }

    if($('#sname').val() == ''){
      $('#sname_error').html('Enter second name').show();
      form_valid = false;
    } else {
      $('#sname_error').html('').hide();
    }

    if($('#email').val() == ''){
      $('#email_error').html('Enter email-id').show();
      form_valid = false;
    } else {
      $('#email_error').html('').hide();
    }

    if($('#role').val() == ''){
      $('#role_error').html('select user role').show();
      form_valid = false;
    } else {
      $('#role_error').html('').hide();
    }

    if(form_valid){
        $.ajax({
						type: 'POST',
						url : baseUrl + 'user_ctrl/create',
						data : {
							'fname' : $('#fname').val(),
							'lname' : $('#sname').val(),
              'email' : $('#email').val(),
              'contact' : $('#contact').val(),
              'role' : $('#role').val()
						},
						dataType : 'json',
						success: function(response){
							console.log(response);
              if(response.status == 200){
                  alert('User created.');
                  location.reload();
              } else{
                  alert('something wrong.');
              }
						}
				});
    }
  });


  $(document).on('click','.user_edit',function(){
      var user_id = $(this).data('id');
      $.ajax({
						type: 'POST',
						url : baseUrl + 'user_ctrl/userdetail',
						data : {
							'user_id' : user_id
						},
						dataType : 'json',
						success: function(response){
							console.log(response);
              if(response.status == 200){
                
                $('#userid').val(response.data[0].id);
                $('#fname').val(response.data[0].fname);
                $('#sname').val(response.data[0].lname);
                $('#email').val(response.data[0].email);
                $('#contact').val(response.data[0].contact_no);
                $('#role').val(response.data[0].user_type);
                $('#exampleModalLabel').html('Update user');
                $('#modal_create').hide();
                $('#modal_update').show();

                $('#createModal').modal({
                  show : true,
                  backdrop : 'static'
                });
              } else{
                  alert('something wrong.');
              }
						}
				});
    });


    $(document).on('click','#modal_update',function(){
        var form_valid = true;
      if($('#fname').val() == ''){
        $('#fname_error').html('Enter first name').show();
        form_valid = false;
      } else {
        $('#fname_error').html('').hide();
      }

      if($('#sname').val() == ''){
        $('#sname_error').html('Enter second name').show();
        form_valid = false;
      } else {
        $('#sname_error').html('').hide();
      }

      if($('#email').val() == ''){
        $('#email_error').html('Enter email-id').show();
        form_valid = false;
      } else {
        $('#email_error').html('').hide();
      }

      if($('#role').val() == ''){
        $('#role_error').html('select user role').show();
        form_valid = false;
      } else {
        $('#role_error').html('').hide();
      }

      if(form_valid){
          $.ajax({
              type: 'POST',
              url : baseUrl + 'user_ctrl/update',
              data : {
                'user_id' : $('#userid').val(),
                'fname' : $('#fname').val(),
                'lname' : $('#sname').val(),
                'email' : $('#email').val(),
                'contact' : $('#contact').val(),
                'role' : $('#role').val(),
                'status' : '2'
              },
              dataType : 'json',
              success: function(response){
                console.log(response);
                if(response.status == 200){
                    alert('User updated.');
                    location.reload();
                } else{
                    alert('something wrong.');
                }
              }
          });
      }
    });


    $(document).on('click','.user_del',function(){
      var user_id = $(this).data('id');
      var c = confirm('Are you sure.');
      if(c){
        $.ajax({
              type: 'POST',
              url : baseUrl + 'user_ctrl/delete',
              data : {
                'user_id' : user_id
              },
              dataType : 'json',
              success: function(response){
                console.log(response);
                if(response.status == 200){
                    alert('User deleted.');
                    location.reload();
                } else{
                    alert('something wrong.');
                }
              }
          });
      }
    });

    $(document).on('click','.active',function(){
      var status;
      var uid = $(this).data('id');

      if($(this).prop("checked") == true){
        status = true;
      } else {
        status = false;
      }


      $.ajax({
          type: 'POST',
          url : baseUrl + 'user_ctrl/active',
          data : {
            'user_id' : uid,
            'status' : status
          },
          dataType : 'json',
          success: function(response){
            console.log(response);
            if(response.status == 200){
                console.log(response.msg);
            } else{
                alert('something wrong.');
            }
          }
      });

    });

	$(document).on('click','.permission',function(){
		var uid = $(this).data('uid');
		var permission = $(this).data('permission');
		var status;
		if($(this).prop("checked") == true){
			status = 1;
		} else {
			status = 0;
		}
		
		$.ajax({
          type: 'POST',
          url : baseUrl + 'user_ctrl/permission',
          data : {
            'user_id' : uid,
            'permission' : permission,
            'status' : status
          },
          dataType : 'json',
          success: function(response){
            console.log(response);
            if(response.status == 200){
                console.log(response.msg);
            } else{
                alert('something wrong.');
            }
          }
      	});
	});
</script>
</body>
</html>
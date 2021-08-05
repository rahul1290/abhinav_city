<?php if(isset($property_detail)){
    $property_detail = $property_detail;
}?>
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
				<div class="container">
					<!-- Page Heading -->
					
					<label class="row bg-info">
                        	<span class="text-center text-light ml-2 pt-1"><h5>Profile</h5></span>
                        </label>
					<div class="offset-2 col-7 bg-light p-4">
						<form name="f1">
                        	<div class="form-group row">
                            	<label class="col-sm-2 col-form-label">First Name</label>
                            	<div class="col-sm-10">
                              		<input type="text" class="form-control" id="fname" value="<?php if(isset($userDetail[0]['fname'])){ echo $userDetail[0]['fname']; }?>">
                              		<div id="fname_error" class="text-danger" style="display: none;"></div>
                            	</div>
                          	</div>
                          	<div class="form-group row">
                            	<label class="col-sm-2 col-form-label">Last Name</label>
                            	<div class="col-sm-10">
                              		<input type="text" class="form-control" id="lname" value="<?php if(isset($userDetail[0]['lname'])){ echo $userDetail[0]['lname']; }?>">
                              		<div id="lname_error" class="text-danger" style="display: none;"></div>
                            	</div>
                          	</div>
                          	<div class="form-group row">
                            	<label class="col-sm-2 col-form-label">Email</label>
                            	<div class="col-sm-10">
                              		<input type="text" class="form-control" id="email" value="<?php if(isset($userDetail[0]['email'])){ echo $userDetail[0]['email']; }?>">
                              		<div id="email_error" class="text-danger" style="display: none;"></div>
                            	</div>
                          	</div>
                          	<div class="form-group row">
                            	<label class="col-sm-2 col-form-label">Contact No.</label>
                            	<div class="col-sm-10">
                              		<input type="text" class="form-control" id="contact" value="<?php if(isset($userDetail[0]['contact_no'])){ echo $userDetail[0]['contact_no']; }?>">
                              		<div id="contact_error" class="text-danger" style="display: none;"></div>
                            	</div>
                          	</div>
                          	<div class="form-group row">
                            	<div class="offset-2 col-sm-10">
                              		<input type="button" id="update" class="btn btn-warning" value="Update" />
                            	</div>
                          	</div>
                        </form>
                        </div>
                        
                        <label class="row bg-info">
                        	<span class="text-center text-light ml-2 pt-1"><h5>Change Password</h5></span>
                        </label>
                        <div class="offset-2 col-7">
                            <form name="f2">
                            	<div class="form-group row">
                                	<label class="col-sm-4 col-form-label">Current password</label>
                                	<div class="col-sm-8">
                                  		<input type="password" class="form-control" id="currpassword" value="" placeholder="enter current password" />
                                  		<div id="fname_error" class="text-danger" style="display: none;"></div>
                                	</div>
                              	</div>
                              	<div class="form-group row">
                                	<label class="col-sm-4 col-form-label">New password</label>
                                	<div class="col-sm-8">
                                  		<input type="password" class="form-control" id="newpassword" value="" placeholder="enter current password" />
                                  		<div id="fname_error" class="text-danger" style="display: none;"></div>
                                	</div>
                              	</div>
                              	<div class="form-group row">
                                	<label class="col-sm-4 col-form-label">Confirm password</label>
                                	<div class="col-sm-8">
                                  		<input type="password" class="form-control" id="cpassword" value="" placeholder="enter current password" />
                                  		<div id="fname_error" class="text-danger" style="display: none;"></div>
                                	</div>
                              	</div>
                              	<div class="form-group row">
                                	<div class="offset-4 col-sm-8">
                                  		<input type="button" id="password_change" class="btn btn-primary" value="Change password"/>
                                	</div>
                              	</div>
                            </form>
                        </div>
                    
				</div>
				<!-- /.container-fluid -->
				
			</div>
			
			<!-- End of Main Content -->

			<!-- Footer -->
			
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Your Website 2020</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->
		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top"> <i
		class="fas fa-angle-up"></i>
	</a>
	
	
	<div class="modal fade bd-example-modal-lg" id="bookingModal"
		tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content modal-lg">
				<div class="modal-body">
    
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	
	

<?php print_r($footer); ?>

<script>
	var baseUrl = $('#base_url').val();
	
	$(document).on('click','#update',function(){
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var email = $('#email').val();
		var contact_no = $('#contact').val();
		
		$.ajax({
            type: 'POST',
            url: baseUrl + 'auth/profile_update',
            data: {
                'fname': fname,
                'lname' : lname,
                'email' : email,
                'contact_no' : contact_no
            },
            dataType: 'json',
            success: function(response) {
            	if(response.status == 200){
            		alert('Profile updated.');
            		location.reload();
            	}
            }
       });
	});
	
	
	$(document).on('click','#password_change',function(){
		var currpassword = $('#currpassword').val();
		var newpassword = $('#newpassword').val();
		var cpassword = $('#cpassword').val();
		
		if(newpassword == cpassword){
			$.ajax({
                type: 'POST',
                url: baseUrl + 'auth/change_password',
                data: {
                    'currpassword': currpassword,
                    'newpassword' : newpassword,
                    'cpassword' : cpassword
                },
                dataType: 'json',
                success: function(response) {
                	if(response.status == 200){
                		alert(response.msg);
                		location.reload();
                	} else {
                		alert(response.msg);
                	}
                }
       		});
		} else {
			alert('Confirm password not matched.');
		}
	});
</script>

</body>
</html>
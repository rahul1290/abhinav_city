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
					<div>
						<div class="float-left text-primary"><h4><b>Entry Management</b></h4></div>
						<div class="float-right">
    						<a href="<?php echo base_url();?>" class="btn btn-sm btn-primary">PROPERTY LIST</a>
    					</div>
					</div>
					<br/>
					<br/>
					<br/>
					<div class="row">
    					<div class="col-sm-12" style="background-color:white;">
    						<div class="col-12" style="border-top:0px solid black;">
        						<?php echo $this->session->flashdata('msg'); ?>
            					<form name="f1" method="POST" action="<?php echo base_url('property_ctrl/create');?>">
            						<div class="form-row">
            							<div class="col-5">
            								<div class="form-group row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label">Category<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                  <select name="category" id="category" class="form-control">
                									<option value="">Select category</option>
                									<option value="plot" <?php if(set_value('category') == 'plot'){ echo "selected"; }?>>Plot</option>
                									<option value="flat" <?php if(set_value('category') == 'flat'){ echo "selected"; }?>>Flat</option>
                									<option value="bungalow" <?php if(set_value('category') == 'bungalow'){ echo "selected"; }?>>Bungalow</option>
                								  </select>
                								<?php echo form_error('category'); ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row" id="plotno" style="display: none;">
                                                <label for="staticEmail" class="col-sm-3 col-form-label">Plot No.<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                  	<input type="text" class="form-control" name="plot no" value="<?php echo set_value('block');?>" placeholder="plot no">
                									<?php echo form_error('block'); ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row" id="blockno" style="display: none;">
                                                <label for="staticEmail" class="col-sm-3 col-form-label">Block<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                  	<input type="text" class="form-control" name="block" value="<?php echo set_value('block');?>" placeholder="Enter block name">
                									<?php echo form_error('block'); ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label">Facing<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                  	<select name="facing" class="form-control">
                    									<option value="">Select facing</option>
                    									<option value="E" <?php if(set_value('facing') == 'E'){ echo "selected"; }?>>East</option>
                    									<option value="W" <?php if(set_value('facing') == 'W'){ echo "selected"; }?>>West</option>
                    									<option value="S" <?php if(set_value('facing') == 'S'){ echo "selected"; }?>>South</option>
                    									<option value="N" <?php if(set_value('facing') == 'N'){ echo "selected"; }?>>North</option>
                    								</select>
                    								<?php echo form_error('facing'); ?>
                                                </div>
                                            </div>
                                            
                                        	<div class="form-group row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label">Area<span class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                  	<input type="text" class="form-control" name="area" value="<?php echo set_value('area'); ?>" placeholder="Enter area">
            										<?php echo form_error('area'); ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row" id="plot_rate" style="display: none;">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Rate of Plot</label>
                                                <div class="col-sm-8">
                                                  	<input type="text" name="rate_of_plot" placeholder="Rate of plot" value="<?php echo set_value('rate_of_plot'); ?>" class="form-control" />
                								<?php echo form_error('rate_of_plot'); ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row" id="construction_area" style="display: none;">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Construction area</label>
                                                <div class="col-sm-8">
                                                  	<input type="text" name="construction_area" placeholder="Construction area in sqft" id="construction_area" value="<?php echo set_value('construction_area'); ?>" class="form-control" />
            										<?php echo form_error('construction_area'); ?>
                                                </div>
                                            </div>
                                                
                                            <div class="form-group row" id="block_rate" style="display: none;">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Rate of Block</label>
                                                <div class="col-sm-8">
                                                  	<input type="text" name="rate_of_plot" placeholder="Rate of block" value="<?php echo set_value('rate_of_block'); ?>" class="form-control" />
                								<?php echo form_error('rate_of_block'); ?>
                                                </div>
                                            </div>
                                            
                                            <div class="p-2" style="border: 1px solid #e0dcdc">
            									<h5 class=""><label class="text-info"><b>Premium</b></label></h5>
            									<hr/>
                								<input type="checkbox" name="corner"/> Corner
                								&nbsp;
                								<input type="checkbox" name="garden"/> Garden
            								</div>
            								
                                            
                                            
            							</div>
            							
            							<div class="offset-1 col-5">
            								<div class="form-group row pb-2" id="bhk_box">
                                                <label for="staticEmail" class="col-sm-2 col-form-label">BHK</label>
                                                <div class="col-sm-10">
                                                  	<select name="bhk" id="bhk" class="form-control">
                                                  		<option>Select type</option>
                                                  		<option value="1bhk">1 BHK</option>
                                                  		<option value="2bhk">2 BHK Duplex</option>
                                                  		<option value="3bhk">3 BHK Duplex</option>
                                                  	</select>
            										<?php echo form_error('bhk'); ?>
                                                </div>
                                                <br/>
                                            </div>
            								
                                            <div class="p-2" style="border: 1px solid #e0dcdc">
            									<h5 class=""><label class="text-info"><b>Amenities</b></label></h5>
            									<hr/>
            									<div class="form-group row">
                                                	<label for="staticEmail" class="col-sm-3 col-form-label">Maintenance</label>
                                                    <div class="col-sm-9">
                                                      	<input type="text" name="maintenance" placeholder="Maintenance cost in rs." value="<?php echo set_value('maintenance'); ?>" class="form-control" />
                    									<?php echo form_error('maintenance'); ?>
                                                    </div>
                                                </div>
            									
                								<div class="form-group row">
                                                	<label for="staticEmail" class="col-sm-3 col-form-label">Club-house</label>
                                                    <div class="col-sm-9">
                                                      	<input type="text" name="club_house" placeholder="Club house cost in rs." value="<?php echo set_value('club_house'); ?>" class="form-control" />
            											<?php echo form_error('club_house'); ?>
                                                    </div>
                                                </div>
                                                
                								<label>Transform/Electricity</label> 
                                                <div class="input-group mb-3">
                                                  <input type="text" name="trans_elec" placeholder="Transform/Electricity cost in rs." class="form-control" value="<?php echo set_value('trans_elec');?>" />
                                                  <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">kw</span>
                                                  </div>
                                                  <?php echo form_error('transformer'); ?>
                                                </div>  
            								</div>
            								
            								<?php if($this->uri->segment(2) != ''){ ?>
            								<div class="input-group mb-3">
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" name="hold">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                        HOLD
                                                      </label>
                                                  </div>
                                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" name="booked">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                        BOOKED
                                                      </label>
                                                  </div>
                                                  &nbsp;&nbsp;&nbsp;&nbsp;
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" name="sold">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                        SOLD
                                                      </label>
                                                  </div>
                                            </div>
                                            <?php } ?>
                                                
            								<div class="text-center mt-4">
                    							<input type="submit" id="create" value="Submit" class="btn btn-success" /> 
                    							<input type="button" id="cancel"value="Cancel" class="btn btn-warning ml-1" />
                    						</div>
            								
            							</div>
            						</div>
            
            
            						
            					</form>
        					</div>
    						
    					</div>
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

	<div class="modal fade bd-example-modal-lg" id="createModal"
		tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content modal-lg">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Create New user</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" id="modal_create" class="btn btn-primary"
						style="display: inline;">Create</button>
					<button type="button" id="modal_update" class="btn btn-warning"
						style="display: none;">Update</button>
					<button type="button" class="btn btn-secondary"
						data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>

<?php print_r($footer); ?>

<script>
	var baseUrl = $('#base_url').val();
	
	$(document).on('click','#create',function(){
		var formvalid = true;
	});
	
	$(document).on('change','#category',function(){
		var x = $(this).val();
		
		if(x == 'plot'){
			$('#construction_area,#bhk_box').hide();
			$('#plotno,#plot_rate').show();
			$('#blockno,#block_rate').hide();
		} else{
			$('#construction_area,#bhk_box').show();
			$('#plotno,#plot_rate').hide();
			$('#blockno,#block_rate').show();
		}
		
	});
</script>

</body>
</html>
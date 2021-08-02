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
						<div class="float-left"><h4>Entry Management</h4></div>
						<div class="float-right">
    						<a href="<?php echo base_url();?>" class="btn btn-sm btn-warning">Property List</a>
    					</div>
					</div>
					<br/>
					<br/>
					<br/>
				
					<div class="col-12 p-2" style="border-top:1px solid black;">
						<?php echo $this->session->flashdata('msg'); ?>
    					<form name="f1" method="POST" action="<?php echo base_url('property_ctrl/create');?>">
    						<div class="form-row">
    							<div class="form-group col-md-2">
    								<label>Category<span class="text-danger">*</span></label> 
    								<select name="category" class="form-control">
    									<option value="">Select category</option>
    									<option value="plot" <?php if(set_value('category') == 'plot'){ echo "selected"; }?>>Plot</option>
    									<option value="flat" <?php if(set_value('category') == 'flat'){ echo "selected"; }?>>Flat</option>
    								</select>
    								<?php echo form_error('category'); ?>
    							</div>
    							<div class="form-group col-md-2">
    								<label>Block<span class="text-danger">*</span></label> 
    								<input type="text" class="form-control" name="block" value="<?php echo set_value('block');?>" placeholder="Enter block name">
    								<?php echo form_error('block'); ?>
    							</div>
    							<div class="form-group col-md-2">
    								<label>Area<span class="text-danger">*</span></label> 
    								<input type="text" class="form-control" name="area" value="<?php echo set_value('area'); ?>" placeholder="Enter area">
    								<?php echo form_error('area'); ?>
    							</div>
    							<div class="form-group col-md-2">
    								<label>Facing<span class="text-danger">*</span></label> 
    								<select name="facing" 
    									class="form-control">
    									<option value="">Select facing</option>
    									<option value="E" <?php if(set_value('facing') == 'E'){ echo "selected"; }?>>East</option>
    									<option value="W" <?php if(set_value('facing') == 'W'){ echo "selected"; }?>>West</option>
    									<option value="S" <?php if(set_value('facing') == 'S'){ echo "selected"; }?>>South</option>
    									<option value="N" <?php if(set_value('facing') == 'N'){ echo "selected"; }?>>North</option>
    								</select>
    								<?php echo form_error('facing'); ?>
    							</div>
    						</div>
    
    						<div class="form-row">
    							<div class="form-group col-md-1">
    								<label>Premium</label> 
    								<input type="text" class="form-control" name="premium" value="<?php echo set_value('premium');?>" placeholder="Premium">
    								<?php echo form_error('premium'); ?>
    							</div>
    							<div class="form-group col-md-2">
    								<label>Transformer/ Electricity</label> 
    								<input type="text" name="trans_elec" class="form-control" value="<?php echo set_value('trans_elec');?>" />
    								<?php echo form_error('trans_elec'); ?>
    							</div>
    							<div class="form-group col-md-1">
    								<label>Maintenance</label> 
    								<input type="text" name="maintenance" value="<?php echo set_value('maintenance'); ?>" class="form-control" />
    								<?php echo form_error('maintenance'); ?>
    							</div>
    							<div class="form-group col-md-2">
    								<label>Club-house</label> 
    								<input type="text" name="club_house" value="<?php echo set_value('club_house'); ?>" class="form-control" />
    								<?php echo form_error('club_house'); ?>
    							</div>
    							<div class="form-group col-md-2">
    								<label>Amenities</label> 
    								<input type="text" name="amenities" value="<?php echo set_value('amenities'); ?>" class="form-control" />
    								<?php echo form_error('amenities'); ?>
    							</div>
    						</div>
    
    						<div class="form-row">
    							<div class="form-group col-md-3">
    								<label>Rate of Plot</label> 
    								<input type="text" name="rate_of_plot" value="<?php echo set_value('rate_of_plot'); ?>" class="form-control" />
    								<?php echo form_error('rate_of_plot'); ?>
    								
    							</div>
    							<div class="form-group col-md-3">
    								<label>Plot Grand Total</label> 
    								<input type="text" name="plot_grand_total" value="<?php echo set_value('plot_grand_total'); ?>" class="form-control" />
    								<?php echo form_error('plot_grand_total'); ?>
    							</div>
    							<div class="form-group col-md-2">
    								<label>Cost of Land Premium</label> 
    								<input type="text" name="cost_of_land_premium" value="<?php echo set_value('cost_of_land_premium'); ?>" id="cost_of_land_premium" class="form-control" />
    								<?php echo form_error('cost_of_land_premium'); ?>
    							</div>
    						</div>
    
    						<div class="form-row">
    							<div class="form-group col-md-2">
    								<label>Construction area</label> 
    								<input type="text" name="construction_area" id="construction_area" value="<?php echo set_value('construction_area'); ?>" class="form-control" />
    								<?php echo form_error('construction_area'); ?>
    							</div>
    							<div class="form-group col-md-2">
    								<label>2BHK Duplex</label> 
    								<input type="text" name="2BHKduplex" value="<?php echo set_value('2BHKduplex'); ?>" class="form-control" />
    								<?php echo form_error('2BHKduplex'); ?>
    								
    							</div>
    							<div class="form-group col-md-2">
    								<label>2BHK Grand Total</label> 
    								<input type="text" name="2BHKgrand_total" value="<?php echo set_value('2BHKgrand_total'); ?>" class="form-control" />
    								<?php echo form_error('2BHKgrand_total'); ?>
    							</div>
    							<div class="form-group col-md-2">
    								<label>3BHK Duplex</label> 
    								<input type="text" name="3BHKduplex" value="<?php echo set_value('3BHKduplex'); ?>" class="form-control" />
    								<?php echo form_error('3BHKduplex'); ?>
    							</div>
    						</div>
    						
    						<div class="form-row">
    							<div class="form-group col-md-3">
    								<label>3BHK Grand Total</label> 
    								<input type="text" name="3BHKgrand_total" value="<?php echo set_value('3BHKgrand_total'); ?>" class="form-control" />
    								<?php echo form_error('3BHKgrand_total'); ?>
    							</div>
    							
    							<div class="form-group col-md-3">
    								<label>Bank Rate</label> 
    								<input type="text" name="bank_rate" value="<?php echo set_value('bank_rate'); ?>" class="form-control" />
    								<?php echo form_error('bank_rate'); ?>
    							</div>
    							<div class="form-group col-md-2">
    								<label>Vicinity</label> 
    								<input type="text" name="vicinity" value="<?php echo set_value('vicinity'); ?>" class="form-control" />
    								<?php echo form_error('vicinitys'); ?>
    							</div>
    						</div>
    
    						<div class="offset-3">
    							<input type="submit" id="create" value="Create"
    								class="btn-success" /> <input type="button" id="cancel"
    								value="Cancel" class="btn-warning ml-1" />
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
</script>

</body>
</html>
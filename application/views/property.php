<?php

if (isset($property_detail)) {
    $property_detail = $property_detail;
}
?>
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
						<div class="float-left text-primary">
							<h4>
								<b>Entry Management</b>
							</h4>
						</div>
						<div class="float-right">
							<a href="<?php echo base_url();?>" class="btn btn-sm btn-primary">PROPERTY
								LIST</a>
						</div>
					</div>
					<br /> <br /> <br />
					<div class="row">
						<div class="col-sm-12" style="background-color: white;">
							<div class="col-12" style="border-top: 0px solid black;">
        						<?php echo $this->session->flashdata('msg'); ?>
            					<form name="f1" method="POST"
									action="<?php echo base_url('property_ctrl/create');?>">
									<div class="form-row">
										<div class="col-5">
											<div class="form-group row">
												<label for="staticEmail" class="col-sm-3 col-form-label">Category<span
													class="text-danger">*</span></label>
												<div class="col-sm-9">
													<select name="category" id="category" class="form-control">
														<option value="">Select category</option>
														<option value="plot"
															<?php

if (isset($property_detail)) {
                if ($property_detail[0]['category'] == 'plot') {
                    echo 'selected';
                }
            }
            ?>>Plot</option>
														<option value="flat"
															<?php

if (isset($property_detail)) {
                if ($property_detail[0]['category'] == 'flat') {
                    echo 'selected';
                }
            }
            ?>>Flat</option>
														<option value="bungalow"
															<?php

if (isset($property_detail)) {
                if ($property_detail[0]['category'] == 'bungalow') {
                    echo 'selected';
                }
            }
            ?>>Bungalow</option>
													</select>
													<div class="text-danger" id="category_error"
														style="display: none;"></div>
												</div>
											</div>

											<div class="form-group row" id="plotno" style="display: 
                                            <?php

if (isset($property_detail)) {
                                                if ($property_detail[0]['category'] == 'plot') {
                                                    echo 'flex';
                                                } else {
                                                    echo 'none';
                                                }
                                            }
                                            ?>;">
												<label for="staticEmail" class="col-sm-3 col-form-label">Plot
													No.<span class="text-danger">*</span>
												</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="plot_no"
														name="plot_no"
														value="<?php

if (isset($property_detail)) {
                echo $property_detail[0]['block'];
            }
            ?>"
														placeholder="plot no">
													<div class="text-danger" id="plot_no_error"
														style="display: none;"></div>
												</div>
											</div>

											<div class="form-group row" id="blockno" style="display: <?php

if (isset($property_detail)) {
            if ($property_detail[0]['category'] != 'plot') {
                echo 'flex';
            } else {
                echo 'none';
            }
        }
        ?>;">
												<label for="staticEmail" class="col-sm-3 col-form-label">Block<span
													class="text-danger">*</span></label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="block"
														name="block"
														value="<?php

if (isset($property_detail)) {
                echo $property_detail[0]['block'];
            }
            ?>"
														placeholder="Enter block name">
													<div class="text-danger" id="block_error"
														style="display: none;"></div>
												</div>
											</div>

											<div class="form-group row">
												<label for="staticEmail" class="col-sm-3 col-form-label">Facing<span
													class="text-danger">*</span></label>
												<div class="col-sm-9">
													<select name="facing" id="facing" class="form-control">
														<option value="">Select facing</option>
														<option value="E"
															<?php

if (isset($property_detail)) {
                if ($property_detail[0]['facing'] == 'E') {
                    echo 'selected';
                }
            }
            ?>>East</option>
														<option value="W"
															<?php

if (isset($property_detail)) {
                if ($property_detail[0]['facing'] == 'W') {
                    echo 'selected';
                }
            }
            ?>>West</option>
														<option value="S"
															<?php

if (isset($property_detail)) {
                if ($property_detail[0]['facing'] == 'S') {
                    echo 'selected';
                }
            }
            ?>>South</option>
														<option value="N"
															<?php

if (isset($property_detail)) {
                if ($property_detail[0]['facing'] == 'N') {
                    echo 'selected';
                }
            }
            ?>>North</option>
													</select>
													<div class="text-danger" id="facing_error"
														style="display: none;"></div>
												</div>
											</div>

											<div class="form-group row" id="nonplot_area" style="display:<?php

if (isset($property_detail)) {
            if ($property_detail[0]['category'] != 'plot') {
                echo 'none';
            } else {
                echo 'flex';
            }
        }
        ?>;">
												<label for="staticEmail" class="col-sm-3 col-form-label">Area<span
													class="text-danger">*</span></label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="area"
														name="area"
														value="<?php

if (isset($property_detail)) {
                echo $property_detail[0]['area'];
            }
            ?>"
														placeholder="Enter area">
													<div class="text-danger" id="area_error"
														style="display: none;"></div>
												</div>
											</div>

											<div class="form-group row" id="plot_rate" style="display:
                                            <?php

if (isset($property_detail)) {
                                                if ($property_detail[0]['category'] == 'plot') {
                                                    echo 'flex';
                                                } else {
                                                    echo 'none';
                                                }
                                            }
                                            ?>;">
												<label for="staticEmail" class="col-sm-4 col-form-label">Rate
													of Plot</label>
												<div class="col-sm-8">
													<input type="text" name="rate_of_plot" id="rate_of_plot"
														placeholder="Rate of plot"
														value="<?php

if (isset($property_detail)) {
                echo $property_detail[0]['rate_plot'];
            }
            ?>"
														class="form-control" />
													<div class="text-danger" id="rate_of_plot_error"
														style="display: none;"></div>
												</div>
											</div>

											<div class="form-group row" id="construction_area_block" style="display: <?php

if (isset($property_detail)) {
            if ($property_detail[0]['category'] == 'plot') {
                echo 'none';
            } else {
                echo 'flex';
            }
        } else {
            echo 'none';
        }
        ?>;">
												<label for="staticEmail" class="col-sm-4 col-form-label">Construction
													area</label>
												<div class="col-sm-8">
													<input type="text" class="form-control"
														id="construction_area" name="construction_area"
														placeholder="Construction area in sqft"
														value="<?php

if (isset($property_detail)) {
                echo $property_detail[0]['area'];
            }
            ?>" />
													<div class="text-danger" id="construction_area_error"
														style="display: none;"></div>
												</div>
											</div>

											<div class="form-group row" id="block_rate" style="display: <?php

if (isset($property_detail)) {
            if ($property_detail[0]['category'] == 'plot') {
                echo 'none';
            } else {
                echo 'flex';
            }
        } else {
            echo 'none';
        }
        ?>;">
												<label for="staticEmail" class="col-sm-4 col-form-label">Rate
													of Block</label>
												<div class="col-sm-8">
													<input type="text" id="rate_of_block" name="rate_of_block"
														placeholder="Rate of block"
														value="<?php

if (isset($property_detail)) {
                echo $property_detail[0]['rate_plot'];
            }
            ?>"
														class="form-control" />
													<div class="text-danger" id="rate_of_block_error"
														style="display: none;"></div>
												</div>
											</div>

											<div class="p-2" style="border: 1px solid #e0dcdc">
												<h5 class="">
													<label class="text-info"><b>Premium</b></label>
												</h5>
												<hr />
												<input type="checkbox" id="corner" name="corner"
													<?php

if (isset($property_detail)) {
                if ($property_detail[0]['corner'] == '1') {
                    echo 'checked';
                }
            }
            ?> /> Corner &nbsp;
												<input type="checkbox" id="garder" name="garden"
													<?php

if (isset($property_detail)) {
                if ($property_detail[0]['garden'] == '1') {
                    echo 'checked';
                }
            }
            ?> /> Garden
											</div>



										</div>

										<div class="offset-1 col-5">
											<div class="form-group row pb-2" id="bhk_box" style="display: <?php

if (isset($property_detail)) {
            if ($property_detail[0]['category'] == 'plot') {
                echo 'none';
            } else {
                echo 'flex';
            }
        }
        ?>;">
												<label for="staticEmail" class="col-sm-2 col-form-label">BHK</label>
												<div class="col-sm-10">
													<select name="bhk" id="bhk" class="form-control">
														<option value="">Select type</option>
														<option value="1bhk"
															<?php

if (isset($property_detail)) {
                if ($property_detail[0]['property_type'] == '1bhk') {
                    echo 'selected';
                }
            }
            ?>>1 BHK</option>
														<option value="2bhk"
															<?php

if (isset($property_detail)) {
                if ($property_detail[0]['property_type'] == '2bhk') {
                    echo 'selected';
                }
            }
            ?>>2 BHK Duplex</option>
														<option value="3bhk"
															<?php

if (isset($property_detail)) {
                if ($property_detail[0]['property_type'] == '3bhk') {
                    echo 'selected';
                }
            }
            ?>>3 BHK Duplex</option>
													</select>
													<div class="text-danger" id="bhk_error"
														style="display: none;"></div>
												</div>
												<br />
											</div>

											<div class="p-2" style="border: 1px solid #e0dcdc">
												<h5 class="">
													<label class="text-info"><b>Amenities</b></label>
												</h5>
												<hr />
												<div class="form-group row">
													<label for="staticEmail" class="col-sm-3 col-form-label">Maintenance</label>
													<div class="col-sm-9">
														<input type="text" id="maintenance" name="maintenance"
															placeholder="Maintenance cost in rs."
															value="<?php

if (isset($property_detail)) {
                echo $property_detail[0]['maintenance'];
            }
            ?>"
															class="form-control" />
														<div class="text-danger" id="maintenance_error"
															style="display: none;"></div>
													</div>
												</div>

												<div class="form-group row">
													<label for="staticEmail" class="col-sm-3 col-form-label">Club-house</label>
													<div class="col-sm-9">
														<input type="text" name="club_house" id="club_house"
															placeholder="Club house cost in rs."
															value="<?php

if (isset($property_detail)) {
                echo $property_detail[0]['club_house'];
            }
            ?>"
															class="form-control" />
														<div class="text-danger" id="club_house_error"
															style="display: none;"></div>
													</div>
												</div>

												<label>Transformer/Electricity</label>
												<div class="input-group mb-3">
													<input type="text" name="trans_elec" id="trans_elec"
														placeholder="Transform/Electricity cost in rs."
														class="form-control"
														value="<?php

if (isset($property_detail)) {
                echo $property_detail[0]['transformer'];
            }
            ?>" />
													<div class="input-group-append">
														<span class="input-group-text" id="basic-addon2">kw</span>
													</div>
												</div>
												<div class="text-danger" id="trans_elec_error"
													style="display: none;"></div>
											</div>
            								
            								<?php if($this->uri->segment(2) != ''){ ?>
            								<div class="input-group mb-3">
												<div class="form-check">
													<input class="form-check-input" type="checkbox"
														data-pid="<?php echo $property_detail[0]['pid']; ?>"
														id="property_hold_checkbox" name="hold"
														<?php

if (isset($property_detail)) {
                            if ($property_detail[0]['hold'] == '1') {
                                echo 'checked';
                            }
                        }
                        ?>> <label
														class="form-check-label" for="defaultCheck1"> HOLD </label>
												</div>
												&nbsp;&nbsp;&nbsp;&nbsp;
												<div class="form-check">
													<input class="form-check-input"
														data-pid="<?php echo $property_detail[0]['pid']; ?>"
														id="property_booking__checkbox" type="checkbox"
														name="booked"
														<?php

if (isset($property_detail)) {
                            if ($property_detail[0]['is_booked'] == '1') {
                                echo 'checked';
                            }
                        }
                        ?>> <label
														class="form-check-label" for="defaultCheck1"> BOOKED </label>
												</div>
												&nbsp;&nbsp;&nbsp;&nbsp;
												<div class="form-check">
													<input class="form-check-input" type="checkbox" name="sold">
													<label class="form-check-label" for="defaultCheck1"> SOLD </label>
												</div>
											</div>
                                            <?php } ?>
                                                
                                            <label class="mt-2">Total
												Cost : <span id="total_cost">
                                            	<?php
                                            if (isset($property_detail)) {
                                                $totalCost = 0;

                                                $totalCost += $property_detail[0]['rate_plot'] * $property_detail[0]['area'];
                                                if ($property_detail[0]['corner'] == '1') {
                                                    $totalCost += ($totalCost * 5) / 100;
                                                }
                                                if ($property_detail[0]['garden'] == '1') {
                                                    $totalCost += ($totalCost * 5) / 100;
                                                }
                                                if (! is_null($property_detail[0]['maintenance'])) {
                                                    $totalCost += $property_detail[0]['maintenance'];
                                                }
                                                if (! is_null($property_detail[0]['club_house'])) {
                                                    $totalCost += $property_detail[0]['club_house'];
                                                }
                                                if (! is_null($property_detail[0]['transformer'])) {
                                                    $totalCost += $property_detail[0]['transformer'];
                                                }

                                                echo $totalCost;
                                            } else {
                                                echo '0';
                                            }
                                            ?>
                                            </span>
											</label>

											<div class="text-center mt-4">
            									<?php if($this->uri->segment(2) != ''){ ?>
            										<input type="button" id="update"
													data-pid="<?php echo $property_detail[0]['pid']; ?>"
													value="Update" class="btn btn-success" />
            									<?php } else { ?>
                    								<input type="button" id="create"
													value="Submit" class="btn btn-success" />
                    							<?php } ?> 
                    							<input type="button" id="cancel"
													value="Cancel" class="btn btn-warning ml-1" />
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






	<div class="modal fade bd-example-modal-lg" id="bookingModal"
		tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content modal-lg">
				<div class="modal-body">
					<h6 class="text-center text-info">Fill Customer Detail</h6>
					<div style="border: 1px solid #c7c1c1;" class="p-2">
						<table border="0" width="100%" id="customer_detail_table">
							<tr>
								<td><span id="plot_category">Plot</span> No:</td>
								<td><input type="hidden" id="plot_id" /> <input type="text"
									class="form-control" name="plot" id="plot_name" value=""
									readonly /></td>
							</tr>
							<tr>
								<td>Client Name:</td>
								<td><input type="text" class="form-control" name="name"
									id="name" required />
									<div id="name_error" style="display: none";></div></td>
							</tr>
							<tr>
								<td>Father's/Husband's Name:</td>
								<td><input type="text" class="form-control"
									name="father_hub_name" id="father_hub_name" required />
									<div id="father_hub_name_error" style="display: none";></div></td>
							</tr>
							<tr>
								<td>Mobile No:</td>
								<td><input type="text" class="form-control" name="mobile_no"
									id="mobile_no" required />
									<div id="mobile_no_error" style="display: none";></div></td>
							</tr>
							<tr>
								<td valign="top">Address:</td>
								<td><textarea row="3" class="form-control" name="address"
										id="address"></textarea>
									<div id="address_error" style="display: none";></div></td>
							</tr>
							<tr>
								<td valign="top">Wife's Name:</td>
								<td><input type="text" class="form-control" name="wife_name"
									id="wife_name" />
									<div id="wife_name_error" style="display: none";></div></td>
							</tr>
							<tr>
								<td valign="top">Wife's Contact No:</td>
								<td><input type="text" class="form-control" name="wife_contact"
									id="wife_contact" />
									<div id="wife_contact_error" style="display: none";></div></td>
							</tr>
							<tr>
								<td valign="top">Family Members:</td>
								<td><input type="text" class="form-control"
									name="family_members" id="family_members" />
									<div id="family_members_error" style="display: none";></div></td>
							</tr>
							<tr>
								<td valign="top">E-mail Id:</td>
								<td><input type="text" class="form-control" name="emailid"
									id="emailid" />
									<div id="emailid_error" style="display: none";></div></td>
							</tr>
							<tr>
								<td valign="top">Pan Card No:</td>
								<td><input type="text" class="form-control" name="pan" id="pan" />
									<div id="pan_error" style="display: none";></div></td>
							</tr>
							<tr>
								<td valign="top">Adhaar Card No:</td>
								<td><input type="text" class="form-control" name="adhaar"
									id="adhaar" />
									<div id="adhaar_error" style="display: none";></div></td>
							</tr>
							<tr>
								<td colspan="2" align="center">
									<hr /> <a href="#customer_detail"> <input type="button"
										id="book_now" value="Book Now" class="btn btn-success" /></a>
									<input type="button" id="customer_cancel_btn" value="Cancel"
									class="btn btn-outline-secondary" />
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	
	

<?php print_r($footer); ?>

<script>
	var baseUrl = $('#base_url').val();
	
	$(document).on('change','#category',function(){
		var x = $(this).val();
		
		if(x == 'plot'){
			$('#construction_area_block,#bhk_box').hide();
			$('#nonplot_area,#plotno,#plot_rate').show();
			$('#blockno,#block_rate').hide();
		} else{
			$('#construction_area_block,#bhk_box').show();
			$('#nonplot_area,#plotno,#plot_rate').hide();
			$('#blockno,#block_rate').show();
		}	
	});
	
	
	$(document).on('click','#create',function(){
		var formvalid = true;
		
		if($('#category').val() == ''){
			formvalid = false;
			$('#category_error').html('Select category').css('display','block');
		}
		
		if($('#category').val() == 'plot'){
			if($('#plot_no').val() == ''){
				formvalid = false;
				$('#plot_no_error').html('Enter plot no.').css('display','block');
			} else {
				$('#plot_no_error').html('').css('display','none');
			}
			
			if($('#facing').val() == ''){
    			formvalid = false;
    			$('	#facing_error').html('Select facing').css('display','block');
    		} else {
    			$('#facing_error').html('').css('display','none');
    		}
    		
    		if($('#area').val() == ''){
    			formvalid = false;
    			$('	#area_error').html('Enter Area').css('display','block');
    		} else {
    			$('#area_error').html('').css('display','none');
    		}
    		
    		if($('#rate_of_plot').val() == ''){
    			formvalid = false;
    			$('	#rate_of_plot_error').html('Enter Rate of plot').css('display','block');
    		} else {
    			$('#rate_of_plot_error').html('').css('display','none');
    		}
    		
    		if($('#maintenance').val() == ''){
    			formvalid = false;
    			$('	#maintenance_error').html('Enter Rate of maintenance').css('display','block');
    		} else {
    			$('#maintenance_error').html('').css('display','none');
    		}
    		
    		if($('#club_house').val() == ''){
    			formvalid = false;
    			$('	#club_house_error').html('Enter Rate of club_house').css('display','block');
    		} else {
    			$('#club_house_error').html('').css('display','none');
    		}
    		
    		if($('#trans_elec').val() == ''){
    			formvalid = false;
    			$('	#trans_elec_error').html('Enter Rate of transformers').css('display','block');
    		} else {
    			$('#trans_elec_error').html('').css('display','none');
    		}
    		
    		var corner;
    		var garden;
    		if($("#corner").prop('checked') == true){
            	corner = 1;
            } else {
            	corner = 0;
            }
            
            if($("#garder").prop('checked') == true){
            	garden = 1;
            } else {
            	garden = 0;
            }
		
    		if(formvalid){
    			$.ajax({
                  type: 'POST',
                  url : baseUrl + 'property_ctrl/create',
                  data : {
                    'category' : $('#category').val(),
                    'block' : $('#plot_no').val(),
                    'facing' : $('#facing').val(),
                    'area' : $('#area').val(),
                    'rate_of_plot' : $('#rate_of_plot').val(),
                    'corner' : corner,
                    'garden' : garden,
                    'maintenance' : $('#maintenance').val(),
                    'club_house' : $('#club_house').val(),
                    'trans_elec' : $('#trans_elec').val()
                  },
                  dataType : 'json',
                  success: function(response){	
                  	if(response.status == 200){	
                  		alert(response.msg);
                  		location.reload();
                  	} else {
                  		alert(response.msg);
                  	}
                  }
        		});
    		}
		}
		
		else {
			if($('#block').val() ==''){
				formvalid = false;
				$('#block_error').html('Enter block name').css('display','block');
			} else {
				$('#block_error').html('').css('display','none');
			}
			
			if($('#facing').val() == ''){
    			formvalid = false;
    			$('	#facing_error').html('Select facing').css('display','block');
    		} else {
    			$('#facing_error').html('').css('display','none');
    		}
    		
    		if($('#construction_area').val() == ''){
    			formvalid = false;
    			$('#construction_area_error').html('Enter construction area').css('display','block');
    		} else {
    			$('#construction_area_error').html('').css('display','none');
    		}
    		
    		if($('#rate_of_block').val() == ''){
    			formvalid = false;
    			$('#rate_of_block_error').html('Enter rate of block').css('display','block');
    		} else {
    			$('#rate_of_block_error').html('').css('display','none');
    		}
    		
    		if($('#bhk').val() == ''){
    			formvalid = false;
    			$('#bhk_error').html('Select property type').css('display','block');
    		} else {
    			$('#bhk_error').html('').css('display','none');
    		}
    		
    		if($('#maintenance').val() == ''){
    			formvalid = false;
    			$('	#maintenance_error').html('Enter Rate of maintenance').css('display','block');
    		} else {
    			$('#maintenance_error').html('').css('display','none');
    		}
    		
    		if($('#club_house').val() == ''){
    			formvalid = false;
    			$('	#club_house_error').html('Enter Rate of club_house').css('display','block');
    		} else {
    			$('#club_house_error').html('').css('display','none');
    		}
    		
    		if($('#trans_elec').val() == ''){
    			formvalid = false;
    			$('	#trans_elec_error').html('Enter Rate of transformers').css('display','block');
    		} else {
    			$('#trans_elec_error').html('').css('display','none');
    		}
    		
    		var corner;
    		var garden;
    		if($("#corner").prop('checked') == true){
            	corner = 1;
            } else {
            	corner = 0;
            }
            
            if($("#garder").prop('checked') == true){
            	garden = 1;
            } else {
            	garden = 0;
            }
		
			
    		if(formvalid){
    			$.ajax({
                  type: 'POST',
                  url : baseUrl + 'property_ctrl/create',
                  data : {
                    'category' : $('#category').val(),
                    'block' : $('#block').val(),
                    'facing' : $('#facing').val(),
                    'construction_area' : $('#construction_area').val(),
                    'rate_of_plot' : $('#rate_of_block').val(),
                    'corner' : corner,
                    'garden' : garden,
                    'property_type' : $('#bhk').val(),
                    'maintenance' : $('#maintenance').val(),
                    'club_house' : $('#club_house').val(),
                    'trans_elec' : $('#trans_elec').val()
                  },
                  dataType : 'json',
                  success: function(response){	
                  	if(response.status == 200){	
                  		alert(response.msg);
                  		location.reload();
                  	} else {
                  		alert(response.msg);
                  	}
                  }
        		});
    		}
		} 
		
	});   //create function
	
	
	$(document).on('click','#property_booking__checkbox',function(){
		var pid = $(this).data('pid');
		if($(this).prop('checked') == true){
			
			$.ajax({
              type: 'POST',
              url : baseUrl + 'property_ctrl/property_detail',
              data : {
              	'pid' : pid
              },
              dataType : 'json',
              success: function(response){
              	if(response.status == 200){
              		$('#plot_id').val(response.data[0]['pid'].toUpperCase());
              		$('#plot_category').html(response.data[0]['category'].toUpperCase());
              		$('#plot_name').val(response.data[0]['block'].toUpperCase());
              	}
              	$('#bookingModal').modal({
              		'show' : true,
              		'backdrop' : 'static'
              	});
              }
          });
		} else {
			var c = confirm('Cancel booking.');
			if(c){
				var pid = $(this).data('pid');
				$.ajax({
                  type: 'POST',
                  url : baseUrl + 'property_ctrl/property_cancel_book',
                  data : {
                  	'pid' : pid
                  },
                  dataType : 'json',
                  success: function(response){
                  	if(response.status == 200){
                  		alert(response.msg);
                  	}
                  	$('#bookingModal').modal({
                  		'show' : true,
                  		'backdrop' : 'static'
                  	});
                  }
              });
			}
		}
	});
	
	
	
	$(document).on('click','#book_now',function(){
		var formvalid = true;
		
		if($('#name').val() == ''){
			$('#name_error').html('Name is required.').show();
			formvalid = false;
		} else {
			$('#name_error').html('').hide();
		}
		if($('#father_hub_name').val() == ''){
			$('#father_hub_name_error').html('father/husband name required.').show();
			formvalid = false;
		} else {
			$('#father_hub_name_error').html('').hide();
		}
		if($('#mobile_no').val() == ''){
				$('#mobile_no_error').html('mobile no required.').show();
			formvalid = false;
		} else {
			$('#mobie_no_error').html('').hide();
		}		
		if($('#address').val() == ''){
				$('#address_error').html('address required.').show();
			formvalid = false;
		} else {
			$('#address_error').html('').hide();
		}
		if($('#address').val() == ''){
				$('#address_error').html('address required.').show();
			formvalid = false;
		} else {
			$('#address_error').html('').hide();
		}
		if($('#pan').val() == ''){
				$('#pan_error').html('pan no. required.').show();
			formvalid = false;
		} else {
			$('#pan_error').html('').hide();
		}
		if($('#adhaar').val() == ''){
				$('#adhaar_error').html('Adhaar no. required.').show();
			formvalid = false;
		} else {
			$('#adhaar_error').html('').hide();
		}
		
		$.ajax({
          type: 'POST',
          url : baseUrl + 'booking_ctrl/booking',
          data : {
          	'pid' : $('#plot_id').val(),
            'name' : $('#name').val(),
            'father' : $('#father_hub_name').val(),
            'mobile_no' : $('#mobile_no').val(),
            'address' : $('#address').val(),
            'wife_name' : $('#wife_name').val(),
            'wife_contact' : $('#wife_contact').val(),
            'family_members' : $('#family_members').val(),
            'emailid' : $('#emailid').val(),
            'pan' : $('#pan').val(),
            'adhaar' : $('#adhaar').val()
          },
          dataType : 'json',
          success: function(response){
            console.log(response);
            if(response.status == 200){
                alert('Successfully booked.');
                location.reload();
            } else{
                alert('something wrong.');
            }
          }
      	});
	});
	
	$(document).on('click','#property_hold_checkbox',function(){
		var pid = $(this).data('pid');
		var status = true;
		if($(this).prop("checked") == true){
			status = 1;	
		} else {
			status = 0;
		}
		
		$.ajax({
          type: 'POST',
          url : baseUrl + 'Property_ctrl/hold',
          data : {
            'pid' : pid,
            'status' : status
          },
          dataType : 'json',
          success: function(response){
            console.log(response);
            if(response.status == 200){
            	if(status){
                	alert('Property on hold.');
                } else {
                	alert('Property un-hold.');
                }
            } else{
                alert('something wrong.');
            }
          }
      });
	});
	
	$(document).on('click','#customer_cancel_btn',function(){
		$('#property_booking__checkbox').prop('checked', false);
		$('#bookingModal').modal('toggle');
	});
	
	
	
	
	
	
	
	$(document).on('click','#update',function(){
		var pid = $(this).data('pid');
		var formvalid = true;
		
		if($('#category').val() == ''){
			formvalid = false;
			$('#category_error').html('Select category').css('display','block');
		}
		
		if($('#category').val() == 'plot'){
			if($('#plot_no').val() == ''){
				formvalid = false;
				$('#plot_no_error').html('Enter plot no.').css('display','block');
			} else {
				$('#plot_no_error').html('').css('display','none');
			}
			
			if($('#facing').val() == ''){
    			formvalid = false;
    			$('	#facing_error').html('Select facing').css('display','block');
    		} else {
    			$('#facing_error').html('').css('display','none');
    		}
    		
    		if($('#area').val() == ''){
    			formvalid = false;
    			$('	#area_error').html('Enter Area').css('display','block');
    		} else {
    			$('#area_error').html('').css('display','none');
    		}
    		
    		if($('#rate_of_plot').val() == ''){
    			formvalid = false;
    			$('	#rate_of_plot_error').html('Enter Rate of plot').css('display','block');
    		} else {
    			$('#rate_of_plot_error').html('').css('display','none');
    		}
    		
    		if($('#maintenance').val() == ''){
    			formvalid = false;
    			$('	#maintenance_error').html('Enter Rate of maintenance').css('display','block');
    		} else {
    			$('#maintenance_error').html('').css('display','none');
    		}
    		
    		if($('#club_house').val() == ''){
    			formvalid = false;
    			$('	#club_house_error').html('Enter Rate of club_house').css('display','block');
    		} else {
    			$('#club_house_error').html('').css('display','none');
    		}
    		
    		if($('#trans_elec').val() == ''){
    			formvalid = false;
    			$('	#trans_elec_error').html('Enter Rate of transformers').css('display','block');
    		} else {
    			$('#trans_elec_error').html('').css('display','none');
    		}
    		
    		var corner;
    		var garden;
    		if($("#corner").prop('checked') == true){
            	corner = 1;
            } else {
            	corner = 0;
            }
            
            if($("#garder").prop('checked') == true){
            	garden = 1;
            } else {
            	garden = 0;
            }
		
    		if(formvalid){
    			$.ajax({
                  type: 'POST',
                  url : baseUrl + 'property_ctrl/create',
                  data : {
                  	'pid' : pid,
                    'category' : $('#category').val(),
                    'block' : $('#plot_no').val(),
                    'facing' : $('#facing').val(),
                    'area' : $('#area').val(),
                    'rate_of_plot' : $('#rate_of_plot').val(),
                    'corner' : corner,
                    'garden' : garden,
                    'maintenance' : $('#maintenance').val(),
                    'club_house' : $('#club_house').val(),
                    'trans_elec' : $('#trans_elec').val()
                  },
                  dataType : 'json',
                  success: function(response){	
                  	if(response.status == 200){	
                  		alert(response.msg);
                  		location.reload();
                  	} else if(response.status == 201){
                  		alert(response.msg);
                  		window.location.href = baseUrl + 'dashboard';
                  	}
                  	else {
                  		alert(response.msg);
                  	}
                  }
        		});
    		}
		}
		
		else {
			if($('#block').val() ==''){
				formvalid = false;
				$('#block_error').html('Enter block name').css('display','block');
			} else {
				$('#block_error').html('').css('display','none');
			}
			
			if($('#facing').val() == ''){
    			formvalid = false;
    			$('	#facing_error').html('Select facing').css('display','block');
    		} else {
    			$('#facing_error').html('').css('display','none');
    		}
    		
    		if($('#construction_area').val() == ''){
    			formvalid = false;
    			$('#construction_area_error').html('Enter construction area').css('display','block');
    		} else {
    			$('#construction_area_error').html('').css('display','none');
    		}
    		
    		if($('#rate_of_block').val() == ''){
    			formvalid = false;
    			$('#rate_of_block_error').html('Enter rate of block').css('display','block');
    		} else {
    			$('#rate_of_block_error').html('').css('display','none');
    		}
    		
    		if($('#bhk').val() == ''){
    			formvalid = false;
    			$('#bhk_error').html('Select property type').css('display','block');
    		} else {
    			$('#bhk_error').html('').css('display','none');
    		}
    		
    		if($('#maintenance').val() == ''){
    			formvalid = false;
    			$('	#maintenance_error').html('Enter Rate of maintenance').css('display','block');
    		} else {
    			$('#maintenance_error').html('').css('display','none');
    		}
    		
    		if($('#club_house').val() == ''){
    			formvalid = false;
    			$('	#club_house_error').html('Enter Rate of club_house').css('display','block');
    		} else {
    			$('#club_house_error').html('').css('display','none');
    		}
    		
    		if($('#trans_elec').val() == ''){
    			formvalid = false;
    			$('	#trans_elec_error').html('Enter Rate of transformers').css('display','block');
    		} else {
    			$('#trans_elec_error').html('').css('display','none');
    		}
    		
    		var corner;
    		var garden;
    		if($("#corner").prop('checked') == true){
            	corner = 1;
            } else {
            	corner = 0;
            }
            
            if($("#garder").prop('checked') == true){
            	garden = 1;
            } else {
            	garden = 0;
            }
		
			
    		if(formvalid){
    			$.ajax({
                  type: 'POST',
                  url : baseUrl + 'property_ctrl/create',
                  data : {
                  	'pid' : pid,
                    'category' : $('#category').val(),
                    'block' : $('#block').val(),
                    'facing' : $('#facing').val(),
                    'construction_area' : $('#construction_area').val(),
                    'rate_of_plot' : $('#rate_of_block').val(),
                    'corner' : corner,
                    'garden' : garden,
                    'property_type' : $('#bhk').val(),
                    'maintenance' : $('#maintenance').val(),
                    'club_house' : $('#club_house').val(),
                    'trans_elec' : $('#trans_elec').val()
                  },
                  dataType : 'json',
                  success: function(response){	
                  	if(response.status == 200){	
                  		alert(response.msg);
                  		location.reload();
                  	}
                  	else if(response.status == 201){
                  		alert(response.msg);
                  		window.location.href = baseUrl + 'dashboard';
                  	} 
                  	else {
                  		alert(response.msg);
                  	}
                  }
        		});
    		}
		} 
		
	});
	
	
	$(document).on('keyup','#rate_of_plot,#rate_of_block,#maintenance,#club_house,#trans_elec',function(){
		totalCost();
	});
	
	$(document).on('click','#corner,#garder',function(){
		totalCost();
	});
	
	function totalCost(){
		if($('#category').val() == 'plot'){
			var area = $('#area').val();
			var rate = $('#rate_of_plot').val();
			rate = parseFloat(parseFloat(rate) * parseFloat(area));
		} else {
			var area = $('#construction_area').val();
			var rate = $('#rate_of_block').val();
			rate = parseFloat(parseFloat(rate) * parseFloat(area));
		}
			var corner = 0;
			var garden = 0;
			var maintenance = 0;
			var club_house = 0;
			var trans_elec= 0;
			if($('#corner').prop('checked')==true){
				corner = (rate * 5)/100;
			}
			
			if($('#garder').prop('checked')==true){
				garden = (rate * 5)/100;
			}
			
			if($('#maintenance').val() == ''){ 
				maintenance = 0;
			} else {
				maintenance = $('#maintenance').val();
			}
			
			if($('#club_house').val() == ''){
				club_house = '0';
			} else {
				club_house = $('#club_house').val();	
			}
			
			if($('#trans_elec').val() == ''){
				trans_elec = '0';
			} else {
				trans_elec = $('#trans_elec').val();
			}
			
			$('#total_cost').html(parseFloat(rate) + parseFloat(corner) + parseFloat(garden) + parseFloat(maintenance) + parseFloat(club_house) + parseFloat(trans_elec));
	}
</script>

</body>
</html>
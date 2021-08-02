<!DOCTYPE html>
<html lang="en">
<?php print_r($header); ?>

<style>
    @media screen and (max-width: 480px) {
      #customer_detail{
        margin-top : 25px;
      }
    }

</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
<!--                 <div class="container-fluid text-center"> -->
                    <!-- Page Heading -->
<!--                     <h1 class="h3 mb-4 text-gray-800">Search Block / Property</h1> -->
<!--                 </div> -->
                <!-- /.container-fluid -->
                
                
                
                <div class="offset-sm-3 col-sm-6">
                	<center>
                		<div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input category" data-id="plot" value="plot" name="category"> PLOT
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input category" data-id="flat" value="flat" name="category"> FLAT
                          </label>
                        </div>
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input category" data-id="bungalow" value="bungalow" name="category"> BUNGALOW
                          </label>
                        </div>
                    </center>
                        
                		<div class="row m-1 mt-2">
                    		<div class="col-9 p-0 m-0">
                             <input  class="search_keyword form-control" placeholder="Type search key..." id="pro_search" name="search_keyword_id"  value="">
                                 <div id="search_result" class="" style="display: none;border:1px solid #e2dddd;"> 
                           		 </div>
                            </div>
                            <div class="col-2">
                        		<input type="button" id="search" class="btn-info btn-sm" value="  search  " />
                        	</div>
                    	</div>
                    <br/>
                    
                </div>
                <hr/>
                <div class="container-fluid">
                
                <div class="row">
                    	<div id="plot_detail" class="col-sm-4" style="display: none;"></div>
                    	<div class="mb-4 offset-sm-1 col-sm-6" id="customer_detail" style="display: none;">
                    		<h6 class="text-center text-info">Fill Customer Detail</h6>
                    		<div style="border: 1px solid #c7c1c1;" class="p-2">
                    		<table border="0" width="100%" id="customer_detail_table">
                    			<tr>
                    				<td><span id="plot_category">Plot</span> No:</td>
                    				<td>
                    					<input type="text" class="form-control" name="plot" id="plot" value="A1" readonly/>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td>Name:</td>
                    				<td>
                    					<input type="text" class="form-control" name="name" id="name" required />
                    					<div id="name_error" style="display: none";></div>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td>Father's/Husband's Name:</td>
                    				<td>
                    					<input type="text" class="form-control" name="father_hub_name" id="father_hub_name" required />
                    					<div id="father_hub_name_error" style="display: none";></div>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td>Mobile No:</td>
                    				<td>
                    					<input type="text" class="form-control" name="mobile_no" id="mobile_no" required/>
                    					<div id="mobile_no_error" style="display: none";></div>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td valign="top">Address:</td>
                    				<td>
                    					<textarea row="3" class="form-control" name="address" id="address"></textarea>
                    					<div id="address_error" style="display: none";></div>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td valign="top">Wife's Name:</td>
                    				<td>
                    					<input type="text" class="form-control" name="wife_name" id="wife_name" />
                    					<div id="wife_name_error" style="display: none";></div>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td valign="top">Wife's Contact No:</td>
                    				<td>
                    					<input type="text" class="form-control" name="wife_contact" id="wife_contact" />
                    					<div id="wife_contact_error" style="display: none";></div>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td valign="top">Family Members:</td>
                    				<td>
                    					<input type="text" class="form-control" name="family_members" id="family_members" />
                    					<div id="family_members_error" style="display: none";></div>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td valign="top">E-mail Id:</td>
                    				<td>
                    					<input type="text" class="form-control" name="emailid" id="emailid" />
                    					<div id="emailid_error" style="display: none";></div>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td valign="top">Pan Card No:</td>
                    				<td>
                    					<input type="text" class="form-control" name="pan" id="pan" />
                    					<div id="pan_error" style="display: none";></div>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td valign="top">Adhaar Card No:</td>
                    				<td>
                    					<input type="text" class="form-control" name="adhaar" id="adhaar" />
                    					<div id="adhaar_error" style="display: none";></div>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td colspan="2" align="center">
                    					<hr/>
                    					<a href="#customer_detail">
                    					<input type="button" id="book_now" value="Book Now" class="btn btn-success"/></a>
                    					<input type="button" id="customer_cancel_btn" value="Cancel" class="btn btn-outline-secondary"/>
                    				</td>
                    			</tr>
                    		</table>
                    		</div>
                    	</div>
                    </div>
				</div>
					
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
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	
      </div>
      <div class="modal-footer">
        <button type="button" id="modal_create" class="btn btn-primary"style="display:inline;">Create</button>
        <button type="button" id="modal_update" class="btn btn-warning" style="display:none;">Update</button>  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enquiryModalLabel">Enquiry form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<form>
        	<div class="form-group row">
            	<label for="staticEmail" class="col-sm-3 col-form-label">
            		<sapn id="block_label"></sapn> No.
            	</label>
            	<div class="col-sm-9">
              		<label id="block_name"></label>
            	</div>
          	</div>
          	<div class="form-group row">
            	<label for="inputPassword" class="col-sm-3 col-form-label">Client Name</label>
            	<div class="col-sm-9">
              		<input type="text" class="form-control" id="client_name" placeholder="Client Name">
            	</div>
          	</div>
          	<div class="form-group row">
            	<label for="inputPassword" class="col-sm-3 col-form-label">Contact No.</label>
            	<div class="col-sm-9">
              		<input type="text" class="form-control" id="client_contact" placeholder="Contact No.">
            	</div>
          	</div>
          	<div class="form-group row">
            	<label for="inputPassword" class="col-sm-3 col-form-label">Discount</label>
            	<div class="col-sm-9">
              		<input type="text" class="form-control" id="client_discount" placeholder="Customer need discount">
            	</div>
          	</div>
          	<div class="form-group row">
            	<label for="inputPassword" class="col-sm-3 col-form-label">Remark</label>
            	<div class="col-sm-9">
              		<textarea id="client_remark" rows="3" class="form-control"></textarea>
            	</div>
          	</div>
       	</form>
      </div>
      <div class="modal-footer">
        <button type="button" id="enquiry_submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php print_r($footer); ?>

<script>
	var baseUrl = $('#base_url').val();
	var pid;
	$(document).on('click','#search',function(){
	
		$('#customer_detail').hide();
        $('#plot_detail').hide();
                
		if($('#category').val() == ''){
			alert('Choose category first');
			return false;
		} else if($('#str').val() == ''){
			alert('Please enter block name');
			return fase;
		}
		
		var category = $("input[name='category']:checked").val();
		var search_str = $('#pro_search').val();

    	$.ajax({
          type: 'POST',
          url : baseUrl + 'booking_ctrl/get_property_detail',
          data : {
            'category' : category,
            'search_text' : search_str
          },
          dataType : 'json',
          success: function(response){
            console.log(response);
            var x = '<h6 class="text-center text-info">Property Detail</h6>';
            if(response.status == 200){
            	pid =  response.data[0].pid;
                $.each(response.data,function(key,value){
                	x = x + '<table border="1" width="100%">'+
                    			'<tr>'+
                    				'<td>'+ $("input[name='category']:checked").val().toUpperCase() +' No.</td>'+
                    				'<td>'+ value.block +'</td>'+
                    			'</tr>';
                    			var facing;
                    			if(value.facing == 'E'){
                    				facing = 'EAST';
                    			} else if (value.facing == 'W'){
                    				facing = 'WEST';
                    			} else if (value.facing == 'N'){
                    				facing = 'NORTH';
                    			} else if(value.facing == 'S'){
                    				facing = 'SOUTH';
                    			}
                    			
                    			x = x + '<tr>'+
                    				'<td>Facing</td>'+
                    				'<td>'+ facing +'</td>'+
                    			'</tr>'+
                    			'<tr>'+
                    				'<td>Construction Area</td>'+
                    				'<td>'+ value.construction_area +'</td>'+
                    			'</tr>'+
                    			'<tr>'+
                    				'<td>Rate</td>'+
                    				'<td>'+ value.rate_plot +'</td>'+
                    			'</tr>'+
                    			'<tr>'+
                    				'<td>Plot Area</td>'+
                    				'<td>'+ value.area +'</td>'+
                    			'</tr>'+
                    			'<tr>'+
                    				'<td><b>Plot</b></td>'+
                    				'<td><b>'+ (value.rate_plot*value.area) +'</b></td>'+
                    			'</tr>'+
                    			'<tr>'+
                    				'<td>Amenities:-'+
                    				'<table>'+
                    						'<tr>'+
                    							'<td>Maintenance -</td>'+
                    							'<td>'+ value.maintenance +'</td>'+
                    						'</tr>'+
                    						'<tr>'+
                    							'<td>Transformer -</td>'+
                    							'<td>'+ value.transformer +'</td>'+
                    						'</tr>'+
                    						'<tr>'+
                    							'<td>Club house -</td>'+
                    							'<td>'+ value.club_house +'</td>'+
                    						'</tr>'+
                    					'</table></td>'+
                    				'<td valign="top">'+ (parseFloat(parseFloat(value.maintenance) + parseFloat(value.transformer)) + parseFloat(value.club_house)) +'</td>'+
                    			'</tr>'+
                    			'<tr>'+
                    				'<td>Premium:-'+
                    					'<table>'+
                    						'<tr>'+
                    							'<td>Corner 5% -</td>'+
                    							'<td>'+ value.corner +'</td>'+
                    						'</tr>'+
                    						'<tr>'+
                    							'<td>Garder 5% -</td>'+
                    							'<td>'+ value.garden +'</td>'+
                    						'</tr>'+
                    					'</table>'+
                    				'</td>'+
                    				'<td valign="top">'+ parseFloat(parseFloat(value.corner) + parseFloat(value.garden)) +'</td>'+
                    			'</tr>'+
                    			'<tr>'+
                    				'<td>Total Amount</td>'+
                    				'<td>'+ parseFloat(parseFloat(parseFloat(parseFloat(parseFloat(value.maintenance) + parseFloat(value.transformer)) 
                    						+ parseFloat(value.club_house)) 
                    						+ parseFloat(parseFloat(value.corner)+ parseFloat(value.garden))
                    						) + parseFloat(value.rate_plot*value.area)) +'</td>'+
                    			'</tr>'+
                    			'<tr>'+
                    				'<td>Final Amount</td>'+
                    				'<td>'+ parseFloat(parseFloat(parseFloat(parseFloat(parseFloat(value.maintenance) + parseFloat(value.transformer)) 
                    						+ parseFloat(value.club_house)) 
                    						+ parseFloat(parseFloat(value.corner)+ parseFloat(value.garden))
                    						) + parseFloat(value.rate_plot*value.area)) +'</td>'+
                    			'</tr>'+
                    		'</table>'+
                    	
                    		'<div class="mt-3 text-center">';
                    			var bookbtn;
                    			var soldbtn;
                    			if(value.is_booked == 1){
                    				bookbtn = 'none';
                    				soldbtn = 'inline';
                    			} else {
                    				bookbtn = 'inline';
                    				soldbtn = 'none';
                    			}
                    			x = x +'<b><a href="javascript:void(0);" id="enquiry">Enquiry form</a></b>&nbsp;&nbsp;<a id="booknow" href="#" class="btn btn-danger" style="display:'+ bookbtn +';">Book now</a>'+
                    			'<input type="button" id="sold_view" value="Sold View detail" class="btn btn-info" style="display:'+ soldbtn +';">'+
                    		'</div>';
                    $('#plot_detail').html(x).show();
                });
            } else{
                $('#plot_detail').html('No record found. Try again.').show();
            }
          }
      	});
		//$('#plot_detail').show();
	});
	
	$(document).on('click','#booknow',function(){
		$('#customer_detail').show();
		$('#plot').val($('#pro_search').val());
		$('#plot_category').html($("input[name='category']:checked").val().toUpperCase());
		$(this).hide();
	});
	
	$(document).on('click','#customer_cancel_btn',function(){
		$('#customer_detail').hide();
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
          	'pid' : pid,
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
                alert('Successfully purchased.');
                location.reload();
            } else{
                alert('something wrong.');
            }
          }
      	});
	});
	
	

	$(document).on('click','.category',function(){
		$('#customer_detail').hide();
        $('#plot_detail').hide();
        $('#pro_search').val('');
        
		var category = $(this).data('id');
		
		$.ajax({
          type: 'POST',
          url : baseUrl + 'booking_ctrl/category_wise_block',
          data : {
          	'category' : category
          },
          dataType : 'json',
          success: function(response){
          var x = '<option value="">search '+ $('#category option:selected').text() +'</option>';
          	if(response.status == 200){
          		$.each(response.data,function(key,value){
          			x = x + '<option value="'+ value.pid +'">'+ value.block +'</option>';
          		});	
          	}
          	$('#pro_search').html(x);
          }
       });
       
	});
	
	
	$(document).on('click','.searchItem',function(){
		$('#pro_search').val($(this).data('val'));
		$('#search_result').hide();
		
		$('#customer_detail').hide();
        $('#plot_detail').hide();
	});
	
	$(document).on('keyup','#pro_search',function(){
		var search_str = $(this).val();
		var category = $("input[name='category']:checked").val();
		
		if(search_str.length > 0){ 
    		$.ajax({
              type: 'POST',
              url : baseUrl + 'booking_ctrl/name_wise_search',
              data : {
              	'category' : category,
              	'search_str' : search_str 
              },
              dataType : 'json',
              success: function(response){
              	var x='';
              	if(response.status == 200){
              		
              		$.each(response.data,function(key,value){
              			x = x + '<a href="javascript:void(0);" class="searchItem" data-val="'+ value.block +'" data-id="'+ value.pid +'" style="text-decoration: none;">'+
              						'<div class="pt-1" style="background-color:#e2dddd45; margin-bottom:1px;">'+ value.block +'</div>'+
              					'</a>';
              		});
              		
              		$('#search_result').html(x).show();
              	} else {
              	
              	}
              }
           });
       } else {
       		$('#search_result').html('<div>No record found.</div>').hide();
       }
	});
	
	
	$(document).on('click','#enquiry',function(){
		$('#block_label').html($("input[name='category']:checked").val().toUpperCase());
		$('#block_name').html($('#pro_search').val());
		
		$('#enquiryModal').modal({
			'show' : true
		});
	});
	
	$(document).on('click','#enquiry_submit',function(){
		var plot_id = pid;
		var client_name = $('#client_name').val();
		var client_contact = $('#client_contact').val();
		var client_discount = $('#client_discount').val();
		var client_remark = $('#client_remark').val();
		
		$.ajax({
              type: 'POST',
              url : baseUrl + 'booking_ctrl/enquiry',
              data : { 
              	'plot_id' : plot_id,
              	'client_name' : client_name,
              	'client_contact' : client_contact,
              	'client_discount' : client_discount,
              	'client_remark' : client_remark
              },
              dataType : 'json',
              success: function(response){
              	alert(response.msg);
              	
              	$('#enquiryModal').modal('toggle');
              }
       });
	});
</script>

</body>
</html>
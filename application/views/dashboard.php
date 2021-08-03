<?php $permission = $this->session->userdata('permission');?>
<!DOCTYPE html>
<html lang="en">
<?php print_r($header); ?>
<body id="page-top">

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
					<div class="table-responsive">
						
						<label>Property Type</label>
						<select id="property_type">
							<option value="">-- All --</option>
							<option value="plot">Plot</option>
							<option value="flat">Flat</option>
							<option value="bungalow">Bungalow</option>
						</select>
						<label>Facing</label>
						<select id="property_facing">
							<option value="">-- All --</option>
							<option value="E">EAST</option>
							<option value="W">WEST</option>
							<option value="N">NORTH</option>
							<option value="S">SOUTH</option>
						</select>
						
						<label>Booking Status</label>
						<select id="property_booking">
							<option value="">-- All --</option>
							<option value="1">Booked</option>
							<option value="0">Not Booked</option>
						</select>
						
						<label>Hold Status</label>
						<select id="property_hold">
							<option value="">-- All --</option>
							<option value="plot">Hold</option>
							<option value="flat">Not Hold</option>
						</select>
						
						<input type="text" id="search_block" placeholder="search by block name" />
						<input type="button" id="search_property" value="search" />
						<br/><br/>
						
    					<table class="table table-bordered table-striped text-center" id="property_table"></table>
					</div>
                </div>
            </div>
        </div>

		<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="mymodalLabel">Enquiry form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="mymodalbody">
        
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

<input type="text" id="permission" value="<?php echo $permission['plot_entry']; ?>" />
<?php print_r($footer); ?>

<script>
	var baseUrl = $('#base_url').val();
	var permission = '<?php echo $permission["plot_entry"]; ?>';
	
	$(document).on('click','.ishold',function(){
		var pid = $(this).data('id');
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
                alert(response.msg);
            } else{
                alert('something wrong.');
            }
          }
      });
	});
	
	
	$(document).on('click','.pdelete',function(){
		var pid = $(this).data('id');
		var that = this;
		
		var c = confirm('Are you sure?');
		if(c){
			$.ajax({
              type: 'POST',
              url : baseUrl + 'Property_ctrl/delete',
              data : {
                'pid' : pid
              },
              dataType : 'json',
              success: function(response){
                if(response.status == 200){
                	$(that).closest('tr').hide('slow');
                } else{
                    alert('something wrong.');
                }
              }
          });
      }
	});
	
	
	$(document).on('click','.booked',function(){
		$('#mymodalLabel').html('Booking Detail');
		var pid = $(this).data('pid');
		$.ajax({
              type: 'POST',
              url : baseUrl + 'booking_ctrl/booking_detail',
              data : {
                'pid' : pid
              },
              dataType : 'json',
              success: function(response){
                if(response.status == 200){
                	var x = '<table class="table table-bordered table-striped table-condensed">'+
                				'<tr>';
                    				if(response.data[0].category == 'plot'){
                    					x =x + '<td>Ploat No.</td><td>'+ response.data[0].block +'</td>';
                    				} else if (response.data[0].category == 'flat'){
                    					x =x + '<td>Flat No.</td><td>'+ response.data[0].block +'</td>';
                    				}
                				x = x + '</tr>'+
                					'<tr>'+
                						'<td>client Name</td>'+
                						'<td>'+ response.data[0].name +'</td>'+
                					'</tr>'+
                					'<tr>'+
                						'<td>Contact No</td>'+
                						'<td>'+ response.data[0].contact_no +'</td>'+
                					'</tr>'+
                					'<tr>'+
                						'<td>Address</td>'+
                						'<td>'+ response.data[0].address +'</td>'+
                					'</tr>'+
                			'</table>';
                	$('#mymodalbody').html(x);
                } else{
                    alert('something wrong.');
                }
              }
          });
          
		$('#mymodal').modal({
			'show' : true
		});	
	});
	
	
	$(document).on('click','.enquiry',function(){
		$('#mymodalLabel').html('Enquiry Detail');
		var pid = $(this).data('pid');
		$.ajax({
              type: 'POST',
              url : baseUrl + 'booking_ctrl/enquiery_detail',
              data : {
                'pid' : pid
              },
              dataType : 'json',
              success: function(response){
              	var x='';
              	$.each(response.data,function(key,value){
              		x = x + '<table width="100%" class="table-bordered table-stripped table-condensed">'+
              					'<tr class="bg-dark text-light">';
              					if(value.category == 'plot'){
              						x = x + '<td>Plot No.</td><td>'+ value.block +'</td>';
              					} else if(value.category == 'flat'){
              						x = x + '<td>Flat No.</td><td>'+ value.block +'</td>';
              					}
              					x = x + '</tr>'+
              					'<tr>'+
              						'<td>Client Name</td>'+
              						'<td>'+ value.client_name +'</td>'+
              					'</tr>'+
              					'<tr>'+
              						'<td>Contact No</td>'+
              						'<td>'+ value.client_number +'</td>'+
              					'</tr>'+
              					'<tr>'+
              						'<td>Discount</td>'+
              						'<td>'+ value.discount +'%</td>'+
              					'</tr>'+
              					'<tr>'+
              						'<td>Remark</td>'+
              						'<td>'+ value.remark +'%</td>'+
              					'</tr>'+
              				'</table><hr/>';
              	});
              	$('#mymodalbody').html(x);
              }
        });
		
		$('#mymodal').modal({
			'show' : true
		});
	});
	
	
	
	getproperty();
	
	
	$(document).on('change','#property_type,#property_facing,#property_booking,#property_hold,#search_block',function(){
		getproperty();
	});
	
	$(document).on('keyup','#search_block',function(){
		getproperty();
	});
	
	$(document).on('click','#search_property',function(){
		getproperty();
	});
	
	function getproperty(){
		$.ajax({
              type: 'POST',
              url : baseUrl + 'Dashboard_ctrl/property_list',
              data : {
              	'pro_type': $('#property_type').val(),
        		'pro_facing' : $('#property_facing').val(),
        		'pro_booking' : $('#property_booking').val(),
        		'pro_hold' : $('#property_hold').val(),
        		'pro_block' : $('#search_block').val()
              },
              dataType : 'json',
              success: function(response){
              	console.log(response);
              	if(response.status == 200){
              		var x = '<thead>'+
    							'<tr class="bg-dark text-light">'+
    								'<th>Sno</th>'+
    								'<th>Category</th>'+
    								'<th>Block Name</th>'+
    								'<th>Facing</th>'+
    								'<th>Enquiries</th>'+
    								'<th>Is Booked</th>';
    								if(permission == '1'){
        								x = x + '<th>on Hold</th>'+
        								'<th>Action</th>';
    								}
    							x = x + '</tr>'+
    						'</thead><tbody>';
    				
    				$.each(response.data,function(key,value){
    					x = x + '<tr>'+
    								'<td>'+ parseInt(parseInt(key) + 1) +'.</td>'+
    								'<td>'+ value.category.toUpperCase() +'</td>'+
    								'<td>'+ value.block.toUpperCase() +'</td>';
    								
    								if(value.facing == 'E'){
    									x = x + '<td>EAST</td>';
    								} else if(value.facing == 'W'){
    									x = x + '<td>WEST</td>';
    								} else if(value.facing == 'N'){
    									x = x + '<td>NORTH</td>';
    								} else if(value.facing == 'S'){
    									x = x + '<td>SOUTH</td>';
    								}
    								
    								if(value.enquiry != '0'){
    									x = x + '<td><a href="#" class="enquiry" data-pid="'+ value.pid +'">'+ value.enquiry +'</a></td>';
    								} else {
    									x = x + '<td></td>';
    								}
    								
    								if(value.is_booked != '0'){
    									x = x + '<td><a href="#" class="booked" data-pid="'+ value.pid +'">'+ value.is_booked +'</a></td>';
    								} else {
    									x = x + '<td></td>';
    								}
    								if(permission == '1'){
    								
        								if(value.hold == '1'){
        									x = x + '<td><input class="ishold" data-id="'+ value.pid +'" type="checkbox" checked /></td>';
        								} else {
        									x = x + '<td><input class="ishold" data-id="'+ value.pid +'" type="checkbox"/></td>';
        								}
    								
    									x = x + '<td>'+
    										'<a href="'+ baseUrl +'property/edit/'+ value.pid +'" class="text-info pedit" title="Edit Property" data-id="'+ value.pid +'">'+
    											'<i class="fas fa-pencil-alt"></i>'+
    										'</a>'+
    										'&nbsp;'+
    										'<a href="javascript:void(0);" class="text-danger pdelete" title="Delete property" data-id="'+ value.pid +'">'+
    											'<i class="fas fa-trash-alt"></i>'+
    										'</a>'+
    									'</td>';
    								}
    							x = x + '</tr>';
    				});
    				
    				x = x + '</tbody>';
    				$('#property_table').html(x);
              	} else {
              		$('#property_table').html('No record found.');
              	}
              }
        });
	}
	
</script>
</body>

</html>
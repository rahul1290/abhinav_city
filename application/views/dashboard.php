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
    					<table class="table table-bordered table-striped text-center" id="dataTable">
    						<thead>
    							<tr class="bg-dark text-light">
    								<th>Sno</th>
    								<th>Category</th>
    								<th>Block Name</th>
    								<th>Facing</th>
    								<th>Enquiries</th>
    								<th>Is Booked</th>
    								<?php if($this->session->userdata('permission')['plot_entry']){ ?>
    								<th>on Hold</th>
    								<th>Action</th>
    								<?php } ?>
    							</tr>
    						</thead>
    						<tbody>
    							<?php
    							     $c = 1;
    							     foreach($property_list as $plist){ ?>
    								<tr>
    									<td><?php echo $c++; ?>.</td>
    									<td><?php echo $plist['category']; ?></td>
    									<td><?php echo $plist['block']; ?></td>
    									<td><?php echo $plist['facing']; ?></td>
    									<td><?php if($plist['enquiry']){
    									    echo '<a href="javascript:void(0);" class="enquiry" data-pid="'. $plist['pid'] .'">'.$plist['enquiry'].'</a>';
    									}?></td>
    									<td><?php 
            									if($plist['is_booked']){
            								        echo '<a href="javascript:void(0);" class="booked" data-pid="'. $plist['pid'] .'">Booked</a>';	    
            									} else {
            									 echo "";   
            									} 
    									    ?>
    									</td>
    									<?php if($this->session->userdata('permission')['plot_entry']){ ?>
    									<?php if($plist['hold']){ ?>
    										<td>
        										<input title="property on hold" type="checkbox" class="ishold" data-id="<?php echo $plist['pid']; ?>" checked />
        										<sub><span id="hold_text_<?php echo $plist['pid']; ?>"></span></sub>
        									</td>
    									<?php } else {?>
    										<td>
        										<input title="property on hold" type="checkbox" class="ishold" data-id="<?php echo $plist['pid']; ?>" />
        										<sub><span id="hold_text_<?php echo $plist['pid']; ?>"></span></sub>
        									</td>
    									<?php } ?>
    									<td>
    										<a href="javascript:void(0);" class="text-info pedit" title="Edit Property" data-id="<?php echo $plist['pid']; ?>">
    											<i class="fas fa-pencil-alt"></i>
    										</a>
    										&nbsp;
    										<a href="javascript:void(0);" class="text-danger pdelete" title="Delete property" data-id="<?php echo $plist['pid']; ?>">
    											<i class="fas fa-trash-alt"></i>
    										</a>
    									</td>
    									<?php } ?>
    								</tr>
    							<?php } ?> 
    						</tbody>
    					</table>
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

<?php print_r($footer); ?>

<script>
	var baseUrl = $('#base_url').val();
	
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
	
</script>
</body>

</html>
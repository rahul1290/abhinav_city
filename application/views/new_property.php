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
                                <form name="f1" method="POST" action="<?php echo base_url('property_ctrl/create');?>">
                                    <div class="form-row">
                                        <div class="col-5">
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-3 col-form-label">Category<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <select name="category" id="category" class="form-control">
                                                        <option value="">Select category</option>
                                                        <option value="plot" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['category'] == 'plot') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>Plot</option>
                                                        <option value="flat" <?php
                                                        if (isset($property_detail)) {
                                                            if ($property_detail[0]['category'] == 'flat') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?>>Flat</option>
                                                        <option value="bungalow" <?php
                                                        if (isset($property_detail)) {
                                                            if ($property_detail[0]['category'] == 'bungalow') {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?>>Bungalow</option>
                                                    </select>
                                                    <div class="text-danger" id="category_error" style="display: none;">
                                                    </div>
                                                </div>
                                            </div>
											
											<!--
											     plot seaction start 
											 -->
											<section id="plot_section_left" style="display:none;">
                                                <div class="form-group row" id="plotno">
                                                    <label for="staticEmail" class="col-sm-3 col-form-label">Plot No.<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="psl_plot_no" name="plot_no"
                                                            value="<?php
                                                            if (isset($property_detail)) {
                                                                echo $property_detail[0]['block'];
                                                            }   
                                                            ?>" placeholder="plot no">
                                                        <div class="text-danger" id="psl_plot_no_error" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-3 col-form-label">Facing<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select name="facing" id="psl_facing" class="form-control">
                                                            <option value="">Select facing</option>
                                                            <option value="E" <?php
                                                            if (isset($property_detail)) {  
                                                                if ($property_detail[0]['facing'] == 'E') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>East</option>
                                                            <option value="W" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['facing'] == 'W') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>West</option>
                                                            <option value="S" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['facing'] == 'S') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>South</option>
                                                            <option value="N" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['facing'] == 'N') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>North</option>
                                                        </select>
                                                        <div class="text-danger" id="psl_facing_error" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-3 col-form-label">Area<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="psl_area" name="area" value="<?php
                                                        if (isset($property_detail)) {
                                                            echo $property_detail[0]['area'];
                                                        }
                                                        ?>" placeholder="Enter area">
                                                        <div class="text-danger" id="psl_area_error" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label">Rate of Plot</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="psl_rate_of_plot" id="psl_rate_of_plot"
                                                            placeholder="Rate of plot" value="<?php
                                                            if (isset($property_detail)) {
                                                                echo $property_detail[0]['rate_plot'];
                                                            } else { echo "0"; }
                                                            ?>" class="form-control" />
                                                        <div class="text-danger" id="rate_of_plot_error"
                                                            style="display: none;"></div>
                                                    </div>
                                                </div>
    
    
                                                <div class="p-2" style="border: 1px solid #e0dcdc">
                                                    <h5 class="">
                                                        <label class="text-info"><b>Premium</b></label>
                                                    </h5>
                                                    <hr />
                                                    <input type="checkbox" id="psl_corner" name="corner" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['corner'] == '1') {
                                                                    echo 'checked';
                                                                }
                                                            }
                                                            ?> /> Corner &nbsp;
                                                    <input type="checkbox" id="psl_garder" name="garden" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['garden'] == '1') {
                                                                    echo 'checked';
                                                                }
                                                            }
                                                            ?> /> Garden
                                                                        
                                                    <div id="psl_premium_cal" style="display: none;">
                                                    	<br/>
                                                    	Calculated in % :
                                                    	<input type="checkbox" id="psl_calculateinper" checked />
                                                    	&nbsp; <input type="text" id="psl_per_amount" value="5"/>
                                                    	<br/>
                                                    	Total Premium : <span id="psl_total_premium">0</span>
                                                   	</div>
                                                </div>
                                            </section>
                                            
                                            <!-- plot left-seaction close -->
                                            
                                            <section id="flat_section_left" style="display:none;">
                                                <div class="form-group row" id="plotno">
                                                    <label class="col-sm-3 col-form-label">Flat No.<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="plot_no" name="plot_no"
                                                            value="<?php
                                                            if (isset($property_detail)) {
                                                                echo $property_detail[0]['block'];
                                                            }   
                                                            ?>" placeholder="plot no">
                                                        <div class="text-danger" id="plot_no_error" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-3 col-form-label">Facing<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select name="facing" id="facing" class="form-control">
                                                            <option value="">Select facing</option>
                                                            <option value="E" <?php
                                                            if (isset($property_detail)) {  
                                                                if ($property_detail[0]['facing'] == 'E') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>East</option>
                                                            <option value="W" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['facing'] == 'W') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>West</option>
                                                            <option value="S" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['facing'] == 'S') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>South</option>
                                                            <option value="N" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['facing'] == 'N') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>North</option>
                                                        </select>
                                                        <div class="text-danger" id="facing_error" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label">Construction area<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="area" name="area" value="<?php
                                                        if (isset($property_detail)) {
                                                            echo $property_detail[0]['area'];
                                                        }
                                                        ?>" placeholder="Enter area">
                                                        <div class="text-danger" id="area_error" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row" id="plot_rate">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label">Rate of Flat</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="rate_of_plot" id="rate_of_plot"
                                                            placeholder="Rate of plot" value="<?php
                                                            if (isset($property_detail)) {
                                                                echo $property_detail[0]['rate_plot'];
                                                            }
                                                            ?>" class="form-control" />
                                                        <div class="text-danger" id="rate_of_plot_error"
                                                            style="display: none;"></div>
                                                    </div>
                                                </div>
    
    
                                                <div class="p-2" style="border: 1px solid #e0dcdc">
                                                    <h5 class="">
                                                        <label class="text-info"><b>Premium</b></label>
                                                    </h5>
                                                    <hr />
                                                    <input type="checkbox" id="corner" name="corner" <?php
                                                            if (isset($property_detail)) {
                                                                            if ($property_detail[0]['corner'] == '1') {
                                                                                echo 'checked';
                                                                            }
                                                                        }
                                                                        ?> /> Corner &nbsp;
                                                    <input type="checkbox" id="garder" name="garden" <?php
                                                            if (isset($property_detail)) {
                                                                            if ($property_detail[0]['garden'] == '1') {
                                                                                echo 'checked';
                                                                            }
                                                                        }
                                                                        ?> /> Garden
                                                                        
                                                    <div id="premium_cal" style="display: none;">
                                                    	<br/>
                                                    	Calculated in % :
                                                    	<input type="checkbox" id="calculateinper" checked />
                                                    	&nbsp; <input type="text" id="per_amount" value="5"/>
                                                    	<br/>
                                                    	Total Premium : <span id="total_premium">0</span>
                                                   	</div>
                                                </div>
                                            </section>
                                            
                                            <section id="bungalow_section_left" style="display:none;">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Block No.<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="block_no" name="block_no"
                                                            value="<?php
                                                            if (isset($property_detail)) {
                                                                echo $property_detail[0]['block'];
                                                            }   
                                                            ?>" placeholder="0">
                                                        <div class="text-danger" id="plot_no_error" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-3 col-form-label">Facing<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select name="facing" id="facing" class="form-control">
                                                            <option value="">Select facing</option>
                                                            <option value="E" <?php
                                                            if (isset($property_detail)) {  
                                                                if ($property_detail[0]['facing'] == 'E') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>East</option>
                                                            <option value="W" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['facing'] == 'W') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>West</option>
                                                            <option value="S" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['facing'] == 'S') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>South</option>
                                                            <option value="N" <?php
                                                            if (isset($property_detail)) {
                                                                if ($property_detail[0]['facing'] == 'N') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>>North</option>
                                                        </select>
                                                        <div class="text-danger" id="facing_error" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
    
    											<div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Plot area<span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="plot_area" name="area" value="<?php
                                                        if (isset($property_detail)) {
                                                            echo $property_detail[0]['area'];
                                                        }
                                                        ?>" placeholder="Plot area">
                                                        <div class="text-danger" id="area_error" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label">Construction area<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="area" name="area" value="<?php
                                                        if (isset($property_detail)) {
                                                            echo $property_detail[0]['area'];
                                                        }
                                                        ?>" placeholder="Enter area">
                                                        <div class="text-danger" id="area_error" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label">Total area<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="totalarea" name="totalarea" value="<?php
                                                        if (isset($property_detail)) {
                                                            echo $property_detail[0]['totalarea'];
                                                        }
                                                        ?>" placeholder="Enter area">
                                                        <div class="text-danger" id="total_area_error" style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row" id="plot_rate">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label">Rate of Flat</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="rate_of_plot" id="rate_of_plot"
                                                            placeholder="Rate of plot" value="<?php
                                                            if (isset($property_detail)) {
                                                                echo $property_detail[0]['rate_plot'];
                                                            }
                                                            ?>" class="form-control" />
                                                        <div class="text-danger" id="rate_of_plot_error"
                                                            style="display: none;"></div>
                                                    </div>
                                                </div>
    
    
                                                <div class="p-2" style="border: 1px solid #e0dcdc">
                                                    <h5 class="">
                                                        <label class="text-info"><b>Premium</b></label>
                                                    </h5>
                                                    <hr />
                                                    <input type="checkbox" id="corner" name="corner" <?php
                                                            if (isset($property_detail)) {
                                                                            if ($property_detail[0]['corner'] == '1') {
                                                                                echo 'checked';
                                                                            }
                                                                        }
                                                                        ?> /> Corner &nbsp;
                                                    <input type="checkbox" id="garder" name="garden" <?php
                                                            if (isset($property_detail)) {
                                                                            if ($property_detail[0]['garden'] == '1') {
                                                                                echo 'checked';
                                                                            }
                                                                        }
                                                                        ?> /> Garden
                                                                        
                                                    <div id="premium_cal" style="display: none;">
                                                    	<br/>
                                                    	Calculated in % :
                                                    	<input type="checkbox" id="calculateinper" checked />
                                                    	&nbsp; <input type="text" id="per_amount" value="5"/>
                                                    	<br/>
                                                    	Total Premium : <span id="total_premium">0</span>
                                                   	</div>
                                                </div>
                                            </section>
                                        </div>

                                        <div class="offset-1 col-5">
                                        	<section id="plot_section_right" style="display: none;">
    											<div class="p-2" style="border: 1px solid #e0dcdc">
                                                    <h5 class="">
                                                        <label class="text-info"><b>Amenities</b></label>
                                                    </h5>
                                                    <hr />
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Maintenance</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="psl_maintenance" name="maintenance" placeholder="0" value="<?php
                                                            if (isset($property_detail)) {
                                                                echo $property_detail[0]['maintenance'];
                                                            }
                                                            ?>" class="form-control" />
                                                            <div class="text-danger" id="psl_maintenance_error" style="display: none;"></div>
                                                        </div>
                                                    </div>
    
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Club-house</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="club_house" id="psl_club_house"
                                                                placeholder="Club house cost in rs." value="<?php
                                                                if (isset($property_detail)) {
                                                                    echo $property_detail[0]['club_house'];
                                                                } else { echo "0"; } ?>" class="form-control" />
                                                            <div class="text-danger" id="club_house_error"
                                                                style="display: none;"></div>
                                                        </div>
                                                    </div>
                                                    
                                                    <label>Transformer/Electricity :</label>
                                                    <div class="row p-2">
                                                        <div class="col input-group mb-3 p-0">
                                                        	<input type="text" name="trans_kw" id="psl_trans_kw" placeholder="" class="form-control" value="<?php if(isset($property_detail)){
                                                        	    echo $property_detail[0]['transformer_kw'];
                                                        	} else { echo "0"; }?>" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="basic-addon2">kw</span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col input-group pl-1 pr-0">
                                                        	<input type="text" name="trans_rate" id="psl_trans_rate" placeholder="" class="form-control" value="<?php if(isset($property_detail)){
                                                        	    echo $property_detail[0]['transformer_rate'];
                                                        	} else { echo "0"; }?>" />
                                                        </div>
                                                        
                                                        <div class="col input-group pl-1">
                                                        	<input type="text" name="trans_amount" id="psl_trans_amount" readonly placeholder="" class="form-control" value="<?php if(isset($property_detail)){
                                                        	    echo $property_detail[0]['transformer_kw'] * $property_detail[0]['transformer_rate']; 
                                                        	} else { echo "0"; }?>" />
                                                        </div>
                                                    </div>
                                                    <div class="text-danger" id="psl_trans_elec_error" style="display: none;"></div>
                                                </div>
                                            </section>
                                            
                                            <section id="flat_section_right" style="display: none;">
                                            		<div class="form-group row pb-2" id="bhk_box">
                                                        <label for="staticEmail" class="col-sm-2 col-form-label">BHK</label>
                                                        <div class="col-sm-10">
                                                            <select name="bhk" id="bhk" class="form-control">
                                                                <option value="">Select type</option>
                                                                <option value="1bhk">1 BHK</option>
                                                                <option value="2bhk">2 BHK Duplex</option>
                                                                <option value="3bhk">3 BHK Duplex</option>
                                                            </select>
                                                            <div class="text-danger" id="bhk_error" style="display: none;">
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>
        											<div class="p-2" style="border: 1px solid #e0dcdc">
        												<h5 class="">
                                                            <label class="text-info"><b>Amenities</b></label>
                                                        </h5>
                                                        <hr />
                                                        <div class="form-group row">
                                                            <label for="staticEmail"
                                                                class="col-sm-3 col-form-label">Maintenance</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="maintenance" name="maintenance" placeholder="0" value="<?php
                                                                if (isset($property_detail)) {
                                                                    echo $property_detail[0]['maintenance'];
                                                                }
                                                                ?>" class="form-control" />
                                                                <div class="text-danger" id="maintenance_error" style="display: none;"></div>
                                                            </div>
                                                        </div>
        
                                                        <div class="form-group row">
                                                            <label for="staticEmail"
                                                                class="col-sm-3 col-form-label">Club-house</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="club_house" id="club_house"
                                                                    placeholder="Club house cost in rs." value="<?php
                                                                    if (isset($property_detail)) {
                                                                        echo $property_detail[0]['club_house'];
                                                                    } ?>" class="form-control" />
                                                                <div class="text-danger" id="club_house_error"
                                                                    style="display: none;"></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label for="staticEmail"
                                                                class="col-sm-3 col-form-label">Parking</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="parking" name="maintenance" placeholder="0" value="<?php
                                                                if (isset($property_detail)) {
                                                                    echo $property_detail[0]['parking'];
                                                                }
                                                                ?>" class="form-control" />
                                                                <div class="text-danger" id="parking_error" style="display: none;"></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <label>Transformer/Electricity :</label>
                                                        <div class="row p-2">
                                                            <div class="col input-group mb-3 p-0">
                                                            	<input type="text" name="trans_kw" id="trans_kw" placeholder="" class="form-control" value="<?php if(isset($property_detail)){
                                                            	    echo $property_detail[0]['transformer_kw'];
                                                            	}?>" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">kw</span>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col input-group pl-1 pr-0">
                                                            	<input type="text" name="trans_rate" id="trans_rate" placeholder="" class="form-control" value="<?php if(isset($property_detail)){
                                                            	    echo $property_detail[0]['transformer_rate'];
                                                            	}?>" />
                                                            </div>
                                                            
                                                            <div class="col input-group pl-1">
                                                            	<input type="text" name="trans_amount" id="trans_amount" readonly placeholder="" class="form-control" value="<?php if(isset($property_detail)){
                                                            	    echo $property_detail[0]['transformer_kw'] * $property_detail[0]['transformer_rate']; 
                                                            	}?>" />
                                                            </div>
                                                        </div>
                                                        <div class="text-danger" id="trans_elec_error" style="display: none;"></div>
                                                    </div>
                                                </section>
                                                
                                                
                                                <section id="bungalow_section_right" style="display: none;">
        											<div class="p-2" style="border: 1px solid #e0dcdc">
                                                        <h5 class="">
                                                            <label class="text-info"><b>Amenities</b></label>
                                                        </h5>
                                                        <hr />
                                                        <div class="form-group row">
                                                            <label for="staticEmail"
                                                                class="col-sm-3 col-form-label">Maintenance</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="maintenance" name="maintenance" placeholder="0" value="<?php
                                                                if (isset($property_detail)) {
                                                                    echo $property_detail[0]['maintenance'];
                                                                }
                                                                ?>" class="form-control" />
                                                                <div class="text-danger" id="maintenance_error" style="display: none;"></div>
                                                            </div>
                                                        </div>
        
                                                        <div class="form-group row">
                                                            <label for="staticEmail"
                                                                class="col-sm-3 col-form-label">Club-house</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="club_house" id="club_house"
                                                                    placeholder="Club house cost in rs." value="<?php
                                                                    if (isset($property_detail)) {
                                                                        echo $property_detail[0]['club_house'];
                                                                    } ?>" class="form-control" />
                                                                <div class="text-danger" id="club_house_error"
                                                                    style="display: none;"></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <label>Transformer/Electricity :</label>
                                                        <div class="row p-2">
                                                            <div class="col input-group mb-3 p-0">
                                                            	<input type="text" name="trans_kw" id="trans_kw" placeholder="" class="form-control" value="<?php if(isset($property_detail)){
                                                            	    echo $property_detail[0]['transformer_kw'];
                                                            	}?>" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">kw</span>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col input-group pl-1 pr-0">
                                                            	<input type="text" name="trans_rate" id="trans_rate" placeholder="" class="form-control" value="<?php if(isset($property_detail)){
                                                            	    echo $property_detail[0]['transformer_rate'];
                                                            	}?>" />
                                                            </div>
                                                            
                                                            <div class="col input-group pl-1">
                                                            	<input type="text" name="trans_amount" id="trans_amount" readonly placeholder="" class="form-control" value="<?php if(isset($property_detail)){
                                                            	    echo $property_detail[0]['transformer_kw'] * $property_detail[0]['transformer_rate']; 
                                                            	}?>" />
                                                            </div>
                                                        </div>
                                                        <div class="text-danger" id="trans_elec_error" style="display: none;"></div>
                                                    </div>
                                                </section>

                                            <?php if($this->uri->segment(2) != ''){ ?>
                                            <div class="input-group mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        data-pid="<?php echo $property_detail[0]['pid']; ?>"
                                                        id="property_hold_checkbox" name="hold" <?php
                                                        if (isset($property_detail)) {
                                                            if ($property_detail[0]['hold'] == '1') {
                                                                echo 'checked';
                                                            }
                                                        }
                                                        ?>> <label class="form-check-label" for="defaultCheck1"> HOLD </label>
                                                </div>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="form-check">
                                                    <input class="form-check-input"
                                                        data-pid="<?php echo $property_detail[0]['pid']; ?>"
                                                        id="property_booking__checkbox" type="checkbox" name="booked" <?php
                                                        if (isset($property_detail)) {
                                                            if ($property_detail[0]['is_booked'] == '1') {
                                                                echo 'checked';
                                                            }
                                                        }
                                                        ?>> <label class="form-check-label" for="defaultCheck1"> BOOKED </label>
                                                </div>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="sold">
                                                    <label class="form-check-label" for="defaultCheck1"> SOLD </label>
                                                </div>
                                            </div>
                                            <?php } ?>

											<section id="calculation_section" style="display: none;">
                                                <label class="mt-2">Total Cost : <span id="total_cost">
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
                                                        data-pid="<?php echo $property_detail[0]['pid']; ?>" value="Update"
                                                        class="btn btn-success" />
                                                    <?php } else { ?>
                                                    <input type="button" id="create" value="Submit"
                                                        class="btn btn-success" />
                                                    <?php } ?>
                                                    <input type="button" id="cancel" value="Cancel"
                                                        class="btn btn-warning ml-1" />
                                                </div>
											</section>
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
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top"> <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" id="modal_create" class="btn btn-primary"
                        style="display: inline;">Create</button>
                    <button type="button" id="modal_update" class="btn btn-warning"
                        style="display: none;">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>






    <div class="modal fade bd-example-modal-lg" id="bookingModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-body">
                    <h6 class="text-center text-info">Fill Customer Detail</h6>
                    <div style="border: 1px solid #c7c1c1;" class="p-2">
                        <table border="0" width="100%" id="customer_detail_table">
                            <tr>
                                <td><span id="plot_category">Plot</span> No:</td>
                                <td><input type="hidden" id="plot_id" /> <input type="text" class="form-control"
                                        name="plot" id="plot_name" value="" readonly /></td>
                            </tr>
                            <tr>
                                <td>Client Name:</td>
                                <td><input type="text" class="form-control" name="name" id="name" required />
                                    <div id="name_error" style="display: none" ;></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Father's/Husband's Name:</td>
                                <td><input type="text" class="form-control" name="father_hub_name" id="father_hub_name"
                                        required />
                                    <div id="father_hub_name_error" style="display: none" ;></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Mobile No:</td>
                                <td><input type="text" class="form-control" name="mobile_no" id="mobile_no" required />
                                    <div id="mobile_no_error" style="display: none" ;></div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">Address:</td>
                                <td><textarea row="3" class="form-control" name="address" id="address"></textarea>
                                    <div id="address_error" style="display: none" ;></div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">Wife's Name:</td>
                                <td><input type="text" class="form-control" name="wife_name" id="wife_name" />
                                    <div id="wife_name_error" style="display: none" ;></div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">Wife's Contact No:</td>
                                <td><input type="text" class="form-control" name="wife_contact" id="wife_contact" />
                                    <div id="wife_contact_error" style="display: none" ;></div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">Family Members:</td>
                                <td><input type="text" class="form-control" name="family_members" id="family_members" />
                                    <div id="family_members_error" style="display: none" ;></div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">E-mail Id:</td>
                                <td><input type="text" class="form-control" name="emailid" id="emailid" />
                                    <div id="emailid_error" style="display: none" ;></div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">Pan Card No:</td>
                                <td><input type="text" class="form-control" name="pan" id="pan" />
                                    <div id="pan_error" style="display: none" ;></div>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top">Adhaar Card No:</td>
                                <td><input type="text" class="form-control" name="adhaar" id="adhaar" />
                                    <div id="adhaar_error" style="display: none" ;></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <hr /> <a href="#customer_detail"> <input type="button" id="book_now"
                                            value="Book Now" class="btn btn-success" /></a>
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
	var totalPremium = 0;
	var totalAmenities = 0;
	var totalCost = 0;
	
	
	$(document).on('change','#category',function(){
		var category = $(this).val();
		if(category == 'plot'){
			$('#plot_section_left').show();
			$('#plot_section_right').show();
			$('#calculation_section').show();
		}
	});
	
	
	function premium_calc(){
		var category = $('#category').val();
		if(category == 'plot'){
			var calculateinper = 0;
    		if($('#psl_corner').prop('checked') == true || $('#psl_garder').prop('checked') == true){
    			if($('#psl_area').val() != '' && $('#psl_rate_of_plot').val() != ''){
    				$('#psl_premium_cal').show();
    				if($('#psl_calculateinper').prop('checked') == true){
    					totalPremium = ((parseFloat($('#psl_area').val()) * parseFloat($('#psl_rate_of_plot').val())) * $('#psl_per_amount').val())/100;
    					$('#psl_per_amount').val()
    				}
    				
    			} else {
    				alert('enter amount first');
    				return false;
    			}
    		} else {
    			$('#psl_premium_cal').hide();
    		}
		}
		$('#psl_total_premium').html(totalPremium);
		return totalPremium;
	}
	
	
	function total_cost(){
		var category = $('#category').val();
		if(category == 'plot'){
			var area = 0;
			var rate_of_plot = 0;
			
			if($('#psl_area').val() != ''){ 
				area = parseFloat($('#psl_area').val()); 
			}
			if($('#psl_rate_of_plot').val() != ''){
				rate_of_plot = parseFloat($('#psl_rate_of_plot').val());
			}
		}
		totalCost = area * rate_of_plot + totalPremium;
		$('#total_cost').html(parseFloat(totalCost) + parseFloat(totalPremium));
	}
	
	function total_amenities(){
		totalAmenities = 0;
	}
	
	
	$(document).on('click','#psl_corner,#psl_garder',function(){
		alert($(this).prop('checked'));
		if($(this).prop('checked') == true){
			$(this).prop('checked') == false;
		}
		var totalPremium = premium_calc();
		if(totalPremium != ''){
			 $('#total_cost').html(parseFloat(totalCost) + parseFloat(totalPremium));
			 return false;
		} else {
			totalPremium = 0;
		}
		
	});
	
	$(document).on('keyup','#psl_area,#psl_rate_of_plot',function(){
		total_cost();
	});
	
	$(document).on('click','#create',function(){
	if($('#category').val() == 'plot'){
		$.ajax({
            type: 'POST',
            url: baseUrl + 'property_ctrl/create',
            data: {
                'category': $('#category').val(),
                'plotno': $('#psl_plot_no').val(),
                'facing': $('#psl_facing').val(),
                'area': $('#psl_area').val(),
                'rate_of_plot': $('#psl_rate_of_plot').val(),
                'corner': corner,
                'garden': garden,
                'premimuminper' : $('#calculateinper').prop("checked"),
                'premimumamount' : premium_calc(),
                'maintenance': $('#psl_maintenance').val(),
                'club_house': $('#psl_club_house').val(),
                'trans_kw' : $('#trans_kw').val(),
                'trans_rate' : $('#trans_rate').val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 200) {
                    alert(response.msg);
                    location.reload();
                } else {
                    alert(response.msg);
                }
            }
        });
  	}
	});
	
    </script>
</body>

</html>
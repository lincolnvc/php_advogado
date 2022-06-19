<link href="<?php echo base_url('assets/css/chosen.css')?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<style>
.row{
	margin-bottom:10px;
}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo lang('general_settings')?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard')?></a></li>
      
        <li class="active"><?php echo lang('general_settings')?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
<?php 
	if(validation_errors()){
?>
<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
                                        <b><?php echo lang('alert')?>!</b><?php echo validation_errors(); ?>
                                    </div>

<?php  } ?>  
	   	
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                   
                </div><!-- /.box-header -->
                <!-- form start -->
				
			
				<form method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/settings/')?>">
				
				<div class="box-body">
					
				<div class="tabbable">
							
								<ul class="nav nav-tabs">
									<li class="active"><a href="#1" data-toggle="tab"><?php echo lang('details');?></a></li>
									<li><a href="#2" data-toggle="tab"><?php echo lang('hr_settings');?></a></li>
									<li><a href="#3" data-toggle="tab"><?php echo lang('smtp_settings');?></a></li>
								</ul>
							<div class="tab-content">
									<div class="tab-pane active" id="1">
											  <div class="form-group" style="padding-top:12px;">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('company_name')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="text" name="name" value="<?php echo @$settings->name;?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('logo')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="file" name="img" value="" class="form-control">
                                </div>
								<div class="col-md-4">
								<?php 
								if($settings->image != 0 || !empty($settings->image)){
								?>
								<img src="<?php echo base_url('assets/uploads/images/'.@$settings->image); ?>" width="140" height="100" />
								<?php
								}
								?>
								</div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('header_logo_image')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="radio" name="header_setting" value="0" <?php echo ($settings->header_setting==0)?'checked="checked"':'';?>  /> &nbsp; &nbsp;<?php echo lang('company_name')?></b>
									<input type="radio" name="header_setting" value="1" <?php echo ($settings->header_setting==1)?'checked="checked"':'';?>/> &nbsp;&nbsp; <?php echo lang('logo')?></b>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('address')?></b>
								</div>
								<div class="col-md-4">
                                    
									<textarea name="address" class="form-control"><?php echo @$settings->address;?></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('phone')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="text" name="contact" value="<?php echo @$settings->contact;?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('email')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="text" name="email" value="<?php echo @$settings->email;?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
					
					
						 <div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo lang('default_date_format')?></label>
								</div>
								<div class="col-md-4">
									<select name="date_format" class="form-control chzn" >
										<option value=""><?php echo lang('select')?> <?php echo lang('default_date_format')?></option>
										<option value="Y-m-d" <?php echo (@$settings->date_format=="Y-m-d")?'selected="selected"':'';?>>YYYY-mm-dd</option>
										<option value="d/m/y" <?php echo (@$settings->date_format=="d/m/y")?'selected="selected"':'';?>>dd/mm/yy</option>
										<option value="m/d/yy" <?php echo (@$settings->date_format=="m/d/y")?'selected="selected"':'';?>>mm/dd/yy</option>
										<option value="m/d/y" <?php echo (@$settings->date_format=="m/d/y")?'selected="selected"':'';?>>dd/mm/YYYY</option>
										<option value="m/d/Y" <?php echo (@$settings->date_format=="m/d/Y")?'selected="selected"':'';?>>mm/dd/YYYY</option>
									</select>
                                </div>
                            </div>
                        </div>

<?php $tz = DateTimeZone::listIdentifiers(DateTimeZone::ALL); 
				//	echo '<pre>'; print_r($tz);die;
				?>	
				 <div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo lang('timezone')?></label>
								</div>
								<div class="col-md-4">
									<select name="timezone" class="form-control chzn" >
										<option value=""><?php echo lang('select')?> <?php echo lang('timezone')?></option>
										<?php 
										foreach($tz as $new){
										$sel="";
										if($new==@$settings->timezone) $sel ='selected="selected"';
										echo "<option value='".$new."' ".$sel.">".$new."</option>";
										}
										?>
									</select>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('invoice_start')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="text" name="invoice_no" value="<?php echo @$settings->invoice_no;?>" class="form-control">
                                </div>
                            </div>
                        </div>			
									</div>
									
									<div class="tab-pane " id="2" >
									
					<div class="form-group"style="padding-top:12px;">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('mark_out_time')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="time" name="mark_out_time" value="<?php echo @$settings->mark_out_time;?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('employee_id_start_from')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="text" name="employee_id" value="<?php echo @$settings->employee_id;?>" class="form-control">
                                </div>
                            </div>
                        </div>
									
											<legend><?php echo lang('working_days')?></legend>
				<?php foreach($days as $new){?>		
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo $new->name?></b>
								</div>
								<div class="col-md-4">
                                    <input type="hidden" name="days[<?php echo @$new->id;?>]" value="0" />
									<input type="checkbox" name="days[<?php echo @$new->id;?>]" value="1" <?php echo ($new->working_day==1)?'checked="checked"':'';?> class="form-control">
									
                                </div>
                            </div>
                        </div>		
                   <?php } ?>   
									
									</div>
									
									<div class="tab-pane " id="3">
											
					<div style="padding-top:12px;" class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('smtp_host')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="text" name="smtp_host" value="<?php echo @$settings->smtp_host;?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
							<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('smtp_username')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="text" name="smtp_user" value="<?php echo @$settings->smtp_user;?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
							<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('smtp_password')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="text" name="smtp_pass" value="<?php echo @$settings->smtp_pass;?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('smtp_port')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="text" name="smtp_port" value="<?php echo @$settings->smtp_port;?>" class="form-control">
                                </div>
                            </div>
                        </div>		
						

										
									</div>	
											
							</div>
							
				</div>
					
							
						
					
                      
					   	
						
					
						
                    </div><!-- /.box-body -->
    
                    <div class="box-footer">
                        <button  type="submit" class="btn btn-primary"><?php echo lang('save')?></button>
                    </div>
             </form>
            </div><!-- /.box -->
        </div>
     </div>
</section>  

<script src="<?php echo base_url('assets/js/chosen.jquery.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js')?>" type="text/javascript"></script>


<script src="<?php echo base_url('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	
	$('.chzn').chosen();
	
});

$(function() {
	//bootstrap WYSIHTML5 - text editor
	$(".txtarea").wysihtml5();
});

 $(function() {
    $( ".datepicker" ).pickmeup({
    format  : 'Y-m-d'
});
  });
</script>
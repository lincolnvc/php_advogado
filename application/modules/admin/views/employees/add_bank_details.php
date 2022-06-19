
<link href="<?php echo base_url('assets/css/jquery.datetimepicker.css')?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<style>
.row{
	margin-bottom:10px;
}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo lang('bank_details')?>
        <small><?php echo lang('add')?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i><?php echo lang('dashboard')?></a></li>
        <li><a href="<?php echo site_url('admin/employees')?>"><?php echo lang('employees')?></a></li>
        <li class="active"><?php echo lang('add')?>   <?php echo lang('bank_details')?></li>
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
                                        <b><?php echo lang('alert');?>!</b><?php echo validation_errors(); ?>
</div>

<?php  } ?>
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?php echo lang('add')?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
						
				<?php echo form_open_multipart('admin/employees/add_bank_details/'.$id); ?>
                    <div class="box-body">
                    
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"><?php echo lang('account_holder_name')?></label>
									<input type="text" name="account_holder_name" value="<?php echo set_value('account_holder_name')?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"><?php echo lang('account_number')?></label>
									<input type="text" name="account_number" value="<?php echo set_value('account_number')?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"><?php echo lang('bank_name')?></label>
									<input type="text" name="bank_name" value="<?php echo set_value('bank_name')?>" class="form-control">
                                </div>
                            </div>
                        </div>


						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"><?php echo lang('ifsc_code')?></label>
									<input type="text" name="ifsc_code" value="<?php echo set_value('ifsc_code')?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"><?php echo lang('pan_number')?></label>
									<input type="text" name="pan_number" value="<?php echo set_value('pan_number')?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
							<div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"><?php echo lang('branch')?></label>
									<input type="text" name="branch" value="<?php echo set_value('branch')?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
				<?php if(check_user_role(124)==1){?>			
			  <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><?php echo lang('save')?></button>
                    </div>
				</div>	
				<?php } ?>
             <?php form_close()?>
            </div><!-- /.box -->
        </div>
     </div>
</section>  

<script src="<?php echo base_url('assets/js/jquery.datetimepicker.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).on('change', '#department_id', function(){
 //alert(12);
 	department_id = $('#department_id').val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#degi').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/employees/get_degi') ?>',
    type:'POST',
    data:{id:department_id},
	
	success:function(result){
      //alert(result);return false;
	  $('#degi').html(result);
	  
	 }
  });
});


 jQuery('.datepicker').datetimepicker({
 lang:'en',
 i18n:{
  de:{
   months:[
    'Januar','Februar','März','April',
    'Mai','Juni','Juli','August',
    'September','Oktober','November','Dezember',
   ],
   dayOfWeek:[
    "So.", "Mo", "Di", "Mi", 
    "Do", "Fr", "Sa.",
   ]
  }
 },
 timepicker:false,
 format:'Y-m-d'
});

</script>
<link href="<?php echo base_url('assets/css/chosen.css')?>" rel="stylesheet" type="text/css" />
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
        <?php echo lang('case')?>
        <small><?php echo lang('add')?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard')?></a></li>
        <li><a href="<?php echo base_url('admin/cases')?>"><?php echo lang('case')?></a></li>
        <li class="active"><?php echo lang('add')?></li>
    </ol>
</section>
<?php 
	if(validation_errors()){
?>
<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
                                        <b><?php echo lang('alert')?>!</b><?php echo validation_errors(); ?>
                                    </div>

<?php  } ?>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?php echo lang('add')?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				<?php echo form_open_multipart('admin/cases/add/'); ?>
				    <div class="box-body">
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('case')?> <?php echo lang('title')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>">
                                </div>
                            </div>
                        </div>
					   
					   
					    <div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('case')?> <?php echo lang('number')?></b>
								</div>
								<div class="col-md-4">
                                    
									<input type="text" name="case_no" class="form-control" value="<?php echo set_value('case_no')?>">
                                </div>
                            </div>
                        </div>
						
					
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('client')?> <?php echo lang('name')?></b>
								
								</div>
								<div class="col-md-4">
                                    <select name="client_id" class="form-control chzn">
									<option value="">--<?php echo lang('select')?> <?php echo lang('client')?>--</option>
									<?php foreach($clients as $new) {
											$sel = "";
											if(set_select('client_id', $new->id)) $sel = "selected='selected'";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
										?>
									</select>
                                </div>
								  <div class="col-md-3">
                                	<a href="#myModal" data-toggle="modal" class="btn bg-olive btn-flat margin"><?php echo lang('add')?>  <?php echo lang('new')?> <?php echo lang('client')?>	</a>		
								</div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('location')?></b>
								</div>
								<div class="col-md-4" id="location_result">
                                    <select name="location_id" id="location_id" class="chzn col-md-12" >
										<option value="">--<?php echo lang('select')?> <?php echo lang('location')?>--</option>
										<?php foreach($locations as $new) {
											$sel = "";
											if(set_select('location_id', $new->id)) $sel = "selected='selected'";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
										?>
									</select>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('court')?> <?php echo lang('category')?></b>
								</div>
								<div class="col-md-4" id="court_category_result">
                                    <select name="court_category_id"  id="court_category_id" class="chzn col-md-12"  disabled="disabled">
										<option value="">--<?php echo lang('select')?> <?php echo lang('court')?> <?php echo lang('category')?>--</option>
										<?php foreach($court_categories as $new) {
											$sel = "";
											if(set_select('court_category_id', $new->id)) $sel = "selected='selected'";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
										?>
									</select>
                                </div>
                            </div>
                        </div>
					
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('court')?></b>
								</div>
								<div class="col-md-4" id="court_result">
                                    <select name="court_id" id="court_id" disabled="disabled" class="chzn col-md-12" >
										<option value="">--<?php echo lang('select')?> <?php echo lang('court')?>--</option>
										<?php foreach($courts as $new) {
											$sel = "";
											if(set_select('court_id', $new->id)) $sel = "selected='selected'";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
										?>
									</select>
                                </div>
                            </div>
                        </div>
						
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('case')?>  <?php echo lang('category')?></b>
								</div>
								<div class="col-md-4">
                                    <select name="case_category_id[]" class="chzn col-md-12" multiple="multiple" >
										<?php foreach($case_categories as $new) {
											$sel = "";
											if(set_select('case_category_id', $new->id)) $sel = "selected='selected'";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
										?>
									</select>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('case')?> <?php echo lang('stage')?></b>
								</div>
								<div class="col-md-4">
                                    <select name="case_stage_id" class="chzn col-md-12">
										<option value="">--<?php echo lang('select')?> <?php echo lang('case')?> <?php echo lang('stage')?>--</option>
										<?php foreach($stages as $new) {
											$sel = "";
											if(set_select('case_stage_id', $new->id)) $sel = "selected='selected'";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
										?>
									</select>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('act')?></b>
								</div>
								<div class="col-md-4">
                                    <select name="act_id[]" class="chzn col-md-12" multiple="multiple" >
										<?php foreach($acts as $new) {
											$sel = "";
											if(set_select('act_id', $new->id)) $sel = "selected='selected'";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->title.'</option>';
										}
										
										?>
										
									</select>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('description')?></b>
								</div>
								<div class="col-md-4">
                                   <textarea name="description" class="form-control"><?php echo set_value('description'); ?></textarea>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('filling_date')?></b>
								</div>
								<div class="col-md-4">
                                   <input type="text" name="start_date" class="form-control datepicker" value="<?php echo set_value('start_date'); ?>"/>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('hearing_date')?></b>
								</div>
								<div class="col-md-4">
                                   <input type="text" name="hearing_date" value="<?php echo set_value('hearing_date'); ?>"class="form-control datepicker"/>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('opposite_lawyer')?></b>
								</div>
								<div class="col-md-4">
                                   <input type="text" name="o_lawyer" value="<?php echo set_value('o_lawyer'); ?>" class="form-control"/>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('total_fees')?></b>
								</div>
								<div class="col-md-4">
                                   <input type="text" name="fees" value="<?php echo set_value('fees'); ?>" class="form-control"/>
                                </div>
                            </div>
                        </div>
						
						<?php 
						if($fields){
							foreach($fields as $doc){
							$output = '';
							if($doc->field_type==1) //testbox
							{
						?>
						<div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
									</div>
								<div class="col-md-4">
							<input type="text" class="form-control" name="reply[<?php echo $doc->id ?>]" id="req_doc" />
								</div>
                            </div>
                        </div>
					 <?php 	}	
							if($doc->field_type==2) //dropdown list
							{
								$values = explode(",", $doc->values);
					?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>
								<div class="col-md-4">	
							<select name="reply[<?php echo $doc->id ?>]" class="form-control">
							<?php	
										foreach($values as $key=>$val) {
											echo '<option value="'.$val.'">'.$val.'</option>';
										}
							?>			
							</select>	
								</div>
                            </div>
                        </div>
						<?php	}	
								if($doc->field_type==3) //radio buttons
							{
								$values = explode(",", $doc->values);
					?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>
								<div class="col-md-4">
							<?php	
										foreach($values as $key=>$val) { ?>
										
										<input type="radio" name="reply[<?php echo $doc->id ?>]" value="<?php echo $val;?>" />	<?php echo $val;?> &nbsp; &nbsp; &nbsp; &nbsp;
 							<?php 			}
							?>			
								</div>
                            </div>
                        </div>
						
						<?php }
						if($doc->field_type==4) //checkbox
							{
								$values = explode(",", $doc->values);
					?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>
								<div class="col-md-4">
							<?php	
										foreach($values as $key=>$val) { ?>
										
										<input type="checkbox" name="reply[<?php echo $doc->id ?>]" value="<?php echo $val;?>" class="form-control" />	&nbsp; &nbsp; &nbsp; &nbsp;
 							<?php 			}
							?>			
								</div>
                            </div>
                        </div>
					<?php }	if($doc->field_type==5) //Textarea
						  {		?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>
								<div class="col-md-4">
										<textarea class="form-control" name="reply[<?php echo $doc->id ?>]" ></textarea		
								></div>
                            </div>
                        </div>
							
						
						
					<?php 
								}	if($doc->field_type==6) //url
						  		{?>
						<div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
										<input type="url"  value=""name="reply[<?php echo $doc->id ?>]" class="form-control" >
								</div>
                            </div>
                        </div>
							
					<?php 
								}	if($doc->field_type==7) //Email
						  		{?>
						<div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
										<input type="email"  value=""name="reply[<?php echo $doc->id ?>]" class="form-control" >
								</div>
                            </div>
                        </div>
									
					<?php 
								}	if($doc->field_type==8) //Phone
						  		{?>
						<div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
										<input type="number"  value=""name="reply[<?php echo $doc->id ?>]" class="form-control" >
								</div>
                            </div>
                        </div>
													
						
						
					<?php 
								}	
							}
						}
					?>	

			   			
                      
						
                    </div><!-- /.box-body -->
    
                    <div class="box-footer">
                        <button  type="submit" class="btn btn-primary"><?php echo lang('save')?></button>
                    </div>
             </form>
            </div><!-- /.box -->
        </div>
     </div>
</section>  



<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
			 <div id="err">  
				<?php 
			if(validation_errors()){
		?>
		<div class="alert alert-danger alert-dismissable">
												<i class="fa fa-ban"></i>
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
												<b><?php echo lang('alert')?>!</b><?php echo validation_errors(); ?>
											</div>
		
		<?php  } ?>  
			</div>
	   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('add')?> <?php echo lang('new')?> <?php echo lang('client')?></h4>
      </div>
      <div class="modal-body">
			<form method="post" action="<?php echo site_url('admin/clients/add_client') ?>" id="my_form">
			         <div class="box-body">
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"><?php echo lang('name')?></label>
									<input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="gender" style="clear:both;"><?php echo lang('gender')?></label>
									<input type="radio" name="gender" id="gender" value="Male" /> <?php echo lang('male')?>
									<input type="radio" name="gender" id="gender"value="Female" /> <?php echo lang('female')?>
                                </div>
                            </div>
                        </div>
               
			   			 <div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="dob" style="clear:both;"><?php echo lang('date_of_birth')?></label>
									<input type="text" name="dob" id="dob"  class="form-control datepicker">
									
                                </div>
                            </div>
                        </div>
						
					
                        <div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="email" style="clear:both;"><?php echo lang('email')?></label>
									<input type="text" name="email" id="email" value="" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="username" style="clear:both;"><?php echo lang('username')?></label>
									<input type="text" name="username" id="username" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="password" style="clear:both;"><?php echo lang('password')?></label>
									<input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="password" style="clear:both;"><?php echo lang('confirm')?> <?php echo lang('password')?></label>
									<input type="password" name="confirm" id="confirm" class="form-control">
                                </div>
                            </div>
                        </div>
						
						 <div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="contact" style="clear:both;"><?php echo lang('phone')?></label>
									<input type="text" name="contact" id="contact" class="form-control">
                                </div>
                            </div>
                        </div>
						
						 <div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="contact" style="clear:both;"><?php echo lang('address')?></label>
									<textarea name="address"  id="address" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
						
							
						<?php 
						if($fields_clients){
							foreach($fields_clients as $doc){
							$output = '';
							if($doc->field_type==1) //testbox
							{
						?>
						<div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
							<input type="text" class="form-control" name="reply[<?php echo $doc->id ?>]" id="req_doc" />
								</div>
                            </div>
                        </div>
					 <?php 	}	
							if($doc->field_type==2) //dropdown list
							{
								$values = explode(",", $doc->values);
					?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
							<select name="reply[<?php echo $doc->id ?>]" class="form-control">
							<?php	
										foreach($values as $key=>$val) {
											echo '<option value="'.$val.'">'.$val.'</option>';
										}
							?>			
							</select>	
								</div>
                            </div>
                        </div>
						<?php	}	
								if($doc->field_type==3) //radio buttons
							{
								$values = explode(",", $doc->values);
					?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
							
							<?php	
										foreach($values as $key=>$val) { ?>
										
										<input type="radio" name="reply[<?php echo $doc->id ?>]" value="<?php echo $val;?>" />	<?php echo $val;?> &nbsp; &nbsp; &nbsp; &nbsp;
 							<?php 			}
							?>			
								</div>
                            </div>
                        </div>
						
						<?php }
						if($doc->field_type==4) //checkbox
							{
								$values = explode(",", $doc->values);
					?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
							
							<?php	
										foreach($values as $key=>$val) { ?>
										
										<input type="checkbox" name="reply[<?php echo $doc->id ?>]" value="<?php echo $val;?>" class="form-control" />	&nbsp; &nbsp; &nbsp; &nbsp;
 							<?php 			}
							?>			
								</div>
                            </div>
                        </div>
					<?php }	if($doc->field_type==5) //Textarea
						  {		?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
										<textarea class="form-control" name="reply[<?php echo $doc->id ?>]" ></textarea		
								></div>
                            </div>
                        </div>
							
						
						
					<?php 
								}	
							}
						}
					?>	



                    </div><!-- /.box-body -->
    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><?php echo lang('save')?></button>
                    </div>
             </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close')?></button>  
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/js/chosen.jquery.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery.datetimepicker.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	
	$('.chzn').chosen();
	
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
  //$(function() {
//   $('.datepicker').datetimepicker({
//	//mask:'9999-19-39 29:59',
//	format  : 'Y-m-d'
//	
//	}
//	
//	);
//  });
</script>


<script>

$(document).on('change', '#location_id', function(){
 //alert(12);
 	vch = $(this).val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#court_category_result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/cases/get_court_categories') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
      //alert(result);return false;
	  $('#court_category_result').html(result);
	  $(".chzn").chosen();
	 }
  });
});


$(document).on('change', '#court_category_id', function(){
 //alert(12);
 	location_id = $('#location_id').val();
	c_c_id 		= $('#court_category_id').val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#court_result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/cases/get_courts') ?>',
    type:'POST',
    data:{l_id:location_id,c_id:c_c_id},
	
	success:function(result){
      //alert(result);return false;
	  $('#court_result').html(result);
	  $(".chzn").chosen();
	 }
  });
});

$( "#my_form" ).submit(function( event ) {
	name = $('#name').val();
	
	gender = $('#gender').val();
	dob = $('#dob').val();
	email = $('#email').val();
	username = $('#username').val();
	password = $('#password').val();
	conf = $('#confirm').val();
	contact = $('#contact').val();
	address = $('#address').val();
	
	$.ajax({
		url: '<?php echo site_url('admin/clients/add_client') ?>',
		type:'POST',
		data:{name:name,gender:gender,dob:dob,email:email,username:username,password:password,confirm:conf,contact:contact,address:address},
		
		success:function(result){
		// alert(result);return false;
			  if(result=="Success")
				{
					//alert("value=0");
					//$('#myModal').fadeOut(500);
					 $('#myModal').modal('hide');
					 window.close(); 
				}
				else
				{
					$('#err').html(result);
				}
		  
		  $(".chzn").chosen();
		 }
	  });
	
	event.preventDefault();
});




</script>

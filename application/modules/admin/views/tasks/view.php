<link href="<?php echo base_url('assets/css/chosen.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/jquery.datetimepicker.css')?>" rel="stylesheet" type="text/css" />

  <!-- Ion Slider -->
<link href="<?php echo base_url()?>assets/css/ionslider/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
<!-- ion slider Nice -->
<link href="<?php echo base_url()?>assets/css/ionslider/ion.rangeSlider.skinNice.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assets/css/bootstrap-slider/slider.css" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<style>
.row{
	margin-bottom:10px;
}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo lang('tasks')?>
        <small><?php echo lang('view')?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i><?php echo lang('dashboard')?></a></li>
        <li><a href="<?php echo site_url('admin/tasks')?>"><?php echo lang('tasks')?></a></li>
        <li class="active"><?php echo lang('view')?></li>
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
                  <div><!-- /.box-header -->
                <!-- form start -->
				
				    <div class="box-body">
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                    <label for="name" style="clear:both;"><?php echo lang('name')?></label>
								</div>
								<div class="col-md-4">
									<?php echo $task->name?>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="email" style="clear:both;"><?php echo lang('priority');?></label>
								
								</div>
								<div class="col-md-4">
										<?php echo ($task->priority==1)?'Low':'';?> 
										<?php echo ($task->priority==2)?'Medium':'';?>
										<?php echo ($task->priority==3)?'High':'';?>
								</div>
                            </div>
                        </div>
						
			   			 <div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="dob" style="clear:both;"><?php echo lang('due_date');?></label>
								</div>
								<div class="col-md-4">
								<?php echo $task->due_date?>
									
                                </div>
                            </div>
                        </div>
						
						 <div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="case_id" style="clear:both;"><?php echo lang('case');?></label>
								</div>
								<div class="col-md-4">
										<?php foreach($cases as $new) {
											$sel = "";
											if($task->case_id== $new->id) echo '#'.$new->case_no.'-'.$new->title;
										}
										
										?>
									
                                </div>
                            </div>
                        </div>
						
						 <div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="employee_id" style="clear:both;"><?php echo lang('assigned_to');?></label>
								</div>
								<div class="col-md-4">
										<?php 
										foreach($assigned_users as $new){
											$users[] = $new->user_id;
										}
										
										foreach($employees as $new) {
											$sel = "";
											//if(set_select('employee_id', $new->id)) $sel = "selected='selected'";
										echo	$sel = (in_array($new->id,$users))? $new->name .", ": '';
										}
										
										?>
							    </div>
                            </div>
                        </div>
						 <div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="progress" style="clear:both;"><?php echo lang('progress');?></label>
								</div>
								<div class="col-md-4">		
				<input type="text" class="knob" value="<?php echo $task->progress?>" data-width="90" data-height="90" data-fgColor="#3c8dbc" data-readonly="true" />
									                          
                                        </div>
                                      
                                    </div>
                     </div>
                        
						<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="email" style="clear:both;"><?php echo lang('description');?></label>
								</div>
								<div class="col-md-7">
									<?php echo $task->description?>
									</div>
                            </div>
                        </div>
						
						
							<?php 
					$CI = get_instance();
						if($fields){
							foreach($fields as $doc){
							$output = '';
							if($doc->field_type==1) //testbox
							{
						?>
						<div class="form-group">
                              <div class="row">
							  
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
							<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$task->id."' AND form = '".$doc->form."' ")->row();?>		
							<?php echo @$result->reply; ?>
								</div>
                            </div>
                        </div>
					 <?php 	}	
							if($doc->field_type==2) //dropdown list
							{
								$values = explode(",", $doc->values);
					?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
								
								<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$task->id."'  ")->row();?>	
							<?php		if(!empty($values)){
											foreach($values as $key=>$val) {
												///$val='';
												if($val==$result->reply) echo $val;
											}
										}
							?>			
								</div>
                            </div>
                        </div>
						<?php	}	
								if($doc->field_type==3) //radio buttons
							{
								$values = explode(",", $doc->values);
					?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
							</div>	
								<div class="col-md-4">
							<?php	
										foreach($values as $key=>$val) { ?>
							<?php 
							$x="";
							$result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$task->id."' AND form = '".$doc->form."' ")->row();
							if(!empty($result->reply)){
								if($result->reply==$val){
									$x= $val;
								}else{
									$x='';
								}
							}
							?>			
						
						<?php echo $x;?>
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
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
							</div>	
								<div class="col-md-4">
							<?php	
										foreach($values as $key=>$val) { ?>
							<?php 
							$x="";
							$result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$task->id."' AND form = '".$doc->form."' ")->row();
							if(!empty($result->reply)){
								if($result->reply==$val){
									$x= $val;
								}else{
									$x='';
								}
							}
						?>	
										
								<?php echo $x;?>
 							<?php } ?>			
								</div>
                            </div>
                        </div>
					<?php }	if($doc->field_type==5) //Textarea
						  {		?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$task->id."' AND form = '".$doc->form."'")->row();?>	
										<?php echo @$result->reply;?>
								</div>
                            </div>
                        </div>
					
					
					<?php }	if($doc->field_type==6) //URl
						  {		?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$task->id."' AND form = '".$doc->form."'")->row();?>	
										<a href="<?php echo @$result->reply;?>" target="_blank"> <?php echo @$result->reply;?></a>
								</div>
                            </div>
                        </div>
						
					<?php }	if($doc->field_type==7) //EMAIL
						  {		?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$task->id."' AND form = '".$doc->form."'")->row();?>	
										<a href="mailto:<?php echo @$result->reply;?>" target="_top"> <?php echo @$result->reply;?></a>
								</div>
                            </div>
                        </div>				
					
					<?php }	if($doc->field_type==8) //Phone
						  {		?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$task->id."' AND form = '".$doc->form."'")->row();?>	
										<?php echo @$result->reply;?>
								</div>
                            </div>
                        </div>	
						
						
					<?php 
								}	
							}
						}
					?>		

                    </div><!-- /.box-body -->
    
                   
             <?php form_close()?>
            </div><!-- /.box -->
        </div>
     </div>
</section>  

<script src="<?php echo base_url('assets/js/jquery.datetimepicker.js')?>" type="text/javascript"></script>
<script type="text/javascript">

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
<script src="<?php echo base_url('assets/js/redactor.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/chosen.jquery.min.js')?>" type="text/javascript"></script>
  <!-- Ion Slider -->
<script src="<?php echo base_url()?>/assets/js/plugins/ionslider/ion.rangeSlider.min.js" type="text/javascript"></script>

<!-- Bootstrap slider -->
<script src="<?php echo base_url()?>/assets/js/plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>/assets/js/plugins/knob/jquery.knob.js" type="text/javascript"></script>
 <script>
  $(document).ready(function(){
  	$('.chzn').chosen();
	 $('.slider').slider();
    $('.redactor').redactor({
			  // formatting: ['p', 'blockquote', 'h2','img'],
            minHeight: 200,
            imageUpload: '<?php echo base_url(config_item('admin_folder').'/wysiwyg/upload_image');?>',
            fileUpload: '<?php echo base_url(config_item('admin_folder').'/wysiwyg/upload_file');?>',
            imageGetJson: '<?php echo base_url(config_item('admin_folder').'/wysiwyg/get_images');?>',
            imageUploadErrorCallback: function(json)
            {
                alert(json.error);
            },
            fileUploadErrorCallback: function(json)
            {
                alert(json.error);
            }
      });
});	  
	  
	  
	  $(function () {
        /* jQueryKnob */

        $(".knob").knob({
          /*change : function (value) {
           //console.log("change : " + value);
           },
           release : function (value) {
           console.log("release : " + value);
           },
           cancel : function () {
           console.log("cancel : " + this.value);
           },*/
         
        });
        /* END JQUERY KNOB */
});
  </script>